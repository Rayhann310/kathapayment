<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Providers\Database;
use Exception;

class PaymentLinkController extends Controller
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

        // Self-healing: ensure payment_links table and invoices.payment_link_id exist
        $this->ensureSchema();
    }

    // ─── Self-Healing Schema ─────────────────────────────────────────────────────

    private function ensureSchema()
    {
        try {
            // Create payment_links table if missing
            $this->db->exec("
                CREATE TABLE IF NOT EXISTS `payment_links` (
                    `id` CHAR(36) NOT NULL PRIMARY KEY,
                    `merchant_id` CHAR(36) NOT NULL,
                    `slug` VARCHAR(100) NOT NULL UNIQUE,
                    `name` VARCHAR(150) NOT NULL,
                    `description` TEXT NULL,
                    `price` DECIMAL(15,2) NOT NULL DEFAULT 0.00,
                    `is_flexible_price` BOOLEAN DEFAULT FALSE,
                    `currency` VARCHAR(3) DEFAULT 'IDR',
                    `status` ENUM('active', 'inactive', 'archived') DEFAULT 'active',
                    `total_sales` INT DEFAULT 0,
                    `total_revenue` DECIMAL(15,2) DEFAULT 0.00,
                    `redirect_url` VARCHAR(500) NULL,
                    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    FOREIGN KEY (`merchant_id`) REFERENCES `merchants`(`id`) ON DELETE CASCADE
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
            ");

            // Add payment_link_id to invoices if not exists
            $cols = $this->db->query("SHOW COLUMNS FROM `invoices` LIKE 'payment_link_id'")->fetchAll();
            if (empty($cols)) {
                $this->db->exec("ALTER TABLE `invoices` ADD COLUMN `payment_link_id` CHAR(36) NULL DEFAULT NULL AFTER `merchant_id`");
            }
        } catch (\Exception $e) {
            error_log("PaymentLinkController self-heal error: " . $e->getMessage());
        }
    }

    // ─── Stats helper ────────────────────────────────────────────────────────────

    private function getStats()
    {
        if (!$this->merchantId) {
            return ['active' => 0, 'total_revenue' => 0, 'total_sales' => 0];
        }
        $stmt = $this->db->prepare("
            SELECT
                SUM(CASE WHEN status = 'active' THEN 1 ELSE 0 END) AS active,
                SUM(total_revenue) AS total_revenue,
                SUM(total_sales)   AS total_sales
            FROM payment_links
            WHERE merchant_id = ?
        ");
        $stmt->execute([$this->merchantId]);
        return $stmt->fetch() ?: ['active' => 0, 'total_revenue' => 0, 'total_sales' => 0];
    }

    // ─── Index / List ────────────────────────────────────────────────────────────

    public function index($tab = 'all')
    {
        $search  = $_GET['search'] ?? '';
        $page    = max(1, (int)($_GET['page'] ?? 1));
        $limit   = 10;
        $offset  = ($page - 1) * $limit;

        $validTabs = ['all', 'active', 'inactive'];
        $tab = in_array($tab, $validTabs) ? $tab : 'all';

        $links      = [];
        $totalItems = 0;
        $stats      = $this->getStats();

        if ($this->merchantId) {
            $where  = "WHERE merchant_id = :mid";
            $params = [':mid' => $this->merchantId];

            if ($tab !== 'all') {
                $where .= " AND status = :status";
                $params[':status'] = $tab;
            }
            if ($search !== '') {
                $where .= " AND (name LIKE :s OR slug LIKE :s)";
                $params[':s'] = '%' . $search . '%';
            }

            $cnt = $this->db->prepare("SELECT COUNT(*) as total FROM payment_links $where");
            $cnt->execute($params);
            $totalItems = (int)$cnt->fetch()['total'];

            $stmt = $this->db->prepare("SELECT * FROM payment_links $where ORDER BY created_at DESC LIMIT :lim OFFSET :off");
            foreach ($params as $k => $v) $stmt->bindValue($k, $v);
            $stmt->bindValue(':lim', $limit, \PDO::PARAM_INT);
            $stmt->bindValue(':off', $offset, \PDO::PARAM_INT);
            $stmt->execute();
            $links = $stmt->fetchAll();
        }

        $totalPages = $totalItems > 0 ? (int)ceil($totalItems / $limit) : 1;

        $this->view('dashboard/payment_links', [
            'title'      => 'Payment Links - KathaPayment',
            'links'      => $links,
            'stats'      => $stats,
            'tab'        => $tab,
            'search'     => $search,
            'page'       => $page,
            'totalPages' => $totalPages,
            'totalItems' => $totalItems,
            'merchant'   => $this->merchant,
        ]);
    }

    // ─── Create ──────────────────────────────────────────────────────────────────

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !$this->merchantId) {
            redirect('payment-links');
            return;
        }
        $this->verifyCsrf();

        $name            = trim($_POST['name'] ?? '');
        $description     = trim($_POST['description'] ?? '');
        $price           = (float)str_replace(['.', ','], ['', '.'], $_POST['price'] ?? '0');
        $isFlexible      = isset($_POST['is_flexible_price']) ? 1 : 0;
        $redirectUrl     = trim($_POST['redirect_url'] ?? '');
        $status          = in_array($_POST['status'] ?? 'active', ['active', 'inactive']) ? $_POST['status'] : 'active';

        if (!$name) {
            $_SESSION['flash_error'] = "Nama produk wajib diisi.";
            redirect('payment-links');
            return;
        }

        // Auto-generate unique slug from name
        $slug = $this->generateSlug($name);

        try {
            $id = bin2hex(random_bytes(18));
            $stmt = $this->db->prepare("
                INSERT INTO payment_links (id, merchant_id, slug, name, description, price, is_flexible_price, status, redirect_url)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
            ");
            $stmt->execute([$id, $this->merchantId, $slug, $name, $description ?: null, $price, $isFlexible, $status, $redirectUrl ?: null]);
            $_SESSION['flash_success'] = "Payment Link berhasil dibuat!";
        } catch (\Exception $e) {
            $_SESSION['flash_error'] = "Gagal membuat link: " . $e->getMessage();
        }

        redirect('payment-links');
    }

    // ─── Toggle Status (active ↔ inactive) ──────────────────────────────────────

    public function toggle()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !$this->merchantId) {
            redirect('payment-links');
            return;
        }
        $id = $_POST['id'] ?? '';
        $stmt = $this->db->prepare("
            UPDATE payment_links
            SET status = IF(status = 'active', 'inactive', 'active')
            WHERE id = ? AND merchant_id = ?
        ");
        $stmt->execute([$id, $this->merchantId]);
        $_SESSION['flash_success'] = "Status link diperbarui.";
        redirect('payment-links');
    }

    // ─── Delete ──────────────────────────────────────────────────────────────────

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !$this->merchantId) {
            redirect('payment-links');
            return;
        }
        $this->verifyCsrf();
        $id = $_POST['id'] ?? '';
        $stmt = $this->db->prepare("DELETE FROM payment_links WHERE id = ? AND merchant_id = ?");
        $stmt->execute([$id, $this->merchantId]);
        $_SESSION['flash_success'] = "Payment Link dihapus.";
        redirect('payment-links');
    }

    // ─── Helpers ─────────────────────────────────────────────────────────────────

    private function generateSlug(string $name): string
    {
        $slug = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '-', $name), '-'));
        $base = $slug;
        $i = 1;
        while (true) {
            $check = $this->db->prepare("SELECT id FROM payment_links WHERE slug = ? LIMIT 1");
            $check->execute([$slug]);
            if (!$check->fetch()) break;
            $slug = $base . '-' . $i++;
        }
        return $slug;
    }
}
