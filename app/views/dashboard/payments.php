<?php ob_start(); ?>

<div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <h2 class="text-2xl font-extrabold text-gray-900 tracking-tight">Transactions</h2>
        <p class="text-sm text-gray-500 mt-1">Pantau seluruh riwayat transaksi dan pembayaran pelanggan Anda.</p>
    </div>
    <div class="flex items-center gap-3">
        <button class="bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 font-semibold py-2 px-4 rounded-xl shadow-sm text-sm transition-all flex items-center gap-2">
            <i class="fa-solid fa-download"></i> Export CSV
        </button>
    </div>
</div>

<!-- Stats (Mock Data for Premium UI Feel) -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Total Volume</p>
            <h3 class="text-2xl font-extrabold text-gray-900">Rp 45.2M</h3>
            <div class="text-xs font-semibold text-green-600 mt-2 flex items-center gap-1">
                <i class="fa-solid fa-arrow-trend-up"></i> +8.4% vs last month
            </div>
        </div>
        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center text-xl">
            <i class="fa-solid fa-chart-line"></i>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Successful</p>
            <h3 class="text-2xl font-extrabold text-gray-900">8,240</h3>
            <div class="text-xs font-semibold text-green-600 mt-2 flex items-center gap-1">
                <i class="fa-solid fa-check"></i> 99.2% Success Rate
            </div>
        </div>
        <div class="w-12 h-12 bg-green-50 text-green-600 rounded-xl flex items-center justify-center text-xl">
            <i class="fa-solid fa-money-bill-transfer"></i>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Refunds</p>
            <h3 class="text-2xl font-extrabold text-gray-900">12</h3>
            <div class="text-xs font-semibold text-red-500 mt-2 flex items-center gap-1">
                <i class="fa-solid fa-arrow-trend-up"></i> 0.8% Refund Rate
            </div>
        </div>
        <div class="w-12 h-12 bg-red-50 text-red-600 rounded-xl flex items-center justify-center text-xl">
            <i class="fa-solid fa-arrow-rotate-left"></i>
        </div>
    </div>
</div>

<!-- Tabs -->
<div class="border-b border-gray-200 mb-6">
    <nav class="-mb-px flex gap-6">
        <a href="#" class="border-b-2 border-blue-600 text-blue-600 font-bold py-3 px-1 text-sm">All Transactions</a>
        <a href="#" class="border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium py-3 px-1 text-sm transition-colors">Succeeded</a>
        <a href="#" class="border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium py-3 px-1 text-sm transition-colors">Refunded</a>
        <a href="#" class="border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium py-3 px-1 text-sm transition-colors">Failed</a>
    </nav>
</div>

<!-- Table Container -->
<div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm mb-6">
    <div class="p-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <form action="" method="GET" class="relative w-full sm:w-80">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
            </div>
            <input type="text" name="search" value="<?= htmlspecialchars($search ?? '') ?>" class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2" placeholder="Search Trx ID, Customer, Ref...">
            <?php if (!empty($search)): ?>
                <a href="<?= base_url('payments') ?>" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600">
                    <i class="fa-solid fa-xmark"></i>
                </a>
            <?php endif; ?>
        </form>
        <button class="text-gray-500 hover:text-gray-700 font-medium text-sm flex items-center gap-2">
            <i class="fa-solid fa-filter"></i> Filter
        </button>
    </div>

    <?php if (empty($payments) && empty($search)): ?>
        <div class="p-16 text-center">
            <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4 border border-gray-100 shadow-sm">
                <i class="fa-solid fa-money-bill-transfer text-3xl text-gray-400"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Belum ada transaksi</h3>
            <p class="text-gray-500 text-sm max-w-sm mx-auto">Ketika pelanggan membayar invoice atau payment link Anda, transaksi yang berhasil akan muncul di sini.</p>
        </div>
    <?php else: ?>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-400 uppercase bg-gray-50/50">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider">Transaction ID</th>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider">Amount</th>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider">Customer</th>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider">Method</th>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php if (empty($payments)): ?>
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-gray-500 font-medium">Pencarian tidak menemukan transaksi apapun.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($payments as $pay): ?>
                            <tr class="hover:bg-gray-50/50 transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="font-bold text-gray-900 flex items-center gap-2 cursor-pointer hover:text-blue-600">
                                        <?= htmlspecialchars(substr($pay['id'], 0, 18)) ?>...
                                    </div>
                                    <div class="text-[11px] text-gray-500 mt-0.5">
                                        Ref: <?= htmlspecialchars($pay['invoice_number']) ?>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-bold text-gray-900">
                                        <?= htmlspecialchars($pay['currency']) ?> <?= number_format($pay['amount'], 0, ',', '.') ?>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-medium text-gray-900 truncate max-w-[150px]">
                                        <?= htmlspecialchars($pay['customer_name'] ?? 'Guest Customer') ?>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <?php
                                        $method = strtolower($pay['payment_method'] ?? 'unknown');
                                        $icon = 'fa-credit-card';
                                        if (strpos($method, 'va') !== false || strpos($method, 'bank') !== false) $icon = 'fa-building-columns';
                                        if (strpos($method, 'qris') !== false || strpos($method, 'ewallet') !== false) $icon = 'fa-qrcode';
                                    ?>
                                    <div class="flex items-center gap-2">
                                        <div class="w-6 h-6 bg-gray-100 rounded flex items-center justify-center text-gray-500 text-xs">
                                            <i class="fa-solid <?= $icon ?>"></i>
                                        </div>
                                        <span class="font-medium text-gray-700"><?= strtoupper($pay['payment_method']) ?></span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="bg-green-100 text-green-700 text-xs font-bold px-2.5 py-1 rounded-full border border-green-200">Succeeded</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-medium text-gray-900">
                                        <?= $pay['paid_at'] ? date('d M Y', strtotime($pay['paid_at'])) : '-' ?>
                                    </div>
                                    <div class="text-[11px] text-gray-500 mt-0.5">
                                        <?= $pay['paid_at'] ? date('H:i:s', strtotime($pay['paid_at'])) : '-' ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <?php if ($totalPages > 1): ?>
        <div class="p-4 border-t border-gray-100 flex items-center justify-between">
            <span class="text-sm text-gray-500">
                Showing Page <span class="font-bold text-gray-900"><?= $page ?></span> of <span class="font-bold text-gray-900"><?= $totalPages ?></span>
            </span>
            <div class="flex gap-1">
                <?php if ($page > 1): ?>
                    <a href="?page=<?= $page - 1 ?><?= !empty($search) ? '&search='.urlencode($search) : '' ?>" class="p-2 border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        <i class="fa-solid fa-chevron-left text-xs"></i>
                    </a>
                <?php else: ?>
                    <button disabled class="p-2 border border-gray-200 rounded-lg text-gray-300 cursor-not-allowed bg-gray-50">
                        <i class="fa-solid fa-chevron-left text-xs"></i>
                    </button>
                <?php endif; ?>

                <?php if ($page < $totalPages): ?>
                    <a href="?page=<?= $page + 1 ?><?= !empty($search) ? '&search='.urlencode($search) : '' ?>" class="p-2 border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        <i class="fa-solid fa-chevron-right text-xs"></i>
                    </a>
                <?php else: ?>
                    <button disabled class="p-2 border border-gray-200 rounded-lg text-gray-300 cursor-not-allowed bg-gray-50">
                        <i class="fa-solid fa-chevron-right text-xs"></i>
                    </button>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
    <?php endif; ?>
</div>

<?php 
$content = ob_get_clean(); 
require BASE_PATH . '/app/views/layouts/main.php'; 
?>
