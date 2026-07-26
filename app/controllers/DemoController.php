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
        $amount = rand(10, 500) * 1000; // Random amount between 10k - 500k

        $stmt = $this->db->prepare("INSERT INTO demo_transactions (id, amount, status) VALUES (?, ?, 'pending')");
        $stmt->execute([$id, $amount]);

        // Pass to view
        $this->view('demo/qris_display', [
            'id' => $id,
            'amount' => $amount,
            'scan_url' => base_url("demo/scan?id=" . $id)
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

        $stmt = $this->db->prepare("UPDATE demo_transactions SET status = 'paid' WHERE id = ?");
        $success = $stmt->execute([$id]);

        if ($success) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    }
}
