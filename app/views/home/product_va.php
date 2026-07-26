<?php ob_start(); ?>

<div class="pt-32 pb-24 bg-white min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <!-- Badge -->
        <div class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-semibold bg-emerald-50 text-emerald-600 mb-6">
            <i class="fa-solid fa-building-columns mr-2"></i> Produk Pembayaran
        </div>
        
        <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 mb-6 tracking-tight">
            Kemudahan Bayar via <span class="text-emerald-600">Virtual Account</span>
        </h1>
        
        <p class="text-xl text-gray-500 mb-12 max-w-2xl mx-auto leading-relaxed">
            Sediakan metode transfer bank otomatis tanpa konfirmasi manual dari ratusan bank di Indonesia.
        </p>

        <div class="p-12 bg-gray-50 rounded-3xl border border-gray-100 shadow-sm flex flex-col items-center justify-center min-h-[300px]">
            <div class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center text-gray-400 mb-6">
                <i class="fa-solid fa-hammer text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Halaman Sedang Dibangun</h3>
            <p class="text-gray-500">Kumpulan bank mitra dan simulasi integrasi VA akan segera tersedia.</p>
            <a href="<?= base_url('') ?>" class="mt-8 text-emerald-600 font-semibold hover:text-emerald-700">
                <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean(); 
include BASE_PATH . '/app/views/layouts/public.php'; 
?>
