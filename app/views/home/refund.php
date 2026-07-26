<?php ob_start(); ?>

<div class="pt-24 pb-20 bg-white min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb -->
        <div class="flex items-center space-x-2 text-sm text-gray-500 mb-8 mt-4">
            <a href="<?= base_url('') ?>" class="hover:text-blue-600 transition-colors"><i class="fa-solid fa-house mr-1"></i> Beranda</a>
            <span><i class="fa-solid fa-chevron-right text-xs"></i></span>
            <span class="hover:text-blue-600 transition-colors cursor-pointer">Perusahaan</span>
            <span><i class="fa-solid fa-chevron-right text-xs"></i></span>
            <span class="text-blue-600 font-medium">Refund</span>
        </div>

        <div class="flex flex-col lg:flex-row gap-10">
            <!-- Sidebar -->
            <aside class="w-full lg:w-72 shrink-0">
                <div class="sticky top-28">
                    <!-- Daftar Isi Box -->
                    <div class="bg-white rounded-2xl border border-gray-200 p-6 mb-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Daftar Isi</h3>
                        <nav class="space-y-1">
                            <a href="#pengertian" class="flex items-center px-3 py-2.5 text-sm font-semibold rounded-lg bg-blue-50 text-blue-700">
                                <i class="fa-regular fa-file-lines w-5 text-center mr-2"></i> 1. Pengertian Refund
                            </a>
                            <a href="#kelayakan" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-regular fa-calendar-check w-5 text-center mr-2"></i> 2. Kelayakan Refund
                            </a>
                            <a href="#kebijakan" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-regular fa-circle-check w-5 text-center mr-2"></i> 3. Kebijakan Refund
                            </a>
                            <a href="#proses" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-solid fa-list-check w-5 text-center mr-2"></i> 4. Proses Pengajuan Refund
                            </a>
                            <a href="#waktu" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-regular fa-clock w-5 text-center mr-2"></i> 5. Waktu Proses Refund
                            </a>
                            <a href="#metode" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-solid fa-credit-card w-5 text-center mr-2"></i> 6. Metode Pengembalian Dana
                            </a>
                            <a href="#biaya" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-solid fa-hand-holding-dollar w-5 text-center mr-2"></i> 7. Biaya Refund
                            </a>
                            <a href="#pembatalan" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-solid fa-rotate-left w-5 text-center mr-2"></i> 8. Pembatalan Otomatis
                            </a>
                            <a href="#pengecualian" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-solid fa-ban w-5 text-center mr-2"></i> 9. Pengecualian
                            </a>
                            <a href="#perubahan" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-solid fa-pen-to-square w-5 text-center mr-2"></i> 10. Perubahan Kebijakan
                            </a>
                            <a href="#hubungi" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-solid fa-headset w-5 text-center mr-2"></i> 11. Hubungi Kami
                            </a>
                        </nav>
                    </div>

                    <!-- Info Box -->
                    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                        <div class="flex items-center mb-3 text-blue-600">
                            <i class="fa-solid fa-headset text-xl mr-3"></i>
                            <h4 class="font-bold text-gray-900">Butuh bantuan?</h4>
                        </div>
                        <p class="text-xs text-gray-600 leading-relaxed mb-4">
                            Tim support kami siap membantu Anda terkait proses refund.
                        </p>
                        <a href="mailto:support@kathapayment.com" class="block text-center w-full py-2 bg-white text-blue-600 text-sm font-semibold border border-blue-200 rounded-lg hover:bg-blue-50 transition-colors">
                            Hubungi Support <i class="fa-solid fa-arrow-right text-xs ml-1"></i>
                        </a>
                    </div>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 relative">
                
                <!-- Decorative Graphic -->
                <div class="hidden lg:block absolute top-0 right-0 w-64 h-64 -mt-10 -mr-10 opacity-80 pointer-events-none">
                    <img src="https://illustrations.popsy.co/blue/bank-card.svg" alt="Refund Graphic" class="w-full h-full object-contain">
                </div>

                <h1 class="text-3xl md:text-4xl font-extrabold text-[#0B1120] mb-4">Kebijakan Refund</h1>
                
                <div class="inline-flex items-center px-3 py-1.5 bg-blue-50 text-blue-600 text-xs font-semibold rounded-md mb-6">
                    <i class="fa-regular fa-calendar mr-2"></i> Terakhir diperbarui: 26 Mei 2024
                </div>

                <p class="text-gray-600 mb-10 leading-relaxed text-[15px] max-w-2xl">
                    Halaman ini menjelaskan kebijakan pengembalian dana (refund) pada layanan KathaPayment. Harap baca dengan seksama sebelum menggunakan layanan kami.
                </p>

                <div class="space-y-10">
                    <!-- Item 1 -->
                    <div id="pengertian" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-book-open text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">1. Pengertian Refund</h3>
                            <p class="text-gray-600 text-[15px] leading-relaxed">Refund adalah pengembalian dana kepada pelanggan atas transaksi yang telah dibayar melalui KathaPayment karena alasan tertentu sesuai dengan kebijakan ini.</p>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div id="kelayakan" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-clipboard-check text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">2. Kelayakan Refund</h3>
                            <p class="text-gray-600 text-[15px] mb-2">Refund dapat diajukan apabila transaksi memenuhi salah satu kondisi berikut:</p>
                            <ul class="list-disc pl-5 text-gray-600 text-[15px] leading-relaxed space-y-1">
                                <li>Transaksi gagal namun dana terpotong.</li>
                                <li>Barang/layanan tidak diterima.</li>
                                <li>Double payment (pembayaran ganda).</li>
                                <li>Pembatalan pesanan sesuai kebijakan merchant.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div id="kebijakan" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-shield-check text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">3. Kebijakan Refund</h3>
                            <ul class="list-disc pl-5 text-gray-600 text-[15px] leading-relaxed space-y-1">
                                <li>Refund hanya dapat dilakukan oleh merchant melalui dashboard KathaPayment.</li>
                                <li>Refund akan dikembalikan ke metode pembayaran asli pelanggan.</li>
                                <li>Keputusan akhir terkait refund berada pada merchant sesuai kebijakan bisnis masing-masing.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div id="proses" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-file-invoice-dollar text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">4. Proses Pengajuan Refund</h3>
                            <ul class="list-disc pl-5 text-gray-600 text-[15px] leading-relaxed space-y-1">
                                <li>Merchant mengajukan refund melalui dashboard transaksi.</li>
                                <li>Pilih transaksi dan alasan refund.</li>
                                <li>Dana akan diproses sesuai waktu yang ditentukan.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Item 5 -->
                    <div id="waktu" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-regular fa-clock text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">5. Waktu Proses Refund</h3>
                            <p class="text-gray-600 text-[15px] leading-relaxed">Refund biasanya diproses dalam 1-7 hari kerja setelah disetujui. Waktu yang dibutuhkan untuk dana kembali ke rekening/metode pembayaran pelanggan tergantung pada bank atau e-wallet terkait.</p>
                        </div>
                    </div>

                    <!-- Item 6 -->
                    <div id="metode" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-credit-card text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">6. Metode Pengembalian Dana</h3>
                            <p class="text-gray-600 text-[15px] leading-relaxed">Dana akan dikembalikan ke metode pembayaran asli yang digunakan pelanggan saat transaksi.</p>
                        </div>
                    </div>

                    <!-- Item 7 -->
                    <div id="biaya" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-file-invoice text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">7. Biaya Refund</h3>
                            <p class="text-gray-600 text-[15px] leading-relaxed">KathaPayment tidak mengenakan biaya tambahan untuk proses refund. Namun, biaya administrasi dari bank/e-wallet (jika ada) menjadi tanggung jawab pelanggan.</p>
                        </div>
                    </div>

                    <!-- Item 8 -->
                    <div id="pembatalan" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-rotate-left text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">8. Pembatalan Otomatis</h3>
                            <p class="text-gray-600 text-[15px] leading-relaxed">Transaksi yang belum dibayar dalam waktu tertentu akan dibatalkan secara otomatis oleh sistem dan dana (jika terpotong) akan dikembalikan sesuai kebijakan bank/e-wallet.</p>
                        </div>
                    </div>

                    <!-- Item 9 -->
                    <div id="pengecualian" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-ban text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">9. Pengecualian</h3>
                            <p class="text-gray-600 text-[15px] leading-relaxed">Refund tidak berlaku untuk transaksi yang telah diselesaikan dan barang/layanan telah diterima, atau sesuai kebijakan khusus dari merchant.</p>
                        </div>
                    </div>

                    <!-- Item 10 -->
                    <div id="perubahan" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-pen-to-square text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">10. Perubahan Kebijakan</h3>
                            <p class="text-gray-600 text-[15px] leading-relaxed">KathaPayment dapat mengubah kebijakan refund ini sewaktu-waktu. Perubahan akan diumumkan melalui website resmi.</p>
                        </div>
                    </div>

                    <!-- Item 11 -->
                    <div id="hubungi" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-headset text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">11. Hubungi Kami</h3>
                            <p class="text-gray-600 text-[15px] leading-relaxed mb-3">Jika Anda memiliki pertanyaan terkait kebijakan refund, silakan hubungi tim kami melalui:</p>
                            <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600">
                                <span class="flex items-center"><i class="fa-regular fa-envelope text-blue-600 mr-2"></i> Email: <a href="mailto:support@kathapayment.com" class="text-blue-600 ml-1 hover:underline">support@kathapayment.com</a></span>
                                <span class="hidden sm:inline text-gray-300">|</span>
                                <span class="flex items-center"><i class="fa-solid fa-phone text-blue-600 mr-2"></i> Telepon: (021) 1234 5678</span>
                                <span class="hidden sm:inline text-gray-300">|</span>
                                <span class="flex items-center"><i class="fa-regular fa-clock text-blue-600 mr-2"></i> Jam Operasional: 09.00 - 18.00 WIB (Senin - Jumat)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bottom CTA -->
                <div class="mt-16 bg-gray-50 rounded-2xl p-8 flex flex-col sm:flex-row items-center justify-between border border-gray-100 gap-6">
                    <div class="flex items-center gap-6">
                        <div class="hidden sm:block">
                            <!-- Visual icon representation -->
                            <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center text-blue-600 text-3xl shadow-sm">
                                <i class="fa-regular fa-envelope"></i>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Masih punya pertanyaan?</h3>
                            <p class="text-gray-600 text-sm leading-relaxed max-w-md">Kami siap membantu Anda memahami kebijakan refund dan proses pengembalian dana dengan lebih jelas.</p>
                        </div>
                    </div>
                    <a href="mailto:support@kathapayment.com" class="shrink-0 px-6 py-2.5 bg-white text-blue-600 font-semibold rounded-lg border border-blue-200 hover:bg-blue-50 hover:border-blue-300 transition-colors shadow-sm">
                        Hubungi Support <i class="fa-solid fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>

            </main>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean(); 
include BASE_PATH . '/app/views/layouts/public.php'; 
?>
