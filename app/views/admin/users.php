<?php ob_start(); ?>

<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">User Management</h1>
        <p class="mt-1 text-sm text-gray-500">Manage super admins, merchant owners, and system access.</p>
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
                    <th scope="col" class="px-6 py-4">User</th>
                    <th scope="col" class="px-6 py-4">Email</th>
                    <th scope="col" class="px-6 py-4">Current Role</th>
                    <th scope="col" class="px-6 py-4">Registered</th>
                    <th scope="col" class="px-6 py-4 text-right">Change Role</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($users)): ?>
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">No users found.</td>
                </tr>
                <?php else: ?>
                    <?php foreach ($users as $u): ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            <?= htmlspecialchars($u['name']) ?>
                            <?php if ($u['id'] === $_SESSION['user_id']): ?>
                                <span class="ml-2 bg-blue-100 text-blue-800 text-xs px-2 py-0.5 rounded">You</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4 text-gray-500">
                            <?= htmlspecialchars($u['email']) ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php 
                            $roleClass = 'bg-gray-100 text-gray-800';
                            if ($u['role'] === 'super_admin') $roleClass = 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300';
                            elseif ($u['role'] === 'merchant_owner') $roleClass = 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300';
                            ?>
                            <span class="px-2.5 py-1 text-xs font-medium rounded-full <?= $roleClass ?>">
                                <?= str_replace('_', ' ', ucfirst($u['role'])) ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-500 text-xs">
                            <?= date('d M Y', strtotime($u['created_at'])) ?>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2 items-center">
                                <?php if ($u['deleted_at']): ?>
                                    <span class="text-xs text-red-500 font-medium">Deleted</span>
                                <?php else: ?>
                                    <form action="<?= base_url('admin/users/role') ?>" method="POST" class="inline-block" onsubmit="return confirm('Change user role?');">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="user_id" value="<?= $u['id'] ?>">
                                        <select name="role" onchange="this.form.submit()" <?= $u['id'] === $_SESSION['user_id'] ? 'disabled' : '' ?> class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded focus:ring-primary-500 focus:border-primary-500 block p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                            <option value="customer" <?= $u['role'] === 'customer' ? 'selected' : '' ?>>Customer</option>
                                            <option value="merchant_owner" <?= $u['role'] === 'merchant_owner' ? 'selected' : '' ?>>Merchant</option>
                                            <option value="support" <?= $u['role'] === 'support' ? 'selected' : '' ?>>Support</option>
                                            <option value="finance" <?= $u['role'] === 'finance' ? 'selected' : '' ?>>Finance</option>
                                            <option value="super_admin" <?= $u['role'] === 'super_admin' ? 'selected' : '' ?>>Super Admin</option>
                                        </select>
                                    </form>
                                    
                                    <?php if ($u['id'] !== $_SESSION['user_id']): ?>
                                        <form action="<?= base_url('admin/users/reset') ?>" method="POST" class="inline-block" onsubmit="return confirm('Generate new random password for this user?');">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="user_id" value="<?= $u['id'] ?>">
                                            <button type="submit" class="text-gray-500 hover:text-primary-600 ml-2" title="Reset Password"><i class="fa-solid fa-key"></i></button>
                                        </form>
                                        <form action="<?= base_url('admin/users/delete') ?>" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="user_id" value="<?= $u['id'] ?>">
                                            <button type="submit" class="text-gray-500 hover:text-red-600 ml-2" title="Delete User"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
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
