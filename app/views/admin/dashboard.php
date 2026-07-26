<?php ob_start(); ?>

<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">System Overview</h1>
        <p class="mt-1 text-sm text-gray-500">Welcome back, <?= htmlspecialchars($_SESSION['user_name'] ?? 'Super Admin') ?>. Here's what's happening on KathaPayment today.</p>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Users</h3>
            <div class="w-8 h-8 bg-blue-50 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-users text-blue-500"></i>
            </div>
        </div>
        <p class="text-3xl font-bold text-gray-900 dark:text-white"><?= number_format($stats['users']) ?></p>
    </div>
    
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Active Merchants</h3>
            <div class="w-8 h-8 bg-purple-50 dark:bg-purple-900/30 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-store text-purple-500"></i>
            </div>
        </div>
        <p class="text-3xl font-bold text-gray-900 dark:text-white"><?= number_format($stats['merchants']) ?></p>
    </div>
    
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Processed Volume (IDR)</h3>
            <div class="w-8 h-8 bg-indigo-50 dark:bg-indigo-900/30 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-money-bill-transfer text-indigo-500"></i>
            </div>
        </div>
        <p class="text-3xl font-bold text-gray-900 dark:text-white"><?= number_format($stats['volume'], 0, ',', '.') ?></p>
    </div>
    
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6 border-l-4 border-l-green-500">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Est. Platform Revenue</h3>
            <div class="w-8 h-8 bg-green-50 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-sack-dollar text-green-500"></i>
            </div>
        </div>
        <p class="text-3xl font-bold text-green-600 dark:text-green-400">Rp <?= number_format($stats['revenue'], 0, ',', '.') ?></p>
    </div>
</div>

<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden p-12 text-center mt-6">
    <div class="w-16 h-16 bg-gray-50 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4">
        <i class="fa-solid fa-chart-line text-2xl text-gray-400"></i>
    </div>
    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Metrics Chart (Placeholder)</h3>
    <p class="text-gray-500 dark:text-gray-400 max-w-sm mx-auto">This space is reserved for a Chart.js visualization of Daily Transaction Volume vs Platform Revenue.</p>
</div>

<?php 
$content = ob_get_clean(); 
include BASE_PATH . '/app/views/layouts/main.php'; 
?>
