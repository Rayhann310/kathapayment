<?php ob_start(); ?>

<div class="mb-6 flex justify-between items-center">
    <div>
        <a href="<?= base_url('admin/merchants') ?>" class="text-sm text-primary-600 hover:underline mb-2 inline-block">&larr; Back to Merchants</a>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Merchant Details: <?= htmlspecialchars($merchant['name']) ?></h1>
        <p class="mt-1 text-sm text-gray-500">Merchant ID: <span class="font-mono"><?= htmlspecialchars($merchant['merchant_id']) ?></span></p>
    </div>
</div>

<?php if (isset($_SESSION['flash_success'])): ?>
<div class="p-4 mb-6 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
  <span class="font-medium">Success!</span> <?= $_SESSION['flash_success'] ?>
  <?php unset($_SESSION['flash_success']); ?>
</div>
<?php endif; ?>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6">
        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Owner Information</h3>
        <dl class="space-y-4 text-sm">
            <div>
                <dt class="text-gray-500">Owner Name</dt>
                <dd class="font-medium text-gray-900 dark:text-white mt-1"><?= htmlspecialchars($merchant['owner_name']) ?></dd>
            </div>
            <div>
                <dt class="text-gray-500">Owner Email</dt>
                <dd class="font-medium text-gray-900 dark:text-white mt-1"><?= htmlspecialchars($merchant['owner_email']) ?></dd>
            </div>
            <div>
                <dt class="text-gray-500">Status</dt>
                <dd class="font-medium mt-1">
                    <?php 
                    $statusClass = 'bg-gray-100 text-gray-800';
                    if ($merchant['status'] === 'active') $statusClass = 'text-green-600';
                    elseif ($merchant['status'] === 'suspended') $statusClass = 'text-red-600';
                    ?>
                    <span class="<?= $statusClass ?> font-bold uppercase"><?= $merchant['status'] ?></span>
                </dd>
            </div>
            <div>
                <dt class="text-gray-500">Environment</dt>
                <dd class="font-medium mt-1">
                    <?= $merchant['is_sandbox'] ? '<span class="text-yellow-600">Sandbox</span>' : '<span class="text-green-600">Live</span>' ?>
                </dd>
            </div>
        </dl>
    </div>
    
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6">
        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">API Configuration</h3>
        <dl class="space-y-4 text-sm">
            <div>
                <dt class="text-gray-500">Public Key</dt>
                <dd class="font-mono text-xs mt-1 text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-700 p-2 rounded border border-gray-200 dark:border-gray-600">
                    <?= htmlspecialchars($merchant['public_key']) ?>
                </dd>
            </div>
            <div>
                <dt class="text-gray-500">Secret Key</dt>
                <dd class="font-mono text-xs mt-1 text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-700 p-2 rounded border border-gray-200 dark:border-gray-600">
                    <?= substr($merchant['secret_key'], 0, 8) ?>......................
                </dd>
            </div>
            <div>
                <dt class="text-gray-500">Webhook URL</dt>
                <dd class="font-medium text-gray-900 dark:text-white mt-1 break-all">
                    <?= htmlspecialchars($merchant['webhook_url'] ?? 'Not configured') ?>
                </dd>
            </div>
        </dl>
    </div>
</div>

<div class="bg-red-50 dark:bg-red-900/10 rounded-xl border border-red-200 dark:border-red-900/50 p-6 mb-6">
    <h3 class="text-lg font-medium text-red-800 dark:text-red-400 mb-2">Danger Zone</h3>
    <p class="text-sm text-red-600 dark:text-red-300 mb-4">Rolling API keys will immediately invalidate all existing integrations for this merchant. Only do this if the merchant's keys are suspected to be compromised.</p>
    
    <form action="<?= base_url('admin/merchants/roll_keys/' . $merchant['id']) ?>" method="POST" onsubmit="return confirm('WARNING: This will instantly invalidate the merchant\'s current API keys. Are you sure?');">
        <?= csrf_field() ?>
        <button type="submit" class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 transition-colors shadow-sm flex items-center gap-2">
            <i class="fa-solid fa-triangle-exclamation"></i> Emergency Roll Keys
        </button>
    </form>
</div>

<?php 
$content = ob_get_clean(); 
include BASE_PATH . '/app/views/layouts/main.php'; 
?>
