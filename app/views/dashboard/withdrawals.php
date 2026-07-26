<?php ob_start(); ?>

<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Withdrawals</h1>
        <p class="mt-1 text-sm text-gray-500">Withdraw your funds to your bank account.</p>
    </div>
</div>

<?php if (isset($_SESSION['flash_success'])): ?>
<div class="p-4 mb-6 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
  <span class="font-medium">Success!</span> <?= $_SESSION['flash_success'] ?>
  <?php unset($_SESSION['flash_success']); ?>
</div>
<?php endif; ?>

<?php if (isset($_SESSION['flash_error'])): ?>
<div class="p-4 mb-6 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
  <span class="font-medium">Error!</span> <?= $_SESSION['flash_error'] ?>
  <?php unset($_SESSION['flash_error']); ?>
</div>
<?php endif; ?>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-primary-600 rounded-xl shadow-sm border border-primary-700 p-6 text-white col-span-2">
        <h3 class="text-sm font-medium text-primary-100 mb-1">Available to Withdraw</h3>
        <p class="text-4xl font-bold mb-4">Rp <?= number_format($wallet['available_balance'], 0, ',', '.') ?></p>
        <p class="text-sm text-primary-100">Locked/Pending Balance: Rp <?= number_format($wallet['locked_balance'], 0, ',', '.') ?></p>
    </div>
    
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6">
        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Request Withdrawal</h3>
        
        <?php if ($wallet['available_balance'] >= 50000): ?>
            <form action="<?= base_url('withdrawals/request') ?>" method="POST" class="space-y-4">
                <?= csrf_field() ?>
                <div>
                    <label class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Amount (Min Rp 50.000)</label>
                    <input type="number" name="amount" min="50000" max="<?= $wallet['available_balance'] ?>" step="1" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>
                <div>
                    <label class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Bank Name</label>
                    <input type="text" name="bank_name" placeholder="BCA / Mandiri / BNI" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>
                <div>
                    <label class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Account Number</label>
                    <input type="text" name="account_number" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>
                <div>
                    <label class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Account Name</label>
                    <input type="text" name="account_name" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>
                <button type="submit" class="w-full bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg text-sm px-5 py-2 text-center transition-colors">Submit Request</button>
            </form>
        <?php else: ?>
            <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                Your available balance is less than the minimum withdrawal amount of Rp 50.000.
            </div>
        <?php endif; ?>
    </div>
</div>

<h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Withdrawal History</h3>
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-4">Date</th>
                    <th scope="col" class="px-6 py-4">Amount</th>
                    <th scope="col" class="px-6 py-4">Bank Details</th>
                    <th scope="col" class="px-6 py-4">Status</th>
                    <th scope="col" class="px-6 py-4">Note</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($withdrawals)): ?>
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">No withdrawal history found.</td>
                </tr>
                <?php else: ?>
                    <?php foreach ($withdrawals as $wd): ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 font-mono text-xs text-gray-500">
                            <?= date('d M Y, H:i', strtotime($wd['created_at'])) ?>
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            Rp <?= number_format($wd['amount'], 0, ',', '.') ?>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-xs font-bold text-gray-900 dark:text-white"><?= htmlspecialchars($wd['bank_name']) ?></div>
                            <div class="text-xs"><?= htmlspecialchars($wd['account_number']) ?></div>
                            <div class="text-xs text-gray-400"><?= htmlspecialchars($wd['account_name']) ?></div>
                        </td>
                        <td class="px-6 py-4">
                            <?php 
                            $statusClass = 'bg-gray-100 text-gray-800';
                            if ($wd['status'] === 'completed') $statusClass = 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300';
                            elseif ($wd['status'] === 'pending') $statusClass = 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300';
                            elseif ($wd['status'] === 'processing') $statusClass = 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300';
                            elseif ($wd['status'] === 'rejected') $statusClass = 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300';
                            ?>
                            <span class="px-2.5 py-1 text-xs font-medium rounded-full <?= $statusClass ?>">
                                <?= ucfirst($wd['status']) ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 text-xs text-gray-500">
                            <?= htmlspecialchars($wd['admin_note'] ?? '-') ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php 
$content = ob_get_clean(); 
include BASE_PATH . '/app/views/layouts/main.php'; 
?>
