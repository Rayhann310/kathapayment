<?php ob_start(); ?>

<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Settings</h1>
        <p class="mt-1 text-sm text-gray-500">Manage your merchant account preferences.</p>
    </div>
</div>

<?php if (isset($_SESSION['flash_success'])): ?>
<div class="p-4 mb-6 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
  <span class="font-medium">Success!</span> <?= $_SESSION['flash_success'] ?>
  <?php unset($_SESSION['flash_success']); ?>
</div>
<?php endif; ?>

<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden mb-6">
    <div class="p-6 border-b border-gray-100 dark:border-gray-700">
        <h3 class="text-lg font-medium text-gray-900 dark:text-white">Business Information</h3>
    </div>
    <form action="<?= base_url('settings/update') ?>" method="POST" class="p-6 space-y-6">
        <?= csrf_field() ?>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Business Name</label>
            <input type="text" name="business_name" value="<?= htmlspecialchars($merchant['name'] ?? '') ?>" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Support Email</label>
            <input type="email" readonly value="<?= htmlspecialchars($user['email'] ?? '') ?>" class="bg-gray-100 border border-gray-300 text-gray-500 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400 cursor-not-allowed">
            <p class="mt-1 text-xs text-gray-500">To change your primary account email, please contact support.</p>
        </div>
        
        <div class="pt-4 flex justify-end">
            <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white px-5 py-2.5 rounded-lg font-medium text-sm transition-colors shadow-sm flex items-center gap-2">
                <i class="fa-solid fa-floppy-disk"></i> Save Changes
            </button>
        </div>
    </form>
</div>

<?php 
$content = ob_get_clean(); 
include BASE_PATH . '/app/views/layouts/main.php'; 
?>
