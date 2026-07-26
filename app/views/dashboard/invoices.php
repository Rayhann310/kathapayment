<?php ob_start(); ?>

<?php
// Flash messages
$flashSuccess = $_SESSION['flash_success'] ?? null;
$flashError   = $_SESSION['flash_error'] ?? null;
unset($_SESSION['flash_success'], $_SESSION['flash_error']);

$csrfToken = $_SESSION['csrf_token'] ?? '';
$stats     = $stats ?? ['unpaid_count' => 0, 'unpaid_amount' => 0, 'paid_count' => 0, 'expired_count' => 0];
$invoices  = $invoices ?? [];
$statusTab = $statusTab ?? 'all';
$search    = $search ?? '';
$page      = $page ?? 1;
$totalPages = $totalPages ?? 1;
$totalItems = $totalItems ?? 0;
?>

<!-- Flash notifications -->
<?php if ($flashSuccess): ?>
<div id="flash-ok" class="mb-4 flex items-center gap-3 bg-green-50 border border-green-200 text-green-700 rounded-xl px-4 py-3 text-sm font-semibold">
    <i class="fa-solid fa-circle-check"></i> <?= htmlspecialchars($flashSuccess) ?>
    <button onclick="document.getElementById('flash-ok').remove()" class="ml-auto text-green-400 hover:text-green-700"><i class="fa-solid fa-xmark"></i></button>
</div>
<?php endif; ?>
<?php if ($flashError): ?>
<div id="flash-err" class="mb-4 flex items-center gap-3 bg-red-50 border border-red-200 text-red-700 rounded-xl px-4 py-3 text-sm font-semibold">
    <i class="fa-solid fa-circle-xmark"></i> <?= htmlspecialchars($flashError) ?>
    <button onclick="document.getElementById('flash-err').remove()" class="ml-auto text-red-400 hover:text-red-700"><i class="fa-solid fa-xmark"></i></button>
</div>
<?php endif; ?>

<!-- Page Header -->
<div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <h2 class="text-2xl font-extrabold text-gray-900 tracking-tight">Invoices</h2>
        <p class="text-sm text-gray-500 mt-1">Buat, kelola, dan pantau status tagihan tunggal ke pelanggan Anda.</p>
    </div>
    <div class="flex items-center gap-3">
        <button class="bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 font-semibold py-2 px-4 rounded-xl shadow-sm text-sm transition-all flex items-center gap-2">
            <i class="fa-solid fa-download"></i> Export
        </button>
        <button onclick="openCreateModal()" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-xl shadow-sm shadow-blue-600/20 text-sm transition-all flex items-center gap-2">
            <i class="fa-solid fa-plus"></i> Create Invoice
        </button>
    </div>
</div>

<!-- Stats (Real from DB) -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Unpaid Invoices</p>
            <h3 class="text-2xl font-extrabold text-gray-900"><?= (int)($stats['unpaid_count'] ?? 0) ?></h3>
            <div class="text-xs font-semibold text-yellow-600 mt-2 flex items-center gap-1">
                Rp <?= number_format($stats['unpaid_amount'] ?? 0, 0, ',', '.') ?> menunggu pembayaran
            </div>
        </div>
        <div class="w-12 h-12 bg-yellow-50 text-yellow-600 rounded-xl flex items-center justify-center text-xl">
            <i class="fa-regular fa-clock"></i>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Paid (Total)</p>
            <h3 class="text-2xl font-extrabold text-gray-900"><?= (int)($stats['paid_count'] ?? 0) ?></h3>
        </div>
        <div class="w-12 h-12 bg-green-50 text-green-600 rounded-xl flex items-center justify-center text-xl">
            <i class="fa-solid fa-check-double"></i>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Expired / Failed</p>
            <h3 class="text-2xl font-extrabold text-gray-900"><?= (int)($stats['expired_count'] ?? 0) ?></h3>
        </div>
        <div class="w-12 h-12 bg-red-50 text-red-600 rounded-xl flex items-center justify-center text-xl">
            <i class="fa-solid fa-circle-xmark"></i>
        </div>
    </div>
</div>

<!-- Tabs (Clean URL) -->
<div class="border-b border-gray-200 mb-6">
    <nav class="-mb-px flex gap-6">
        <?php
        $tabs = [
            'all'      => 'All Invoices (' . $totalItems . ')',
            'pending'  => 'Pending',
            'paid'     => 'Paid',
            'expired'  => 'Expired',
        ];
        foreach ($tabs as $key => $label):
            $isActive   = $statusTab === $key;
            $cls        = $isActive ? 'border-b-2 border-blue-600 text-blue-600 font-bold' : 'border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium';
            $url        = $key === 'all' ? base_url('invoices') : base_url('invoices/' . $key);
            $url       .= !empty($search) ? '?search=' . urlencode($search) : '';
        ?>
            <a href="<?= $url ?>" class="<?= $cls ?> py-3 px-1 text-sm transition-colors whitespace-nowrap"><?= $label ?></a>
        <?php endforeach; ?>
    </nav>
</div>

<!-- Table Container -->
<div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm mb-6">
    <div class="p-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <form action="" method="GET" class="relative w-full sm:w-80">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
            </div>
            <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2" placeholder="Search Invoice Number or Customer...">
            <?php if (!empty($search)): ?>
                <a href="<?= base_url($statusTab !== 'all' ? 'invoices/'.$statusTab : 'invoices') ?>" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600">
                    <i class="fa-solid fa-xmark"></i>
                </a>
            <?php endif; ?>
        </form>
    </div>

    <?php if (empty($invoices) && empty($search)): ?>
        <div class="p-16 text-center">
            <div class="w-20 h-20 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4 border border-blue-100 shadow-sm text-blue-600">
                <i class="fa-solid fa-file-invoice-dollar text-3xl"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Belum ada Invoice</h3>
            <p class="text-gray-500 text-sm max-w-sm mx-auto mb-6">Anda belum membuat tagihan apapun. Buat invoice pertama Anda untuk mulai menagih pembayaran ke pelanggan.</p>
            <button onclick="openCreateModal()" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-5 rounded-xl text-sm transition-all shadow-sm">
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
                                    } elseif (in_array($inv['status'], ['expired', 'failed', 'cancelled'])) {
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
                                        <button onclick="copyLink('<?= base_url('pay/' . $inv['invoice_number']) ?>', this)" class="text-gray-400 hover:text-blue-600 p-2 opacity-0 group-hover:opacity-100 transition-colors" title="Copy Link">
                                            <i class="fa-regular fa-copy"></i>
                                        </button>
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
        <?php $baseUrl = base_url($statusTab !== 'all' ? 'invoices/'.$statusTab : 'invoices'); ?>
        <div class="p-4 border-t border-gray-100 flex items-center justify-between">
            <span class="text-sm text-gray-500">
                Showing Page <span class="font-bold text-gray-900"><?= $page ?></span> of <span class="font-bold text-gray-900"><?= $totalPages ?></span>
            </span>
            <div class="flex gap-1">
                <?php if ($page > 1): ?>
                    <a href="<?= $baseUrl ?>?page=<?= $page - 1 ?><?= !empty($search) ? '&search='.urlencode($search) : '' ?>" class="p-2 border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        <i class="fa-solid fa-chevron-left text-xs"></i>
                    </a>
                <?php else: ?>
                    <button disabled class="p-2 border border-gray-200 rounded-lg text-gray-300 cursor-not-allowed bg-gray-50">
                        <i class="fa-solid fa-chevron-left text-xs"></i>
                    </button>
                <?php endif; ?>

                <?php if ($page < $totalPages): ?>
                    <a href="<?= $baseUrl ?>?page=<?= $page + 1 ?><?= !empty($search) ? '&search='.urlencode($search) : '' ?>" class="p-2 border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
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

<!-- ─── Create Invoice Modal ──────────────────────────────────────────────────── -->
<div id="create-modal" class="fixed inset-0 z-50 hidden bg-gray-900/60 backdrop-blur-sm flex justify-center items-center p-4">
    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-lg border border-gray-100 overflow-hidden flex flex-col max-h-[90vh]">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <div>
                <h3 class="text-lg font-bold text-gray-900">Buat Invoice Baru</h3>
                <p class="text-xs text-gray-500 mt-0.5">Tagihan manual ke pelanggan</p>
            </div>
            <button onclick="closeCreateModal()" class="w-8 h-8 rounded-lg bg-gray-100 hover:bg-gray-200 flex items-center justify-center text-gray-500 transition-colors">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <form method="POST" action="<?= base_url('invoices/create') ?>" class="px-6 py-6 space-y-5 overflow-y-auto">
            <input type="hidden" name="_csrf_token" value="<?= $csrfToken ?>">

            <!-- Nominal -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nominal Tagihan (Rp) <span class="text-red-500">*</span></label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500 font-bold text-sm pointer-events-none">Rp</span>
                    <input type="text" name="amount" required
                           class="w-full border border-gray-200 rounded-xl pl-9 pr-3 py-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50"
                           placeholder="0" oninput="formatPrice(this)">
                </div>
            </div>

            <!-- Nama Pelanggan -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Pelanggan <span class="text-gray-400 font-normal">(opsional)</span></label>
                <input type="text" name="customer_name"
                       class="w-full border border-gray-200 rounded-xl p-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50"
                       placeholder="Contoh: Budi Santoso">
            </div>

            <!-- Email Pelanggan -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Email Pelanggan <span class="text-gray-400 font-normal">(opsional)</span></label>
                <input type="email" name="customer_email"
                       class="w-full border border-gray-200 rounded-xl p-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50"
                       placeholder="budi@example.com">
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Keterangan Tagihan <span class="text-gray-400 font-normal">(opsional)</span></label>
                <textarea name="description" rows="2"
                          class="w-full border border-gray-200 rounded-xl p-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 resize-none"
                          placeholder="Misal: Pembayaran project website bulan Agustus..."></textarea>
            </div>

            <!-- API Info (Optional/Informative) -->
            <div class="bg-blue-50 border border-blue-100 rounded-xl p-3 flex gap-3 text-sm text-blue-800">
                <i class="fa-solid fa-circle-info mt-0.5"></i>
                <p>Mencari integrasi otomatis? Gunakan <a href="<?= base_url('apikeys') ?>" class="font-bold underline hover:text-blue-900">API</a> kami.</p>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="button" onclick="closeCreateModal()" class="flex-1 border border-gray-200 text-gray-700 font-semibold py-3 rounded-xl text-sm hover:bg-gray-50 transition-all">
                    Batal
                </button>
                <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl text-sm shadow-sm shadow-blue-600/20 transition-all">
                    Buat Invoice
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openCreateModal() {
    document.getElementById('create-modal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}
function closeCreateModal() {
    document.getElementById('create-modal').classList.add('hidden');
    document.body.style.overflow = '';
}
document.getElementById('create-modal').addEventListener('click', function(e) {
    if (e.target === this) closeCreateModal();
});

function formatPrice(el) {
    let raw = el.value.replace(/\D/g, '');
    el.value = raw ? parseInt(raw).toLocaleString('id-ID') : '';
}

async function copyLink(url, btn) {
    try {
        await navigator.clipboard.writeText(url);
        const orig = btn.innerHTML;
        btn.innerHTML = '<i class="fa-solid fa-check text-green-500"></i>';
        setTimeout(() => btn.innerHTML = orig, 1800);
    } catch(e) {
        prompt('Salin link ini:', url);
    }
}
</script>

<?php 
$content = ob_get_clean(); 
require BASE_PATH . '/app/views/layouts/main.php'; 
?>
