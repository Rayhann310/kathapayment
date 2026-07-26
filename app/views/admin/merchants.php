<?php ob_start(); ?>

<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Merchants</h1>
        <p class="mt-1 text-sm text-gray-500">Manage all registered merchants in the system.</p>
    </div>
</div>

<?php if (isset($_SESSION['flash_success'])): ?>
<div class="p-4 mb-6 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
  <span class="font-medium">Success!</span> <?= $_SESSION['flash_success'] ?>
  <?php unset($_SESSION['flash_success']); ?>
</div>
<?php endif; ?>

<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-4">Merchant ID</th>
                    <th scope="col" class="px-6 py-4">Business Name</th>
                    <th scope="col" class="px-6 py-4">Owner</th>
                    <th scope="col" class="px-6 py-4">Status</th>
                    <th scope="col" class="px-6 py-4">Registered</th>
                    <th scope="col" class="px-6 py-4 text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($merchants)): ?>
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">No merchants found.</td>
                </tr>
                <?php else: ?>
                    <?php foreach ($merchants as $m): ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors">
                        <td class="px-6 py-4 font-mono text-xs text-gray-500">
                            <?= htmlspecialchars($m['merchant_id']) ?>
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            <?= htmlspecialchars($m['name']) ?>
                            <?php if ($m['is_sandbox']): ?>
                                <span class="ml-2 bg-yellow-100 text-yellow-800 text-xs px-2 py-0.5 rounded">Sandbox</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-gray-900 dark:text-white"><?= htmlspecialchars($m['owner_name']) ?></div>
                            <div class="text-xs text-gray-500"><?= htmlspecialchars($m['owner_email']) ?></div>
                        </td>
                        <td class="px-6 py-4">
                            <?php 
                            $statusClass = 'bg-gray-100 text-gray-800';
                            if ($m['status'] === 'active') $statusClass = 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300';
                            elseif ($m['status'] === 'suspended') $statusClass = 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300';
                            ?>
                            <span class="px-2.5 py-1 text-xs font-medium rounded-full <?= $statusClass ?>">
                                <?= ucfirst($m['status']) ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-500 text-xs">
                            <?= date('d M Y', strtotime($m['created_at'])) ?>
                        </td>
                        <td class="px-6 py-4 text-right flex justify-end gap-2 items-center">
                            <a href="<?= base_url('admin/merchants/detail/' . $m['id']) ?>" class="text-primary-600 hover:underline text-xs font-medium mr-2">View</a>
                            <form action="<?= base_url('admin/merchants/status') ?>" method="POST" onsubmit="return confirm('Change merchant status?');">
                                <?= csrf_field() ?>
                                <input type="hidden" name="merchant_id" value="<?= $m['id'] ?>">
                                <select name="status" onchange="this.form.submit()" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded focus:ring-primary-500 focus:border-primary-500 block p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                    <option value="active" <?= $m['status'] === 'active' ? 'selected' : '' ?>>Active</option>
                                    <option value="inactive" <?= $m['status'] === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                                    <option value="suspended" <?= $m['status'] === 'suspended' ? 'selected' : '' ?>>Suspended</option>
                                </select>
                            </form>
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
