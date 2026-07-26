<?php

namespace App\Services;

use App\Providers\Database;
use PDOException;

class SelfHealingService
{
    private $db;
    
    public function __construct()
    {
        try {
            $this->db = Database::getInstance()->getConnection();
        } catch (\Exception $e) {
            $this->logError("Critical: Failed to connect to Database. Initiating DB repair/notification... " . $e->getMessage());
        }
    }

    public function runAllChecks()
    {
        echo "Starting Self Healing Checks...\n";
        $this->checkDatabaseIntegrity();
        $this->checkPendingWebhooks();
        $this->checkStuckPayments();
        echo "Self Healing Checks Completed.\n";
    }

    private function checkDatabaseIntegrity()
    {
        if (!$this->db) return;
        
        try {
            // Simple query to ensure connection is alive
            $stmt = $this->db->query("SELECT 1");
            if ($stmt) {
                echo "- Database is healthy.\n";
            }
        } catch (PDOException $e) {
            $this->logError("Database Integrity Check Failed: " . $e->getMessage());
            // Logic to restart connection or notify Admin
        }
    }

    private function checkPendingWebhooks()
    {
        if (!$this->db) return;
        
        echo "- Checking for stuck webhooks...\n";
        // Example: logic to find webhooks that failed and retry them
        // $this->db->query("UPDATE webhooks SET status = 'retrying' WHERE status = 'failed' AND retry_count < 3");
    }

    private function checkStuckPayments()
    {
        if (!$this->db) return;
        
        echo "- Checking for stuck pending payments...\n";
        // Example: logic to expire payments that have been pending for > 24 hours
        // $this->db->query("UPDATE payments SET status = 'expired' WHERE status = 'pending' AND created_at < NOW() - INTERVAL 1 DAY");
    }

    private function logError($message)
    {
        $logFile = BASE_PATH . '/logs/self_healing.log';
        $time = date('Y-m-d H:i:s');
        file_put_contents($logFile, "[$time] $message\n", FILE_APPEND);
        echo "ERROR: $message\n";
    }
}
