<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Providers\Database;
use Exception;

class MerchantUIController extends Controller
{
    private $db;
    private $userId;
    private $merchantId;
    private $merchant;

    public function __construct()
    {
        // Protected routes
        if (!isset($_SESSION['user_id'])) {
            redirect('login');
        }

        $this->db = Database::getInstance()->getConnection();
        $this->userId = $_SESSION['user_id'];
        
        // Fetch merchant record
        $stmt = $this->db->prepare("SELECT * FROM merchants WHERE user_id = ? LIMIT 1");
        $stmt->execute([$this->userId]);
        $this->merchant = $stmt->fetch();
        
        if ($this->merchant) {
            $this->merchantId = $this->merchant['id'];
        }
    }

    public function invoices()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $search = $_GET['search'] ?? '';
        $limit = 15;
        $offset = ($page - 1) * $limit;
        
        $invoices = [];
        $totalItems = 0;
        
        if ($this->merchantId) {
            $query = "FROM invoices WHERE merchant_id = :merchantId";
            $params = [':merchantId' => $this->merchantId];
            
            if ($search !== '') {
                $query .= " AND (invoice_number LIKE :search OR customer_name LIKE :search)";
                $params[':search'] = '%' . $search . '%';
            }
            
            // Get total count
            $stmt = $this->db->prepare("SELECT COUNT(*) as total " . $query);
            $stmt->execute($params);
            $totalItems = $stmt->fetch()['total'];
            
            // Get paginated data
            $stmt = $this->db->prepare("SELECT * " . $query . " ORDER BY created_at DESC LIMIT :limit OFFSET :offset");
            // Bind params for limit/offset which must be integers
            foreach ($params as $key => $val) {
                $stmt->bindValue($key, $val);
            }
            $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
            $stmt->execute();
            $invoices = $stmt->fetchAll();
        }

        $totalPages = ceil($totalItems / $limit);

        $this->view('dashboard/invoices', [
            'title' => 'Invoices - KathaPayment',
            'invoices' => $invoices,
            'page' => $page,
            'totalPages' => $totalPages,
            'search' => $search
        ]);
    }

    public function payments()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $search = $_GET['search'] ?? '';
        $limit = 15;
        $offset = ($page - 1) * $limit;
        
        $payments = [];
        $totalItems = 0;
        
        if ($this->merchantId) {
            $query = "FROM payments p JOIN invoices i ON p.invoice_id = i.id WHERE i.merchant_id = :merchantId";
            $params = [':merchantId' => $this->merchantId];
            
            if ($search !== '') {
                $query .= " AND (p.id LIKE :search OR i.invoice_number LIKE :search)";
                $params[':search'] = '%' . $search . '%';
            }
            
            // Get total count
            $stmt = $this->db->prepare("SELECT COUNT(*) as total " . $query);
            $stmt->execute($params);
            $totalItems = $stmt->fetch()['total'];
            
            // Get paginated data
            $stmt = $this->db->prepare("SELECT p.*, i.invoice_number, i.customer_name " . $query . " ORDER BY p.paid_at DESC LIMIT :limit OFFSET :offset");
            foreach ($params as $key => $val) {
                $stmt->bindValue($key, $val);
            }
            $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
            $stmt->execute();
            $payments = $stmt->fetchAll();
        }

        $totalPages = ceil($totalItems / $limit);

        $this->view('dashboard/payments', [
            'title' => 'Payments - KathaPayment',
            'payments' => $payments,
            'page' => $page,
            'totalPages' => $totalPages,
            'search' => $search
        ]);
    }

    public function paymentLinks()
    {
        $this->view('dashboard/payment_links', [
            'title' => 'Payment Links - KathaPayment',
        ]);
    }

    public function refunds()
    {
        $this->view('dashboard/refunds', [
            'title' => 'Refunds - KathaPayment',
        ]);
    }

    public function paymentMethods()
    {
        $this->view('dashboard/payment_methods', [
            'title' => 'Payment Methods - KathaPayment',
        ]);
    }

    public function riskAnalysis()
    {
        $this->view('dashboard/risk_analysis', [
            'title' => 'Risk Analysis - KathaPayment',
        ]);
    }

    public function customers()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $search = $_GET['search'] ?? '';
        $limit = 15;
        $offset = ($page - 1) * $limit;
        
        $customers = [];
        $totalItems = 0;
        
        if ($this->merchantId) {
            $query = "FROM invoices WHERE merchant_id = :merchantId GROUP BY customer_email";
            
            $countQuery = "SELECT COUNT(DISTINCT customer_email) as total FROM invoices WHERE merchant_id = :merchantId";
            $params = [':merchantId' => $this->merchantId];
            
            if ($search !== '') {
                $countQuery .= " AND (customer_name LIKE :search OR customer_email LIKE :search)";
                $query .= " HAVING (MAX(customer_name) LIKE :search OR customer_email LIKE :search)";
                $params[':search'] = '%' . $search . '%';
            }
            
            // Get total count
            $stmt = $this->db->prepare($countQuery);
            $stmt->execute($params);
            $totalItems = $stmt->fetch()['total'] ?? 0;
            
            // Get paginated data
            $sql = "SELECT customer_email, MAX(customer_name) as customer_name, COUNT(*) as total_orders, SUM(amount) as total_spent, MAX(created_at) as last_order " . $query . " ORDER BY last_order DESC LIMIT :limit OFFSET :offset";
            $stmt = $this->db->prepare($sql);
            foreach ($params as $key => $val) {
                $stmt->bindValue($key, $val);
            }
            $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
            $stmt->execute();
            $customers = $stmt->fetchAll();
        }

        $totalPages = ceil($totalItems / $limit);

        $this->view('dashboard/customers', [
            'title' => 'Customers - KathaPayment',
            'customers' => $customers,
            'page' => $page,
            'totalPages' => $totalPages,
            'search' => $search
        ]);
    }

    public function apikeys()
    {
        $this->view('dashboard/apikeys', [
            'title' => 'API Keys - KathaPayment',
            'merchant' => $this->merchant
        ]);
    }
    
    public function rollApiKeys()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $this->merchantId) {
            $newPublicKey = 'pk_' . (isset($this->merchant['is_sandbox']) && $this->merchant['is_sandbox'] ? 'test_' : 'live_') . bin2hex(random_bytes(16));
            $newSecretKey = 'sk_' . (isset($this->merchant['is_sandbox']) && $this->merchant['is_sandbox'] ? 'test_' : 'live_') . bin2hex(random_bytes(24));
            
            $stmt = $this->db->prepare("UPDATE merchants SET public_key = ?, secret_key = ? WHERE id = ?");
            $stmt->execute([$newPublicKey, $newSecretKey, $this->merchantId]);
            
            $_SESSION['flash_success'] = "API Keys rolled successfully!";
        }
        redirect('apikeys');
    }

    public function webhooks()
    {
        $this->view('dashboard/webhooks', [
            'title' => 'Webhooks - KathaPayment',
            'merchant' => $this->merchant
        ]);
    }
    
    public function updateWebhooks()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $this->merchantId) {
            $this->verifyCsrf();
            $webhookUrl = trim($_POST['webhook_url'] ?? '');
            $webhookSecret = $_POST['webhook_secret'] ?? null;
            
            if (!empty($webhookUrl) && !filter_var($webhookUrl, FILTER_VALIDATE_URL)) {
                $_SESSION['flash_error'] = "Invalid Webhook URL format!";
                redirect('webhooks');
            }
            
            $stmt = $this->db->prepare("UPDATE merchants SET webhook_url = ?, webhook_secret = ? WHERE id = ?");
            $stmt->execute([$webhookUrl, $webhookSecret, $this->merchantId]);
            
            $_SESSION['flash_success'] = "Webhook endpoint updated successfully!";
        }
        redirect('webhooks');
    }

    public function settings()
    {
        $user = [];
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$this->userId]);
        $user = $stmt->fetch();
        
        $this->view('dashboard/settings', [
            'title' => 'Settings - KathaPayment',
            'merchant' => $this->merchant,
            'user' => $user
        ]);
    }
    
    public function updateSettings()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $this->merchantId) {
            $this->verifyCsrf();
            $businessName = trim($_POST['business_name'] ?? '');
            
            if ($businessName) {
                $stmt = $this->db->prepare("UPDATE merchants SET name = ? WHERE id = ?");
                $stmt->execute([$businessName, $this->merchantId]);
                $_SESSION['flash_success'] = "Business information updated successfully!";
            }
        }
        redirect('settings');
    }

    public function withdrawals()
    {
        $withdrawals = [];
        $wallet = ['available_balance' => 0, 'locked_balance' => 0];
        
        if ($this->merchantId) {
            $stmt = $this->db->prepare("SELECT * FROM withdrawals WHERE merchant_id = ? ORDER BY created_at DESC");
            $stmt->execute([$this->merchantId]);
            $withdrawals = $stmt->fetchAll();
            
            $stmt = $this->db->prepare("SELECT available_balance, locked_balance FROM wallets WHERE owner_type = 'merchant' AND owner_id = ?");
            $stmt->execute([$this->merchantId]);
            $wallet = $stmt->fetch() ?: $wallet;
        }

        $this->view('dashboard/withdrawals', [
            'title' => 'Withdrawals - KathaPayment',
            'withdrawals' => $withdrawals,
            'wallet' => $wallet
        ]);
    }
    
    public function requestWithdrawal()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $this->merchantId) {
            $this->verifyCsrf();
            $amount = (float)($_POST['amount'] ?? 0);
            $bankName = trim($_POST['bank_name'] ?? '');
            $accountNumber = trim($_POST['account_number'] ?? '');
            $accountName = trim($_POST['account_name'] ?? '');
            
            if ($amount < 50000) {
                $_SESSION['flash_error'] = "Minimum withdrawal amount is Rp 50.000";
                redirect('withdrawals');
                return;
            }
            
            if (!$bankName || !$accountNumber || !$accountName) {
                $_SESSION['flash_error'] = "All bank details are required.";
                redirect('withdrawals');
                return;
            }

            try {
                $this->db->beginTransaction();
                
                // Check wallet balance
                $stmt = $this->db->prepare("SELECT id, available_balance FROM wallets WHERE owner_type = 'merchant' AND owner_id = ? FOR UPDATE");
                $stmt->execute([$this->merchantId]);
                $wallet = $stmt->fetch();
                
                if (!$wallet || $wallet['available_balance'] < $amount) {
                    throw new \Exception("Insufficient balance.");
                }
                
                // Deduct from available, add to locked
                $stmt = $this->db->prepare("UPDATE wallets SET available_balance = available_balance - ?, locked_balance = locked_balance + ? WHERE id = ?");
                $stmt->execute([$amount, $amount, $wallet['id']]);
                
                // Create withdrawal record
                $withdrawalId = bin2hex(random_bytes(18));
                $stmt = $this->db->prepare("
                    INSERT INTO withdrawals (id, merchant_id, amount, bank_name, account_number, account_name, status) 
                    VALUES (?, ?, ?, ?, ?, ?, 'pending')
                ");
                $stmt->execute([$withdrawalId, $this->merchantId, $amount, $bankName, $accountNumber, $accountName]);
                
                $this->db->commit();
                $_SESSION['flash_success'] = "Withdrawal request submitted successfully.";
            } catch (\Exception $e) {
                $this->db->rollBack();
                $_SESSION['flash_error'] = "Failed to process withdrawal: " . $e->getMessage();
            }
        }
        redirect('withdrawals');
    }
}
