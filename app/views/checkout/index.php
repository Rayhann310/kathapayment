<?php ob_start(); ?>

<div class="min-h-screen bg-gray-50 flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-white rounded-xl shadow-lg overflow-hidden">
        
        <!-- Header -->
        <div class="bg-gray-800 p-6 text-center">
            <h2 class="text-2xl font-bold text-white">KathaPayment Secure</h2>
            <p class="text-gray-400 mt-1">Invoice: <?= $invoice['invoice_number'] ?></p>
        </div>

        <div class="p-6">
            <?php if (isset($_GET['success'])): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                  <strong class="font-bold">Payment Successful!</strong>
                  <span class="block sm:inline">Thank you for your payment.</span>
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['error'])): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                  <strong class="font-bold">Payment Failed!</strong>
                  <span class="block sm:inline">There was an issue processing your payment.</span>
                </div>
            <?php endif; ?>

            <div class="flex justify-between items-center mb-6">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Billed to</p>
                    <p class="text-gray-900 font-semibold"><?= $invoice['customer_name'] ?? 'Customer' ?></p>
                    <p class="text-gray-600 text-sm"><?= $invoice['customer_email'] ?? 'No email provided' ?></p>
                </div>
                <div class="text-right">
                    <p class="text-gray-500 text-sm font-medium">Total Amount</p>
                    <p class="text-3xl font-bold text-gray-900">Rp <?= number_format($invoice['amount'], 0, ',', '.') ?></p>
                </div>
            </div>

            <div class="border-t border-gray-200 py-4">
                <p class="text-gray-700"><?= $invoice['description'] ?></p>
            </div>

            <div class="mt-6">
                <?php if ($invoice['is_expired']): ?>
                    <div class="bg-red-50 text-red-600 p-4 rounded-lg text-center font-semibold">
                        This invoice has expired.
                    </div>
                <?php elseif ($invoice['status'] === 'paid'): ?>
                    <div class="bg-green-50 text-green-600 p-4 rounded-lg text-center font-semibold">
                        <i class="fa-solid fa-circle-check mr-2"></i> This invoice is PAID.
                    </div>
                <?php else: ?>
                    <form action="<?= base_url('pay/' . $invoice['invoice_number'] . '/process') ?>" method="POST">
                        <p class="text-sm text-gray-600 mb-4 text-center">Select Payment Method (Simulation)</p>
                        
                        <div class="space-y-3 mb-6">
                            <label class="flex items-center p-3 border rounded-lg cursor-pointer hover:bg-gray-50">
                                <input type="radio" name="payment_method" value="bca_va" class="text-primary-600 focus:ring-primary-500" checked>
                                <span class="ml-3 font-medium">BCA Virtual Account</span>
                            </label>
                            <label class="flex items-center p-3 border rounded-lg cursor-pointer hover:bg-gray-50">
                                <input type="radio" name="payment_method" value="qris" class="text-primary-600 focus:ring-primary-500">
                                <span class="ml-3 font-medium">QRIS (GoPay/OVO/Dana)</span>
                            </label>
                        </div>
                        
                        <button type="submit" class="w-full bg-primary-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-primary-700 transition duration-200 shadow-md">
                            Pay Now
                        </button>
                    </form>
                <?php endif; ?>
            </div>
            
            <div class="mt-6 text-center text-xs text-gray-400">
                <i class="fa-solid fa-lock mr-1"></i> Secure payment processed by KathaPayment
            </div>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean(); 
$hideNavbar = true; 
include BASE_PATH . '/app/views/layouts/main.php'; 
?>
