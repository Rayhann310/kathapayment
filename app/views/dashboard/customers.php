<?php ob_start(); ?>

<div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <h2 class="text-2xl font-extrabold text-gray-900 tracking-tight">Customers</h2>
        <p class="text-sm text-gray-500 mt-1">Kelola data pelanggan dan pantau riwayat pembelian mereka secara lengkap.</p>
    </div>
    <div class="flex items-center gap-3">
        <button class="bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 font-semibold py-2 px-4 rounded-xl shadow-sm text-sm transition-all flex items-center gap-2">
            <i class="fa-solid fa-download"></i> Export CSV
        </button>
        <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-xl shadow-sm shadow-blue-600/20 text-sm transition-all flex items-center gap-2">
            <i class="fa-solid fa-user-plus"></i> Add Customer
        </button>
    </div>
</div>

<!-- Stats (Mock Data for Premium UI Feel) -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Total Customers</p>
            <h3 class="text-2xl font-extrabold text-gray-900">1,452</h3>
            <div class="text-xs font-semibold text-green-600 mt-2 flex items-center gap-1">
                <i class="fa-solid fa-arrow-trend-up"></i> +45 new this month
            </div>
        </div>
        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center text-xl">
            <i class="fa-solid fa-users"></i>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Active Buyers</p>
            <h3 class="text-2xl font-extrabold text-gray-900">845</h3>
            <div class="text-xs font-semibold text-green-600 mt-2 flex items-center gap-1">
                <i class="fa-solid fa-cart-shopping"></i> 58% Conversion Rate
            </div>
        </div>
        <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-xl flex items-center justify-center text-xl">
            <i class="fa-solid fa-user-check"></i>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Average LTV</p>
            <h3 class="text-2xl font-extrabold text-gray-900">Rp 250.000</h3>
            <div class="text-xs font-semibold text-blue-600 mt-2 flex items-center gap-1">
                <i class="fa-solid fa-crown"></i> Lifetime Value per User
            </div>
        </div>
        <div class="w-12 h-12 bg-yellow-50 text-yellow-600 rounded-xl flex items-center justify-center text-xl">
            <i class="fa-solid fa-gem"></i>
        </div>
    </div>
</div>

<!-- Tabs -->
<div class="border-b border-gray-200 mb-6">
    <nav class="-mb-px flex gap-6">
        <a href="#" class="border-b-2 border-blue-600 text-blue-600 font-bold py-3 px-1 text-sm">All Customers</a>
        <a href="#" class="border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium py-3 px-1 text-sm transition-colors">Top Spenders</a>
        <a href="#" class="border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium py-3 px-1 text-sm transition-colors">Recent</a>
    </nav>
</div>

<!-- Table Container -->
<div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm mb-6">
    <div class="p-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <form action="" method="GET" class="relative w-full sm:w-80">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
            </div>
            <input type="text" name="search" value="<?= htmlspecialchars($search ?? '') ?>" class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2" placeholder="Search Customer Name or Email...">
            <?php if (!empty($search)): ?>
                <a href="<?= base_url('customers') ?>" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600">
                    <i class="fa-solid fa-xmark"></i>
                </a>
            <?php endif; ?>
        </form>
        <button class="text-gray-500 hover:text-gray-700 font-medium text-sm flex items-center gap-2">
            <i class="fa-solid fa-filter"></i> Filter
        </button>
    </div>

    <?php if (empty($customers) && empty($search)): ?>
        <div class="p-16 text-center">
            <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4 border border-gray-100 shadow-sm">
                <i class="fa-solid fa-users text-3xl text-gray-400"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Belum ada pelanggan</h3>
            <p class="text-gray-500 text-sm max-w-sm mx-auto">Begitu pelanggan pertama Anda berhasil menyelesaikan pembayaran, data mereka akan secara otomatis terekam di halaman ini.</p>
        </div>
    <?php else: ?>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-400 uppercase bg-gray-50/50">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider">Customer Details</th>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider text-center">Total Orders</th>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider text-right">Total Spent</th>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider text-right">Last Order</th>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php if (empty($customers)): ?>
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500 font-medium">Pencarian tidak menemukan pelanggan apapun.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($customers as $c): ?>
                            <tr class="hover:bg-gray-50/50 transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <?php 
                                            // Generate random initial color based on email
                                            $colors = ['bg-red-100 text-red-600', 'bg-blue-100 text-blue-600', 'bg-green-100 text-green-600', 'bg-yellow-100 text-yellow-600', 'bg-purple-100 text-purple-600', 'bg-pink-100 text-pink-600'];
                                            $colorClass = $colors[crc32($c['customer_email']) % count($colors)];
                                            $initials = substr(strtoupper($c['customer_name'] ?? $c['customer_email']), 0, 2);
                                        ?>
                                        <div class="w-10 h-10 rounded-full <?= $colorClass ?> flex items-center justify-center font-bold text-sm shrink-0">
                                            <?= $initials ?>
                                        </div>
                                        <div>
                                            <div class="font-bold text-gray-900 cursor-pointer hover:text-blue-600"><?= htmlspecialchars($c['customer_name'] ?? 'Unknown Name') ?></div>
                                            <div class="text-[11px] text-gray-500 mt-0.5">
                                                <?= htmlspecialchars($c['customer_email']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="bg-gray-100 text-gray-700 text-xs font-bold px-3 py-1 rounded-full border border-gray-200">
                                        <?= $c['total_orders'] ?> Orders
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="font-bold text-gray-900">
                                        Rp <?= number_format($c['total_spent'], 0, ',', '.') ?>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="font-medium text-gray-900">
                                        <?= date('d M Y', strtotime($c['last_order'])) ?>
                                    </div>
                                    <div class="text-[11px] text-gray-500 mt-0.5">
                                        <?= date('H:i:s', strtotime($c['last_order'])) ?>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button class="text-blue-600 hover:text-blue-800 font-semibold text-xs bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-lg transition-colors">
                                            View Profile
                                        </button>
                                        <button class="text-gray-400 hover:text-gray-900 p-2"><i class="fa-solid fa-ellipsis-vertical"></i></button>
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
