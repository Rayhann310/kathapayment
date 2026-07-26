<?php

namespace App\Controllers\Api;

use App\Core\Controller;
use App\Models\InvoiceModel;
use App\Providers\Database;

class InvoiceController extends Controller
{
    public function create()
    {
        $headers = getallheaders();
        $apiKey = $headers['X-API-KEY'] ?? null;
        
        if (!$apiKey) {
            return $this->jsonResponse(['status' => 'error', 'message' => 'Unauthorized. Missing X-API-KEY header.'], 401);
        }

        // Validate API Key against database
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT id, status FROM merchants WHERE secret_key = ? LIMIT 1");
        $stmt->execute([$apiKey]);
        $merchant = $stmt->fetch();

        if (!$merchant) {
            return $this->jsonResponse(['status' => 'error', 'message' => 'Unauthorized. Invalid API Key.'], 401);
        }

        if ($merchant['status'] !== 'active') {
            return $this->jsonResponse(['status' => 'error', 'message' => 'Forbidden. Merchant account is not active.'], 403);
        }

        $merchantId = $merchant['id'];

        // Get JSON Payload
        $input = json_decode(file_get_contents('php://input'), true);

        if (!$input || empty($input['amount']) || !is_numeric($input['amount']) || $input['amount'] <= 0) {
            return $this->jsonResponse(['status' => 'error', 'message' => 'Invalid request payload. Valid positive amount is required.'], 400);
        }

        $invoiceModel = new InvoiceModel();
        
        $data = [
            'merchant_id' => $merchantId,
            'amount' => $input['amount'],
            'currency' => $input['currency'] ?? 'IDR',
            'customer_name' => $input['customer_name'] ?? null,
            'customer_email' => $input['customer_email'] ?? null,
            'description' => $input['description'] ?? 'Payment for order',
        ];

        $invoice = $invoiceModel->create($data);

        if ($invoice) {
            
            // Trigger Webhook Event
            $webhookService = new \App\Services\WebhookService();
            $webhookPayload = [
                'invoice_id' => $invoice['id'],
                'invoice_number' => $invoice['invoice_number'],
                'amount' => $invoice['amount'],
                'status' => $invoice['status']
            ];
            // Fire and forget (in a real system this would be queued)
            $webhookService->dispatch($merchantId, 'invoice.created', $webhookPayload);

            return $this->jsonResponse([
                'status' => 'success',
                'message' => 'Invoice created successfully',
                'data' => [
                    'id' => $invoice['id'],
                    'invoice_number' => $invoice['invoice_number'],
                    'amount' => $invoice['amount'],
                    'status' => $invoice['status'],
                    'payment_url' => base_url('pay/' . $invoice['invoice_number']),
                    'expired_at' => $invoice['expired_at']
                ]
            ], 201);
        }

        return $this->jsonResponse(['status' => 'error', 'message' => 'Failed to create invoice.'], 500);
    }
}
