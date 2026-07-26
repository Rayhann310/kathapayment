<?php ob_start(); ?>

<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Withdrawal Requests</h1>
        <p class="mt-1 text-sm text-gray-500">Manage and process merchant payout requests.</p>
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

<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-4">Date</th>
                    <th scope="col" class="px-6 py-4">Merchant</th>
                    <th scope="col" class="px-6 py-4">Amount</th>
                    <th scope="col" class="px-6 py-4">Bank Details</th>
                    <th scope="col" class="px-6 py-4">Status</th>
                    <th scope="col" class="px-6 py-4 text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($withdrawals)): ?>
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">No withdrawal requests found.</td>
                </tr>
                <?php else: ?>
                    <?php foreach ($withdrawals as $wd): ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 font-mono text-xs text-gray-500">
                            <?= date('d M Y, H:i', strtotime($wd['created_at'])) ?>
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            <?= htmlspecialchars($wd['merchant_name']) ?>
                        </td>
                        <td class="px-6 py-4 font-bold text-gray-900 dark:text-white">
                            Rp <?= number_format($wd['amount'], 0, ',', '.') ?>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-xs font-bold text-gray-900 dark:text-white"><?= htmlspecialchars($wd['bank_name']) ?></div>
                            <div class="text-xs text-gray-600 dark:text-gray-400 font-mono"><?= htmlspecialchars($wd['account_number']) ?></div>
                            <div class="text-xs text-gray-500"><?= htmlspecialchars($wd['account_name']) ?></div>
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
                        <td class="px-6 py-4 text-right">
                            <?php if ($wd['status'] === 'pending' || $wd['status'] === 'processing'): ?>
                                <button data-modal-target="process-modal-<?= $wd['id'] ?>" data-modal-toggle="process-modal-<?= $wd['id'] ?>" class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                    Process
                                </button>
                                
                                <!-- Process Modal -->
                                <div id="process-modal-<?= $wd['id'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-gray-900/50 backdrop-blur-sm">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-xl shadow dark:bg-gray-800">
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-700">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                    Process Withdrawal
                                                </h3>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="process-modal-<?= $wd['id'] ?>">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <form action="<?= base_url('admin/withdrawals/process') ?>" method="POST" class="p-4 md:p-5 text-left">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="withdrawal_id" value="<?= $wd['id'] ?>">
                                                
                                                <div class="mb-4">
                                                    <p class="text-sm text-gray-500 mb-2">You are processing a withdrawal of <strong class="text-gray-900 dark:text-white">Rp <?= number_format($wd['amount'], 0, ',', '.') ?></strong> for <strong class="text-gray-900 dark:text-white"><?= htmlspecialchars($wd['merchant_name']) ?></strong>.</p>
                                                    <p class="text-xs bg-gray-50 dark:bg-gray-700 p-2 rounded text-gray-600 dark:text-gray-400 font-mono">
                                                        Bank: <?= htmlspecialchars($wd['bank_name']) ?><br>
                                                        A/N: <?= htmlspecialchars($wd['account_name']) ?><br>
                                                        No: <?= htmlspecialchars($wd['account_number']) ?>
                                                    </p>
                                                </div>

                                                <div class="mb-4">
                                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Action</label>
                                                    <select name="action" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                                        <option value="approve">Approve (Mark as Paid)</option>
                                                        <option value="reject">Reject (Refund to Merchant)</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="mb-6">
                                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Admin Note (Optional)</label>
                                                    <input type="text" name="admin_note" placeholder="e.g. Invalid bank account" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                                </div>
                                                
                                                <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Confirm Action</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <span class="text-xs text-gray-400">Processed</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
// Simple manual modal toggle since we might not have flowbite JS initialized dynamically
document.querySelectorAll('[data-modal-toggle]').forEach(button => {
    button.addEventListener('click', function() {
        const targetId = this.getAttribute('data-modal-target') || this.getAttribute('data-modal-toggle');
        const modal = document.getElementById(targetId);
        if (modal) {
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }
    });
});
</script>

<?php 
$content = ob_get_clean(); 
include BASE_PATH . '/app/views/layouts/main.php'; 
?>
