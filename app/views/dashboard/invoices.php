<?php ob_start(); ?>

<div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <h2 class="text-2xl font-extrabold text-gray-900 tracking-tight">Invoices</h2>
        <p class="text-sm text-gray-500 mt-1">Buat, kelola, dan pantau status tagihan tunggal ke pelanggan Anda.</p>
    </div>
    <div class="flex items-center gap-3">
        <button class="bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 font-semibold py-2 px-4 rounded-xl shadow-sm text-sm transition-all flex items-center gap-2">
            <i class="fa-solid fa-download"></i> Export
        </button>
        <button onclick="document.getElementById('create-invoice-modal').classList.remove('hidden')" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-xl shadow-sm shadow-blue-600/20 text-sm transition-all flex items-center gap-2">
            <i class="fa-solid fa-plus"></i> Create Invoice
        </button>
    </div>
</div>

<!-- Stats (Mock Data for Premium UI Feel) -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Unpaid Invoices</p>
            <h3 class="text-2xl font-extrabold text-gray-900">45</h3>
            <div class="text-xs font-semibold text-yellow-600 mt-2 flex items-center gap-1">
                Rp 12.450.000 menunggu pembayaran
            </div>
        </div>
        <div class="w-12 h-12 bg-yellow-50 text-yellow-600 rounded-xl flex items-center justify-center text-xl">
            <i class="fa-regular fa-clock"></i>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Paid (This Month)</p>
            <h3 class="text-2xl font-extrabold text-gray-900">128</h3>
            <div class="text-xs font-semibold text-green-600 mt-2 flex items-center gap-1">
                <i class="fa-solid fa-arrow-trend-up"></i> +12% dari bulan lalu
            </div>
        </div>
        <div class="w-12 h-12 bg-green-50 text-green-600 rounded-xl flex items-center justify-center text-xl">
            <i class="fa-solid fa-check-double"></i>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Expired / Failed</p>
            <h3 class="text-2xl font-extrabold text-gray-900">12</h3>
            <div class="text-xs font-semibold text-red-500 mt-2 flex items-center gap-1">
                8.5% Expired Rate
            </div>
        </div>
        <div class="w-12 h-12 bg-red-50 text-red-600 rounded-xl flex items-center justify-center text-xl">
            <i class="fa-solid fa-circle-xmark"></i>
        </div>
    </div>
</div>

<!-- Tabs -->
<div class="border-b border-gray-200 mb-6">
    <nav class="-mb-px flex gap-6">
        <a href="#" class="border-b-2 border-blue-600 text-blue-600 font-bold py-3 px-1 text-sm">All Invoices</a>
        <a href="#" class="border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium py-3 px-1 text-sm transition-colors">Pending</a>
        <a href="#" class="border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium py-3 px-1 text-sm transition-colors">Paid</a>
        <a href="#" class="border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium py-3 px-1 text-sm transition-colors">Expired</a>
    </nav>
</div>

<!-- Table Container -->
<div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm mb-6">
    <div class="p-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <form action="" method="GET" class="relative w-full sm:w-80">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
            </div>
            <input type="text" name="search" value="<?= htmlspecialchars($search ?? '') ?>" class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2" placeholder="Search Invoice Number or Customer...">
            <?php if (!empty($search)): ?>
                <a href="<?= base_url('invoices') ?>" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600">
                    <i class="fa-solid fa-xmark"></i>
                </a>
            <?php endif; ?>
        </form>
        <button class="text-gray-500 hover:text-gray-700 font-medium text-sm flex items-center gap-2">
            <i class="fa-solid fa-filter"></i> Filter
        </button>
    </div>

    <?php if (empty($invoices) && empty($search)): ?>
        <div class="p-16 text-center">
            <div class="w-20 h-20 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4 border border-blue-100 shadow-sm text-blue-600">
                <i class="fa-solid fa-file-invoice-dollar text-3xl"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Belum ada Invoice</h3>
            <p class="text-gray-500 text-sm max-w-sm mx-auto mb-6">Anda belum membuat tagihan apapun. Buat invoice pertama Anda untuk mulai menagih pembayaran ke pelanggan.</p>
            <button onclick="document.getElementById('create-invoice-modal').classList.remove('hidden')" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-5 rounded-xl text-sm transition-all shadow-sm">
                + Create Invoice
            </button>
        </div>
    <?php else: ?>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-400 uppercase bg-gray-50/50">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider">Invoice & Customer</th>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider">Amount</th>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider">Date Created</th>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php if (empty($invoices)): ?>
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500 font-medium">Pencarian tidak menemukan invoice apapun.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($invoices as $inv): ?>
                            <tr class="hover:bg-gray-50/50 transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg bg-gray-100 text-gray-500 flex items-center justify-center shrink-0">
                                            <i class="fa-solid fa-receipt text-lg"></i>
                                        </div>
                                        <div>
                                            <div class="font-bold text-gray-900"><?= htmlspecialchars($inv['invoice_number']) ?></div>
                                            <div class="text-[11px] text-gray-500 mt-0.5">
                                                <?= htmlspecialchars($inv['customer_name'] ?? 'N/A') ?> 
                                                <?= !empty($inv['customer_email']) ? '&bull; ' . htmlspecialchars($inv['customer_email']) : '' ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-bold text-gray-900">
                                        <?= htmlspecialchars($inv['currency']) ?> <?= number_format($inv['amount'], 0, ',', '.') ?>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <?php 
                                    $statusClass = 'bg-gray-100 text-gray-600 border-gray-200';
                                    $statusIcon = 'fa-circle-dot';
                                    if ($inv['status'] === 'paid') {
                                        $statusClass = 'bg-green-100 text-green-700 border-green-200';
                                        $statusIcon = 'fa-check';
                                    } elseif ($inv['status'] === 'pending') {
                                        $statusClass = 'bg-yellow-100 text-yellow-700 border-yellow-200';
                                        $statusIcon = 'fa-clock';
                                    } elseif ($inv['status'] === 'expired') {
                                        $statusClass = 'bg-red-100 text-red-700 border-red-200';
                                        $statusIcon = 'fa-xmark';
                                    }
                                    ?>
                                    <span class="<?= $statusClass ?> text-[11px] font-bold px-2.5 py-1 rounded-full border flex items-center gap-1.5 w-max">
                                        <i class="fa-solid <?= $statusIcon ?>"></i> <?= ucfirst($inv['status']) ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-medium text-gray-900">
                                        <?= date('d M Y', strtotime($inv['created_at'])) ?>
                                    </div>
                                    <div class="text-[11px] text-gray-500 mt-0.5">
                                        <?= date('H:i:s', strtotime($inv['created_at'])) ?>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="<?= base_url('pay/' . $inv['invoice_number']) ?>" target="_blank" class="text-blue-600 hover:text-blue-800 font-semibold text-xs bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-lg transition-colors opacity-0 group-hover:opacity-100">
                                            View Page
                                        </a>
                                        <button class="text-gray-400 hover:text-gray-900 p-2 opacity-0 group-hover:opacity-100 transition-opacity" title="Copy Link"><i class="fa-regular fa-copy"></i></button>
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

<!-- Create Invoice Modal (Simplified for UI Demo) -->
<div id="create-invoice-modal" class="fixed inset-0 z-50 hidden bg-gray-900/50 backdrop-blur-sm overflow-y-auto overflow-x-hidden flex justify-center items-center">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <div class="relative bg-white rounded-2xl shadow-xl border border-gray-100">
            <div class="flex justify-between items-center p-5 rounded-t border-b border-gray-100">
                <h3 class="text-lg font-bold text-gray-900">Create New Invoice</h3>
                <button type="button" onclick="document.getElementById('create-invoice-modal').classList.add('hidden')" class="text-gray-400 bg-transparent hover:bg-gray-100 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center transition-colors">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
            <div class="p-8 text-center">
                <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-4">
                    <i class="fa-solid fa-code"></i>
                </div>
                <h4 class="text-gray-900 font-bold mb-2">API Integration Mode</h4>
                <p class="text-gray-500 text-sm mb-6 leading-relaxed">Saat ini (MVP), Anda dapat membuat Invoice menggunakan <span class="font-bold text-gray-900">Secret Key</span> via endpoint API: <br><code class="bg-gray-100 px-2 py-1 rounded text-pink-600 font-mono text-xs mt-2 inline-block">POST /api/v1/invoices</code></p>
                <a href="<?= base_url('apikeys') ?>" class="w-full inline-block text-white bg-blue-600 hover:bg-blue-700 font-semibold rounded-xl text-sm px-5 py-3 text-center shadow-sm shadow-blue-600/20 transition-all">
                    Dapatkan API Keys
                </a>
            </div>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean(); 
require BASE_PATH . '/app/views/layouts/main.php'; 
?>
