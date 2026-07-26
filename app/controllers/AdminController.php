<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Providers\Database;

class AdminController extends Controller
{
    private $db;
    private $adminId;

    public function __construct()
    {
        // Protected routes - must be super_admin
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'super_admin') {
            redirect('dashboard');
        }
        
        $this->db = Database::getInstance()->getConnection();
        $this->adminId = $_SESSION['user_id'];
    }
    
    private function logAction($action, $targetId = null, $details = null)
    {
        $stmt = $this->db->prepare("INSERT INTO audit_logs (admin_id, action, target_id, details) VALUES (?, ?, ?, ?)");
        $stmt->execute([$this->adminId, $action, $targetId, $details]);
    }

    public function dashboard()
    {
        // Platform wide stats
        $stmt = $this->db->query("SELECT SUM(amount) as total FROM invoices WHERE status = 'paid'");
        $totalVolume = $stmt->fetch()['total'] ?? 0;
        
        $stmt = $this->db->query("SELECT COUNT(*) as total FROM users");
        $totalUsers = $stmt->fetch()['total'] ?? 0;
        
        $stmt = $this->db->query("SELECT COUNT(*) as total FROM merchants");
        $totalMerchants = $stmt->fetch()['total'] ?? 0;
        
        // Calculate estimated platform revenue (assuming standard fixed + percentage fee)
        $stmt = $this->db->query("SELECT key_value FROM global_settings WHERE key_name = 'fee_fixed'");
        $feeFixed = (float)($stmt->fetch()['key_value'] ?? 4000);
        
        $stmt = $this->db->query("SELECT key_value FROM global_settings WHERE key_name = 'fee_percentage'");
        $feePercent = (float)($stmt->fetch()['key_value'] ?? 1.5);
        
        $stmt = $this->db->query("SELECT COUNT(*) as count FROM invoices WHERE status = 'paid'");
        $paidCount = $stmt->fetch()['count'] ?? 0;
        
        $estimatedRevenue = ($totalVolume * ($feePercent / 100)) + ($paidCount * $feeFixed);

        $this->view('admin/dashboard', [
            'title' => 'Super Admin Dashboard - KathaPayment',
            'stats' => [
                'users' => $totalUsers,
                'merchants' => $totalMerchants,
                'volume' => $totalVolume,
                'revenue' => $estimatedRevenue
            ]
        ]);
    }

    public function merchants()
    {
        $stmt = $this->db->query("
            SELECT m.*, u.name as owner_name, u.email as owner_email 
            FROM merchants m 
            JOIN users u ON m.user_id = u.id 
            ORDER BY m.created_at DESC
        ");
        $merchants = $stmt->fetchAll();
        
        $this->view('admin/merchants', [
            'title' => 'All Merchants - KathaPayment Admin',
            'merchants' => $merchants
        ]);
    }
    
    public function merchantDetail($id)
    {
        $stmt = $this->db->prepare("
            SELECT m.*, u.name as owner_name, u.email as owner_email 
            FROM merchants m 
            JOIN users u ON m.user_id = u.id 
            WHERE m.id = ?
        ");
        $stmt->execute([$id]);
        $merchant = $stmt->fetch();
        
        if (!$merchant) redirect('admin/merchants');
        
        $this->view('admin/merchant_detail', [
            'title' => 'Merchant Detail - KathaPayment Admin',
            'merchant' => $merchant
        ]);
    }
    
    public function updateMerchantStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->verifyCsrf();
            $merchantId = $_POST['merchant_id'] ?? '';
            $status = $_POST['status'] ?? '';
            
            if ($merchantId && in_array($status, ['active', 'inactive', 'suspended'])) {
                $stmt = $this->db->prepare("UPDATE merchants SET status = ? WHERE id = ?");
                $stmt->execute([$status, $merchantId]);
                $this->logAction("UPDATE_MERCHANT_STATUS", $merchantId, "Changed status to $status");
                $_SESSION['flash_success'] = "Merchant status updated to " . ucfirst($status) . ".";
            }
        }
        redirect('admin/merchants');
    }
    
    public function forceRollKeys($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->verifyCsrf();
            $stmt = $this->db->prepare("SELECT is_sandbox FROM merchants WHERE id = ?");
            $stmt->execute([$id]);
            $merchant = $stmt->fetch();
            
            if ($merchant) {
                $prefix = $merchant['is_sandbox'] ? 'test_' : 'live_';
                $newPublicKey = 'pk_' . $prefix . bin2hex(random_bytes(16));
                $newSecretKey = 'sk_' . $prefix . bin2hex(random_bytes(24));
                
                $stmt = $this->db->prepare("UPDATE merchants SET public_key = ?, secret_key = ? WHERE id = ?");
                $stmt->execute([$newPublicKey, $newSecretKey, $id]);
                
                $this->logAction("FORCE_ROLL_API_KEYS", $id, "Admin forced API key regeneration");
                $_SESSION['flash_success'] = "API Keys forcibly rolled for this merchant.";
            }
        }
        redirect('admin/merchants/detail/' . $id);
    }

    public function users()
    {
        $stmt = $this->db->query("SELECT id, name, email, role, created_at, deleted_at FROM users ORDER BY created_at DESC");
        $users = $stmt->fetchAll();
        
        $this->view('admin/users', [
            'title' => 'User Management - KathaPayment Admin',
            'users' => $users
        ]);
    }
    
    public function updateUserRole()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->verifyCsrf();
            $userId = $_POST['user_id'] ?? '';
            $role = $_POST['role'] ?? '';
            
            if ($userId === $_SESSION['user_id']) {
                $_SESSION['flash_error'] = "You cannot change your own role.";
            } else if ($userId && in_array($role, ['super_admin', 'finance', 'support', 'merchant_owner', 'customer'])) {
                $stmt = $this->db->prepare("UPDATE users SET role = ? WHERE id = ?");
                $stmt->execute([$role, $userId]);
                $this->logAction("UPDATE_USER_ROLE", $userId, "Changed role to $role");
                $_SESSION['flash_success'] = "User role updated to " . str_replace('_', ' ', ucfirst($role)) . ".";
            }
        }
        redirect('admin/users');
    }
    
    public function resetUserPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->verifyCsrf();
            $userId = $_POST['user_id'] ?? '';
            if ($userId) {
                // Generate a temporary password
                $tempPassword = bin2hex(random_bytes(4));
                $hashedPassword = password_hash($tempPassword, PASSWORD_DEFAULT);
                
                $stmt = $this->db->prepare("UPDATE users SET password = ? WHERE id = ?");
                $stmt->execute([$hashedPassword, $userId]);
                
                $this->logAction("RESET_USER_PASSWORD", $userId, "Password reset by admin");
                $_SESSION['flash_success'] = "Password reset to: <strong>" . $tempPassword . "</strong>";
            }
        }
        redirect('admin/users');
    }
    
    public function deleteUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->verifyCsrf();
            $userId = $_POST['user_id'] ?? '';
            if ($userId && $userId !== $_SESSION['user_id']) {
                $stmt = $this->db->prepare("UPDATE users SET deleted_at = CURRENT_TIMESTAMP WHERE id = ?");
                $stmt->execute([$userId]);
                $this->logAction("SOFT_DELETE_USER", $userId, "User soft deleted");
                $_SESSION['flash_success'] = "User soft deleted successfully.";
            }
        }
        redirect('admin/users');
    }

    public function logs()
    {
        $stmt = $this->db->query("
            SELECT a.*, u.name as admin_name 
            FROM audit_logs a 
            JOIN users u ON a.admin_id = u.id 
            ORDER BY a.created_at DESC 
            LIMIT 100
        ");
        $auditLogs = $stmt->fetchAll();
        
        $stmt = $this->db->query("
            SELECT w.*, m.name as merchant_name 
            FROM webhook_logs w 
            JOIN merchants m ON w.merchant_id = m.id 
            ORDER BY w.created_at DESC 
            LIMIT 100
        ");
        $webhookLogs = $stmt->fetchAll();
        
        $this->view('admin/logs', [
            'title' => 'System Logs - KathaPayment Admin',
            'auditLogs' => $auditLogs,
            'webhookLogs' => $webhookLogs
        ]);
    }

    public function settings()
    {
        $stmt = $this->db->query("SELECT * FROM global_settings");
        $settingsRaw = $stmt->fetchAll();
        
        $settings = [];
        foreach ($settingsRaw as $row) {
            $settings[$row['key_name']] = $row['key_value'];
        }

        $this->view('admin/settings', [
            'title' => 'Global Settings - KathaPayment Admin',
            'settings' => $settings
        ]);
    }
    
    public function updateGlobalSettings()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->verifyCsrf();
            $feeFixed = (float)($_POST['fee_fixed'] ?? 4000);
            $feePercent = $_POST['fee_percentage'] ?? '';
            
            if ($feeFixed !== '') {
                $stmt = $this->db->prepare("UPDATE global_settings SET key_value = ? WHERE key_name = 'fee_fixed'");
                $stmt->execute([$feeFixed]);
            }
            if ($feePercent !== '') {
                $stmt = $this->db->prepare("UPDATE global_settings SET key_value = ? WHERE key_name = 'fee_percentage'");
                $stmt->execute([$feePercent]);
            }
            
            $this->logAction("UPDATE_GLOBAL_SETTINGS", null, "Updated fees: fixed=$feeFixed, percent=$feePercent");
            $_SESSION['flash_success'] = "Global settings updated successfully.";
        }
        redirect('admin/settings');
    }
    
    public function runHealing()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->verifyCsrf();
            $healer = new \App\Services\SelfHealingService();
            ob_start();
            $healer->runAllChecks();
            $logOutput = ob_get_clean();
            
            $this->logAction("RUN_SELF_HEALING", null, "Admin ran self-healing diagnostics");
            $_SESSION['flash_success'] = "Self Healing completed. Output check logged in system.";
        }
        redirect('admin/settings');
    }
    
    public function withdrawals()
    {
        $stmt = $this->db->query("
            SELECT w.*, m.name as merchant_name 
            FROM withdrawals w 
            JOIN merchants m ON w.merchant_id = m.id 
            ORDER BY FIELD(w.status, 'pending', 'processing', 'completed', 'rejected'), w.created_at DESC
        ");
        $withdrawals = $stmt->fetchAll();
        
        $this->view('admin/withdrawals', [
            'title' => 'Withdrawal Requests - KathaPayment Admin',
            'withdrawals' => $withdrawals
        ]);
    }
    
    public function processWithdrawal()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->verifyCsrf();
            $withdrawalId = $_POST['withdrawal_id'] ?? '';
            $action = $_POST['action'] ?? ''; // 'approve' or 'reject'
            $note = trim($_POST['admin_note'] ?? '');
            
            try {
                $this->db->beginTransaction();
                
                $stmt = $this->db->prepare("SELECT * FROM withdrawals WHERE id = ? FOR UPDATE");
                $stmt->execute([$withdrawalId]);
                $withdrawal = $stmt->fetch();
                
                if (!$withdrawal || in_array($withdrawal['status'], ['completed', 'rejected'])) {
                    throw new \Exception("Withdrawal request is invalid or already processed.");
                }
                
                $newStatus = $action === 'approve' ? 'completed' : 'rejected';
                
                // Update withdrawal status
                $stmt = $this->db->prepare("UPDATE withdrawals SET status = ?, admin_note = ?, processed_at = NOW() WHERE id = ?");
                $stmt->execute([$newStatus, $note, $withdrawalId]);
                
                // Update merchant wallet
                if ($action === 'approve') {
                    // Deduct from locked balance permanently
                    $stmt = $this->db->prepare("UPDATE wallets SET locked_balance = locked_balance - ? WHERE owner_type = 'merchant' AND owner_id = ?");
                    $stmt->execute([$withdrawal['amount'], $withdrawal['merchant_id']]);
                } else if ($action === 'reject') {
                    // Return from locked balance back to available balance
                    $stmt = $this->db->prepare("UPDATE wallets SET locked_balance = locked_balance - ?, available_balance = available_balance + ? WHERE owner_type = 'merchant' AND owner_id = ?");
                    $stmt->execute([$withdrawal['amount'], $withdrawal['amount'], $withdrawal['merchant_id']]);
                }
                
                $this->logAction("PROCESS_WITHDRAWAL", $withdrawalId, "Action: $action, Amount: " . $withdrawal['amount']);
                
                $this->db->commit();
                $_SESSION['flash_success'] = "Withdrawal request " . $newStatus . " successfully.";
                
            } catch (\Exception $e) {
                $this->db->rollBack();
                $_SESSION['flash_error'] = "Failed: " . $e->getMessage();
            }
        }
        redirect('admin/withdrawals');
    }
}
