<?php ob_start(); ?>

<?php
// Flash messages
$flashSuccess = $_SESSION['flash_success'] ?? null;
$flashError   = $_SESSION['flash_error'] ?? null;
unset($_SESSION['flash_success'], $_SESSION['flash_error']);

$csrfToken = $_SESSION['csrf_token'] ?? '';
$stats     = $stats ?? ['active' => 0, 'total_revenue' => 0, 'total_sales' => 0];
$links     = $links ?? [];
$tab       = $tab ?? 'all';
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
        <h2 class="text-2xl font-extrabold text-gray-900 tracking-tight">Payment Links</h2>
        <p class="text-sm text-gray-500 mt-1">Buat dan kelola link pembayaran untuk produk atau layanan Anda.</p>
    </div>
    <div class="flex items-center gap-3">
        <button onclick="openCreateModal()" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-xl shadow-sm shadow-blue-600/20 text-sm transition-all flex items-center gap-2">
            <i class="fa-solid fa-plus"></i> Buat Link Baru
        </button>
    </div>
</div>

<!-- Stats (Real from DB) -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Link Aktif</p>
            <h3 class="text-2xl font-extrabold text-gray-900"><?= (int)($stats['active'] ?? 0) ?></h3>
        </div>
        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center text-xl">
            <i class="fa-solid fa-link"></i>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Total Revenue</p>
            <h3 class="text-2xl font-extrabold text-gray-900">Rp <?= number_format($stats['total_revenue'] ?? 0, 0, ',', '.') ?></h3>
        </div>
        <div class="w-12 h-12 bg-green-50 text-green-600 rounded-xl flex items-center justify-center text-xl">
            <i class="fa-solid fa-money-bill-wave"></i>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Total Transaksi</p>
            <h3 class="text-2xl font-extrabold text-gray-900"><?= (int)($stats['total_sales'] ?? 0) ?></h3>
        </div>
        <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-xl flex items-center justify-center text-xl">
            <i class="fa-solid fa-bolt"></i>
        </div>
    </div>
</div>

<!-- Tabs (Clean URL) -->
<div class="border-b border-gray-200 mb-6">
    <nav class="-mb-px flex gap-6">
        <?php
        $tabs = [
            'all'      => 'Semua (' . $totalItems . ')',
            'active'   => 'Aktif',
            'inactive' => 'Nonaktif',
        ];
        foreach ($tabs as $key => $label):
            $isActive   = $tab === $key;
            $cls        = $isActive ? 'border-b-2 border-blue-600 text-blue-600 font-bold' : 'border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium';
            $url        = $key === 'all' ? base_url('payment-links') : base_url('payment-links/' . $key);
            $url       .= !empty($search) ? '?search=' . urlencode($search) : '';
        ?>
            <a href="<?= $url ?>" class="<?= $cls ?> py-3 px-1 text-sm transition-colors whitespace-nowrap"><?= $label ?></a>
        <?php endforeach; ?>
    </nav>
</div>

<!-- Table -->
<div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm">
    <!-- Search bar -->
    <div class="p-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
        <form action="" method="GET" class="relative w-full sm:w-72">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
            </div>
            <input type="text" name="search" value="<?= htmlspecialchars($search) ?>"
                   class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2"
                   placeholder="Cari nama produk atau slug...">
            <?php if (!empty($search)): ?>
                <a href="<?= base_url($tab !== 'all' ? 'payment-links/'.$tab : 'payment-links') ?>" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600">
                    <i class="fa-solid fa-xmark"></i>
                </a>
            <?php endif; ?>
        </form>
    </div>

    <?php if (empty($links)): ?>
        <div class="p-16 text-center">
            <div class="w-20 h-20 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4 border border-blue-100 text-blue-500">
                <i class="fa-solid fa-link text-3xl"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Belum ada Payment Link</h3>
            <p class="text-gray-500 text-sm max-w-sm mx-auto mb-6">Buat link pembayaran pertama Anda dan bagikan ke pelanggan tanpa perlu integrasi teknis.</p>
            <button onclick="openCreateModal()" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-5 rounded-xl text-sm transition-all">
                + Buat Link Baru
            </button>
        </div>
    <?php else: ?>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-400 uppercase bg-gray-50/50">
                    <tr>
                        <th class="px-6 py-4 font-bold tracking-wider">Produk / Link</th>
                        <th class="px-6 py-4 font-bold tracking-wider">Harga</th>
                        <th class="px-6 py-4 font-bold tracking-wider">Penjualan</th>
                        <th class="px-6 py-4 font-bold tracking-wider">Status</th>
                        <th class="px-6 py-4 font-bold tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php foreach ($links as $link): ?>
                    <?php
                        $linkUrl    = base_url('pay/pl-' . $link['slug']);
                        $isActive   = $link['status'] === 'active';
                        $statusBadge = $isActive
                            ? 'bg-green-100 text-green-700 border-green-200'
                            : 'bg-gray-100 text-gray-600 border-gray-200';
                        $statusLabel = $isActive ? 'Aktif' : 'Nonaktif';
                    ?>
                    <tr class="hover:bg-gray-50/50 transition-colors group" id="row-<?= $link['id'] ?>">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-tag text-sm"></i>
                                </div>
                                <div>
                                    <div class="font-bold text-gray-900"><?= htmlspecialchars($link['name']) ?></div>
                                    <div class="text-[11px] text-gray-500 mt-0.5 flex items-center gap-2">
                                        <span class="truncate max-w-[200px] text-blue-600 font-mono"><?= htmlspecialchars($link['slug']) ?></span>
                                        <button onclick="copyLink('<?= htmlspecialchars($linkUrl) ?>', this)" class="hover:text-blue-600 transition-colors" title="Salin Link">
                                            <i class="fa-regular fa-copy"></i>
                                        </button>
                                    </div>
                                    <?php if ($link['description']): ?>
                                        <div class="text-[11px] text-gray-400 mt-0.5 truncate max-w-xs"><?= htmlspecialchars($link['description']) ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <?php if ($link['is_flexible_price']): ?>
                                <div class="font-bold text-purple-600">Bebas</div>
                                <div class="text-[11px] text-gray-500">Diatur oleh pembeli</div>
                            <?php else: ?>
                                <div class="font-bold text-gray-900">Rp <?= number_format($link['price'], 0, ',', '.') ?></div>
                                <div class="text-[11px] text-gray-500">One-time</div>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-bold text-gray-900"><?= (int)$link['total_sales'] ?></div>
                            <div class="text-[11px] text-gray-500">Rp <?= number_format($link['total_revenue'], 0, ',', '.') ?> total</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="<?= $statusBadge ?> text-[11px] font-bold px-2.5 py-1 rounded-full border flex items-center gap-1.5 w-max">
                                <i class="fa-solid <?= $isActive ? 'fa-circle-check' : 'fa-circle-dot' ?>"></i> <?= $statusLabel ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-1">
                                <!-- Open Link -->
                                <a href="<?= $linkUrl ?>" target="_blank"
                                   class="text-gray-400 hover:text-blue-600 p-2 opacity-0 group-hover:opacity-100 transition-all"
                                   title="Buka halaman pembayaran">
                                    <i class="fa-solid fa-arrow-up-right-from-square text-sm"></i>
                                </a>
                                <!-- Toggle Status -->
                                <form method="POST" action="<?= base_url('payment-links/toggle') ?>" class="inline">
                                    <input type="hidden" name="id" value="<?= $link['id'] ?>">
                                    <button type="submit"
                                            class="text-gray-400 hover:text-yellow-600 p-2 opacity-0 group-hover:opacity-100 transition-all"
                                            title="<?= $isActive ? 'Nonaktifkan' : 'Aktifkan' ?>">
                                        <i class="fa-solid <?= $isActive ? 'fa-toggle-on' : 'fa-toggle-off' ?> text-sm"></i>
                                    </button>
                                </form>
                                <!-- Delete -->
                                <form method="POST" action="<?= base_url('payment-links/delete') ?>" class="inline"
                                      onsubmit="return confirm('Hapus link \'<?= addslashes($link['name']) ?>\'? Tindakan ini tidak bisa dibatalkan.')">
                                    <input type="hidden" name="_csrf_token" value="<?= $csrfToken ?>">
                                    <input type="hidden" name="id" value="<?= $link['id'] ?>">
                                    <button type="submit"
                                            class="text-gray-400 hover:text-red-600 p-2 opacity-0 group-hover:opacity-100 transition-all"
                                            title="Hapus link">
                                        <i class="fa-solid fa-trash text-sm"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <?php if ($totalPages > 1): ?>
        <?php $baseUrl = base_url($tab !== 'all' ? 'payment-links/'.$tab : 'payment-links'); ?>
        <div class="p-4 border-t border-gray-100 flex items-center justify-between">
            <span class="text-sm text-gray-500">
                Halaman <strong class="text-gray-900"><?= $page ?></strong> dari <strong class="text-gray-900"><?= $totalPages ?></strong>
            </span>
            <div class="flex gap-1">
                <?php if ($page > 1): ?>
                    <a href="<?= $baseUrl ?>?page=<?= $page - 1 ?><?= !empty($search) ? '&search='.urlencode($search) : '' ?>"
                       class="p-2 border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        <i class="fa-solid fa-chevron-left text-xs"></i>
                    </a>
                <?php else: ?>
                    <button disabled class="p-2 border border-gray-200 rounded-lg text-gray-300 cursor-not-allowed bg-gray-50">
                        <i class="fa-solid fa-chevron-left text-xs"></i>
                    </button>
                <?php endif; ?>
                <?php if ($page < $totalPages): ?>
                    <a href="<?= $baseUrl ?>?page=<?= $page + 1 ?><?= !empty($search) ? '&search='.urlencode($search) : '' ?>"
                       class="p-2 border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
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

<!-- ─── Create Link Modal ──────────────────────────────────────────────────── -->
<div id="create-modal" class="fixed inset-0 z-50 hidden bg-gray-900/60 backdrop-blur-sm flex justify-center items-center p-4">
    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-lg border border-gray-100 overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <div>
                <h3 class="text-lg font-bold text-gray-900">Buat Payment Link Baru</h3>
                <p class="text-xs text-gray-500 mt-0.5">Link bisa langsung dibagikan ke pelanggan</p>
            </div>
            <button onclick="closeCreateModal()" class="w-8 h-8 rounded-lg bg-gray-100 hover:bg-gray-200 flex items-center justify-center text-gray-500 transition-colors">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <form method="POST" action="<?= base_url('payment-links/create') ?>" class="px-6 py-6 space-y-5">
            <input type="hidden" name="_csrf_token" value="<?= $csrfToken ?>">

            <!-- Nama Produk -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Produk / Layanan <span class="text-red-500">*</span></label>
                <input type="text" name="name" required
                       class="w-full border border-gray-200 rounded-xl p-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50"
                       placeholder="Contoh: Paket Konsultasi Premium">
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Deskripsi <span class="text-gray-400 font-normal">(opsional)</span></label>
                <textarea name="description" rows="2"
                          class="w-full border border-gray-200 rounded-xl p-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 resize-none"
                          placeholder="Deskripsi singkat produk atau layanan Anda..."></textarea>
            </div>

            <!-- Harga -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Harga (Rp)</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500 font-bold text-sm pointer-events-none">Rp</span>
                    <input type="text" name="price" id="price-input"
                           class="w-full border border-gray-200 rounded-xl pl-9 pr-3 py-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50"
                           placeholder="0" oninput="formatPrice(this)">
                </div>
                <label class="flex items-center gap-2 mt-2 cursor-pointer select-none">
                    <input type="checkbox" name="is_flexible_price" id="flexible-check" class="rounded" onchange="togglePriceField(this)">
                    <span class="text-xs text-gray-500">Harga bebas (pembeli menentukan nominalnya sendiri)</span>
                </label>
            </div>

            <!-- URL Redirect -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Redirect URL <span class="text-gray-400 font-normal">(opsional)</span></label>
                <input type="url" name="redirect_url"
                       class="w-full border border-gray-200 rounded-xl p-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50"
                       placeholder="https://yourdomain.com/thank-you">
            </div>

            <!-- Status -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Status Link</label>
                <select name="status" class="w-full border border-gray-200 rounded-xl p-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50">
                    <option value="active">Aktif — langsung bisa digunakan</option>
                    <option value="inactive">Nonaktif — simpan sebagai draft</option>
                </select>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="button" onclick="closeCreateModal()" class="flex-1 border border-gray-200 text-gray-700 font-semibold py-3 rounded-xl text-sm hover:bg-gray-50 transition-all">
                    Batal
                </button>
                <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl text-sm shadow-sm shadow-blue-600/20 transition-all">
                    Buat Link
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

function togglePriceField(cb) {
    const input = document.getElementById('price-input');
    input.disabled = cb.checked;
    input.value = cb.checked ? '' : input.value;
    input.placeholder = cb.checked ? 'Bebas (diisi pembeli)' : '0';
    input.classList.toggle('opacity-50', cb.checked);
}

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
