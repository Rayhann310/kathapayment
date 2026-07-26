<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Middleware\AuthMiddleware;

class DashboardController extends Controller
{
    public function __construct()
    {
        AuthMiddleware::handle();
    }

    public function index()
    {
        if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'super_admin') {
            redirect('admin/dashboard');
        }

        $db = \App\Providers\Database::getInstance()->getConnection();
        
        // Fetch total revenue (sum of paid invoices)
        $stmt = $db->query("SELECT SUM(amount) as total FROM invoices WHERE status = 'paid'");
        $totalRevenue = $stmt->fetch()['total'] ?? 0;
        
        // Fetch total transactions
        $stmt = $db->query("SELECT COUNT(*) as total FROM invoices");
        $totalTransactions = $stmt->fetch()['total'] ?? 0;
        
        // Fetch active merchants
        $stmt = $db->query("SELECT COUNT(*) as total FROM merchants");
        $activeMerchants = $stmt->fetch()['total'] ?? 0;
        
        // Calculate success rate
        $stmt = $db->query("SELECT COUNT(*) as paid FROM invoices WHERE status = 'paid'");
        $paidTransactions = $stmt->fetch()['paid'] ?? 0;
        
        $successRate = $totalTransactions > 0 ? round(($paidTransactions / $totalTransactions) * 100, 1) : 0;

        $data = [
            'title' => 'Dashboard - KathaPayment',
            'total_revenue' => 'Rp ' . number_format($totalRevenue, 0, ',', '.'),
            'total_transactions' => $totalTransactions,
            'active_merchants' => $activeMerchants,
            'success_rate' => $successRate . '%'
        ];

        $this->view('dashboard/index', $data);
    }
}
