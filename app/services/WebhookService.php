<?php

namespace App\Services;

use App\Providers\Database;

class WebhookService
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Dispatch a webhook event to a merchant
     */
    public function dispatch($merchantId, $eventType, $payloadData)
    {
        // 1. Get Merchant Webhook URL & Secret
        $stmt = $this->db->prepare("SELECT webhook_url, webhook_secret FROM merchants WHERE id = :id");
        $stmt->bindParam(':id', $merchantId);
        $stmt->execute();
        $merchant = $stmt->fetch();

        if (!$merchant || empty($merchant['webhook_url'])) {
            return false; // No webhook configured
        }

        $url = $merchant['webhook_url'];
        $secret = $merchant['webhook_secret'];
        
        $payloadJson = json_encode([
            'event' => $eventType,
            'timestamp' => time(),
            'data' => $payloadData
        ]);

        // 2. Log to Database as 'pending'
        $id = bin2hex(random_bytes(18));
        $logStmt = $this->db->prepare("
            INSERT INTO webhooks (id, merchant_id, event_type, payload, endpoint_url, status) 
            VALUES (:id, :merchant_id, :event_type, :payload, :url, 'pending')
        ");
        $logStmt->execute([
            ':id' => $id,
            ':merchant_id' => $merchantId,
            ':event_type' => $eventType,
            ':payload' => $payloadJson,
            ':url' => $url
        ]);

        // 3. Send HTTP Request
        $signature = hash_hmac('sha256', $payloadJson, $secret);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payloadJson);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'X-Katha-Signature: ' . $signature,
            'X-Katha-Event: ' . $eventType
        ]);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // 4. Update Log Status
        $status = ($httpCode >= 200 && $httpCode < 300) ? 'success' : 'failed';
        
        $updateStmt = $this->db->prepare("
            UPDATE webhooks 
            SET status = :status, response_code = :code, response_body = :body 
            WHERE id = :id
        ");
        $updateStmt->execute([
            ':status' => $status,
            ':code' => $httpCode,
            ':body' => substr($response, 0, 1000), // Trim body just in case
            ':id' => $id
        ]);

        return $status === 'success';
    }
}
