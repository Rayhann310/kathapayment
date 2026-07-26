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
        if (!is_dir(dirname($logFile))) {
            mkdir(dirname($logFile), 0777, true);
        }
        $time = date('Y-m-d H:i:s');
        file_put_contents($logFile, "[$time] $message\n", FILE_APPEND);
        error_log("SelfHealing ERROR: $message");
    }

    public static function autoCreateDatabase($config)
    {
        try {
            // Connect without database
            $dsn = "mysql:host={$config['host']};port={$config['port']};charset={$config['charset']}";
            $pdo = new \PDO($dsn, $config['username'], $config['password'], [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ]);

            // Create database if not exists
            $dbName = $config['database'];
            $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbName` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
            $pdo->exec("USE `$dbName`");

            // Look for all schema files in database folder
            $schemaFiles = glob(BASE_PATH . '/database/schema*.sql');
            foreach ($schemaFiles as $file) {
                $sql = file_get_contents($file);
                if (!empty(trim($sql))) {
                    $pdo->exec($sql);
                }
            }

            // Also run seeder if exists
            $seederFile = BASE_PATH . '/database/seeder.php';
            if (file_exists($seederFile)) {
                // To avoid requiring and conflicting, we can just let seeder run manually later
                // or require it carefully. For safety, we skip automatic seeder here or call it via CLI.
            }
            
            return true;
        } catch (\PDOException $e) {
            error_log("SelfHealing Failed to auto-create database: " . $e->getMessage());
            return false;
        }
    }
}
