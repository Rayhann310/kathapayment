<?php ob_start(); ?>

<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Global Settings</h1>
        <p class="mt-1 text-sm text-gray-500">Manage platform-wide configurations, fees, and run system diagnostics.</p>
    </div>
</div>

<?php if (isset($_SESSION['flash_success'])): ?>
<div class="p-4 mb-6 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
  <span class="font-medium">Success!</span> <?= $_SESSION['flash_success'] ?>
  <?php unset($_SESSION['flash_success']); ?>
</div>
<?php endif; ?>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
        <div class="p-6 border-b border-gray-100 dark:border-gray-700">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white">Platform Fees</h3>
            <p class="text-sm text-gray-500 mt-1">Configure how much the platform charges merchants per transaction.</p>
        </div>
        <div class="p-6">
            <form action="<?= base_url('admin/settings/update') ?>" method="POST" class="space-y-4">
                <?= csrf_field() ?>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fixed Fee (IDR)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <span class="text-gray-500 dark:text-gray-400 sm:text-sm">Rp</span>
                        </div>
                        <input type="number" name="fee_fixed" value="<?= htmlspecialchars($settings['fee_fixed'] ?? '4000') ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Applied as a flat rate on every successful transaction.</p>
                </div>
                
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Percentage Fee (%)</label>
                    <div class="relative">
                        <input type="number" step="0.01" name="fee_percentage" value="<?= htmlspecialchars($settings['fee_percentage'] ?? '1.5') ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <span class="text-gray-500 dark:text-gray-400 sm:text-sm">%</span>
                        </div>
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Applied as a percentage of the total transaction volume.</p>
                </div>
                
                <button type="submit" class="w-full bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center transition-colors">
                    Save Fee Configuration
                </button>
            </form>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
        <div class="p-6 border-b border-gray-100 dark:border-gray-700">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white">System Diagnostics</h3>
            <p class="text-sm text-gray-500 mt-1">Run administrative maintenance operations.</p>
        </div>
        <div class="p-6 space-y-6">
            <div class="flex items-center justify-between">
                <div>
                    <h4 class="font-medium text-gray-900 dark:text-white">Self Healing Service</h4>
                    <p class="text-sm text-gray-500 mt-1">Manually trigger the self-healing routine to check DB integrity, stuck webhooks, and pending payments.</p>
                </div>
                <form action="<?= base_url('admin/heal') ?>" method="POST" onsubmit="return confirm('Run Self Healing? This may take a moment.');">
                    <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg font-medium text-sm transition-colors shadow-sm flex items-center gap-2">
                        <i class="fa-solid fa-stethoscope"></i> Run Diagnostics
                    </button>
                </form>
            </div>
            
            <div class="pt-4 border-t border-gray-100 dark:border-gray-700 flex items-center justify-between">
                <div>
                    <h4 class="font-medium text-gray-900 dark:text-white">Maintenance Mode</h4>
                    <p class="text-sm text-gray-500 mt-1">Take the system offline for scheduled upgrades.</p>
                </div>
                <button type="button" disabled class="opacity-50 cursor-not-allowed bg-gray-600 text-white px-4 py-2 rounded-lg font-medium text-sm transition-colors shadow-sm flex items-center gap-2">
                    <i class="fa-solid fa-power-off"></i> Enter Maintenance
                </button>
            </div>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean(); 
include BASE_PATH . '/app/views/layouts/main.php'; 
?>
