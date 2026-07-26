<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\InvoiceModel;

class PaymentController extends Controller
{
    public function checkout($invoiceNumber)
    {
        $invoiceModel = new InvoiceModel();
        $invoice = $invoiceModel->findByInvoiceNumber($invoiceNumber);

        if (!$invoice) {
            header("HTTP/1.0 404 Not Found");
            echo "<h1>404 - Invoice Not Found</h1>";
            echo "<p>The invoice you are looking for does not exist or has been deleted.</p>";
            exit;
        }

        // Check if expired
        if ($invoice['status'] === 'expired' || strtotime($invoice['expired_at']) < time()) {
            if ($invoice['status'] !== 'expired') {
                // Update to expired in DB in a real scenario
            }
            $invoice['is_expired'] = true;
        } else {
            $invoice['is_expired'] = false;
        }

        $this->view('checkout/index', ['invoice' => $invoice]);
    }

    public function process($invoiceNumber)
    {
        // This would handle the actual payment processing (e.g., simulating a successful payment via VA or E-Wallet)
        // For now, let's just mark it as paid.
        
        $invoiceModel = new InvoiceModel();
        $invoice = $invoiceModel->findByInvoiceNumber($invoiceNumber);

        if ($invoice && $invoice['status'] === 'pending') {
            // Simulated Payment Process
            $db = \App\Providers\Database::getInstance()->getConnection();
            $db->prepare("UPDATE invoices SET status = 'paid' WHERE id = ?")->execute([$invoice['id']]);
            
            // Add funds to Merchant Wallet
            $walletModel = new \App\Models\WalletModel();
            $wallet = $walletModel->createOrGetWallet('merchant', $invoice['merchant_id']);
            
            // Fetch dynamic platform fees
            $stmt = $db->query("SELECT key_name, key_value FROM global_settings");
            $settings = [];
            while ($row = $stmt->fetch()) {
                $settings[$row['key_name']] = (float)$row['key_value'];
            }
            
            $feeFixed = $settings['fee_fixed'] ?? 4000;
            $feePercent = $settings['fee_percentage'] ?? 1.5;
            
            // Calculate fee: Fixed amount + Percentage of total transaction
            $fee = $feeFixed + ($invoice['amount'] * ($feePercent / 100));
            $netAmount = $invoice['amount'] - $fee;
            
            $walletModel->addBalance($wallet['id'], $netAmount, 'available_balance');
            
            // Record payment
            $paymentId = bin2hex(random_bytes(18));
            $db->prepare("
                INSERT INTO payments (id, invoice_id, payment_method, amount, fee, status, paid_at)
                VALUES (?, ?, 'simulated', ?, ?, 'success', NOW())
            ")->execute([$paymentId, $invoice['id'], $invoice['amount'], $fee]);
            
            // Trigger Webhook Event (Payment Success)
            $webhookService = new \App\Services\WebhookService();
            $webhookService->dispatch($invoice['merchant_id'], 'payment.success', [
                'invoice_id' => $invoice['id'],
                'invoice_number' => $invoice['invoice_number'],
                'amount' => $invoice['amount'],
                'net_amount' => $netAmount,
                'fee' => $fee,
                'status' => 'paid',
                'paid_at' => date('Y-m-d H:i:s')
            ]);
            
            redirect('pay/' . $invoiceNumber . '?success=1');
        }
        
        redirect('pay/' . $invoiceNumber . '?error=1');
    }
}
