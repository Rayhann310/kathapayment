<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Providers\Database;
use Exception;

class InvoiceUIController extends Controller
{
    private $db;
    private $userId;
    private $merchantId;
    private $merchant;

    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('login');
        }

        $this->db = Database::getInstance()->getConnection();
        $this->userId = $_SESSION['user_id'];

        $stmt = $this->db->prepare("SELECT * FROM merchants WHERE user_id = ? LIMIT 1");
        $stmt->execute([$this->userId]);
        $this->merchant = $stmt->fetch();

        if ($this->merchant) {
            $this->merchantId = $this->merchant['id'];
        }

        $this->ensureSchema();
    }

    private function ensureSchema()
    {
        try {
            $this->db->exec("
                CREATE TABLE IF NOT EXISTS `invoices` (
                  `id` CHAR(36) NOT NULL PRIMARY KEY,
                  `merchant_id` CHAR(36) NOT NULL,
                  `invoice_number` VARCHAR(50) NOT NULL UNIQUE,
                  `amount` DECIMAL(15,2) NOT NULL,
                  `currency` VARCHAR(3) DEFAULT 'IDR',
                  `status` ENUM('pending', 'waiting', 'paid', 'failed', 'expired', 'cancelled', 'refund') DEFAULT 'pending',
                  `customer_name` VARCHAR(100) NULL,
                  `customer_email` VARCHAR(100) NULL,
                  `description` TEXT NULL,
                  `expired_at` TIMESTAMP NULL DEFAULT NULL,
                  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                  FOREIGN KEY (`merchant_id`) REFERENCES `merchants`(`id`) ON DELETE CASCADE
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
            ");
        } catch (\Exception $e) {
            error_log("InvoiceUIController self-heal error: " . $e->getMessage());
        }
    }

    private function getStats()
    {
        if (!$this->merchantId) {
            return ['unpaid_count' => 0, 'unpaid_amount' => 0, 'paid_count' => 0, 'expired_count' => 0];
        }
        $stmt = $this->db->prepare("
            SELECT
                SUM(CASE WHEN status = 'pending' THEN 1 ELSE 0 END) AS unpaid_count,
                SUM(CASE WHEN status = 'pending' THEN amount ELSE 0 END) AS unpaid_amount,
                SUM(CASE WHEN status = 'paid' THEN 1 ELSE 0 END) AS paid_count,
                SUM(CASE WHEN status IN ('expired', 'failed', 'cancelled') THEN 1 ELSE 0 END) AS expired_count
            FROM invoices
            WHERE merchant_id = ?
        ");
        $stmt->execute([$this->merchantId]);
        return $stmt->fetch() ?: ['unpaid_count' => 0, 'unpaid_amount' => 0, 'paid_count' => 0, 'expired_count' => 0];
    }

    public function index($status = 'all')
    {
        $search = $_GET['search'] ?? '';
        $page = max(1, (int)($_GET['page'] ?? 1));
        $limit = 15;
        $offset = ($page - 1) * $limit;

        $validTabs = ['all', 'pending', 'paid', 'expired'];
        $status = in_array($status, $validTabs) ? $status : 'all';

        $invoices = [];
        $totalItems = 0;
        $stats = $this->getStats();

        if ($this->merchantId) {
            $where = "WHERE merchant_id = :mid";
            $params = [':mid' => $this->merchantId];

            if ($status !== 'all') {
                if ($status === 'expired') {
                    $where .= " AND status IN ('expired', 'failed', 'cancelled')";
                } else {
                    $where .= " AND status = :status";
                    $params[':status'] = $status;
                }
            }

            if ($search !== '') {
                $where .= " AND (invoice_number LIKE :s OR customer_name LIKE :s OR customer_email LIKE :s)";
                $params[':s'] = '%' . $search . '%';
            }

            $cnt = $this->db->prepare("SELECT COUNT(*) as total FROM invoices $where");
            $cnt->execute($params);
            $totalItems = (int)$cnt->fetch()['total'];

            $stmt = $this->db->prepare("SELECT * FROM invoices $where ORDER BY created_at DESC LIMIT :lim OFFSET :off");
            foreach ($params as $k => $v) $stmt->bindValue($k, $v);
            $stmt->bindValue(':lim', $limit, \PDO::PARAM_INT);
            $stmt->bindValue(':off', $offset, \PDO::PARAM_INT);
            $stmt->execute();
            $invoices = $stmt->fetchAll();
        }

        $totalPages = max(1, ceil($totalItems / $limit));

        $this->view('dashboard/invoices', [
            'title'      => 'Invoices - KathaPayment',
            'invoices'   => $invoices,
            'stats'      => $stats,
            'statusTab'  => $status,
            'search'     => $search,
            'page'       => $page,
            'totalPages' => $totalPages,
            'totalItems' => $totalItems,
            'merchant'   => $this->merchant
        ]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !$this->merchantId) {
            redirect('invoices');
            return;
        }
        $this->verifyCsrf();

        $amount = (float)str_replace(['.', ','], ['', '.'], $_POST['amount'] ?? '0');
        $customerName = trim($_POST['customer_name'] ?? '');
        $customerEmail = trim($_POST['customer_email'] ?? '');
        $description = trim($_POST['description'] ?? '');

        if ($amount <= 0) {
            $_SESSION['flash_error'] = "Nominal harus lebih dari 0.";
            redirect('invoices');
            return;
        }

        try {
            $id = bin2hex(random_bytes(18));
            $invoiceNumber = 'INV-' . date('Ymd') . '-' . strtoupper(substr(bin2hex(random_bytes(3)), 0, 5));
            // Expire in 24 hours
            $expiredAt = date('Y-m-d H:i:s', time() + 86400);

            $stmt = $this->db->prepare("
                INSERT INTO invoices (id, merchant_id, invoice_number, amount, currency, status, customer_name, customer_email, description, expired_at)
                VALUES (?, ?, ?, ?, 'IDR', 'pending', ?, ?, ?, ?)
            ");
            $stmt->execute([
                $id, $this->merchantId, $invoiceNumber, $amount,
                $customerName ?: null, $customerEmail ?: null, $description ?: null, $expiredAt
            ]);

            $_SESSION['flash_success'] = "Invoice {$invoiceNumber} berhasil dibuat!";
        } catch (\Exception $e) {
            $_SESSION['flash_error'] = "Gagal membuat invoice: " . $e->getMessage();
        }

        redirect('invoices');
    }
}
