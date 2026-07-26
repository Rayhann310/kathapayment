<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Providers\Database;

class DemoController extends Controller
{
    private $db;

    public function __construct()
    {
        // Try to trigger self healing and connect
        try {
            $this->db = Database::getInstance()->getConnection();
        } catch (\Exception $e) {
            // Self healing should have handled it, if not it will fail gracefully later
        }
    }

    /**
     * Layar Perangkat 1: Menampilkan QRIS (Display)
     */
    public function qrisDisplay()
    {
        if (!$this->db) {
            die("Database not ready for demo.");
        }

        // Generate a new demo transaction session
        $id = 'demo-' . bin2hex(random_bytes(8));
        
        $amount = isset($_GET['amount']) ? (int)$_GET['amount'] : rand(10, 500) * 1000;
        if ($amount < 10000) $amount = 10000; // Minimum 10k
        
        $method = isset($_GET['method']) ? $_GET['method'] : 'QRIS';
        
        $scan_url = base_url("demo/scan?id=" . $id);

        // Auto-cleanup: Hapus data simulasi yang lebih tua dari 1 hari agar database tidak penuh
        try {
            $this->db->exec("DELETE FROM demo_transactions WHERE created_at < DATE_SUB(NOW(), INTERVAL 1 DAY)");
        } catch (\Exception $e) {
            // Abaikan jika error
        }

        try {
            $stmt = $this->db->prepare("INSERT INTO demo_transactions (id, amount, payment_method, status) VALUES (?, ?, ?, 'pending')");
            $stmt->execute([$id, $amount, $method]);
        } catch (\PDOException $e) {
            // Error 42S02 means table doesn't exist. Error 42S22 or 1054 means missing column
            if ($e->getCode() == '42S02' || $e->getCode() == '42S22' || strpos($e->getMessage(), 'Unknown column') !== false) {
                // Drop table safely so it forces recreate with new schema
                try { $this->db->exec("DROP TABLE IF EXISTS demo_transactions"); } catch(\Exception $ex) {}
                
                \App\Services\SelfHealingService::runMigrations();
                
                // Retry
                $stmt = $this->db->prepare("INSERT INTO demo_transactions (id, amount, payment_method, status) VALUES (?, ?, ?, 'pending')");
                $stmt->execute([$id, $amount, $method]);
            } else {
                throw $e;
            }
        }

        // Pass to view
        $this->view('demo/qris_display', [
            'id' => $id,
            'amount' => $amount,
            'method' => $method,
            'scan_url' => $scan_url
        ]);
    }

    /**
     * Layar Perangkat 2: Pemindai (Mobile Simulator)
     */
    public function mobileScanner()
    {
        $id = $_GET['id'] ?? '';
        if (empty($id)) {
            die("Invalid Demo ID");
        }

        $stmt = $this->db->prepare("SELECT * FROM demo_transactions WHERE id = ?");
        $stmt->execute([$id]);
        $trx = $stmt->fetch();

        if (!$trx) {
            die("Demo Transaction not found or expired.");
        }

        $this->view('demo/mobile_scanner', [
            'trx' => $trx
        ]);
    }

    /**
     * API: Polling Status (Dipanggil oleh Perangkat 1)
     */
    public function apiStatus()
    {
        header('Content-Type: application/json');
        $id = $_GET['id'] ?? '';
        
        $stmt = $this->db->prepare("SELECT status FROM demo_transactions WHERE id = ?");
        $stmt->execute([$id]);
        $trx = $stmt->fetch();

        if ($trx) {
            echo json_encode(['status' => $trx['status']]);
        } else {
            echo json_encode(['status' => 'not_found']);
        }
    }

    /**
     * API: Eksekusi Pembayaran (Dipanggil oleh Perangkat 2)
     */
    public function apiPay()
    {
        header('Content-Type: application/json');
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Method not allowed']);
            return;
        }

        $data = json_decode(file_get_contents('php://input'), true);
        $id = $data['id'] ?? '';

        if (empty($id)) {
            echo json_encode(['success' => false, 'message' => 'Invalid ID']);
            return;
        }

        try {
            $stmt = $this->db->prepare("UPDATE demo_transactions SET status = 'paid' WHERE id = ?");
            $success = $stmt->execute([$id]);

            if ($success) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Update failed']);
            }
        } catch (\Exception $e) {
            error_log("Demo API Error: " . $e->getMessage());
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
