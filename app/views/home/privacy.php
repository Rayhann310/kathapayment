<?php ob_start(); ?>

<div class="pt-24 pb-20 bg-white min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb -->
        <div class="flex items-center space-x-2 text-sm text-gray-500 mb-8 mt-4">
            <a href="<?= base_url('') ?>" class="hover:text-blue-600 transition-colors"><i class="fa-solid fa-house mr-1"></i> Beranda</a>
            <span><i class="fa-solid fa-chevron-right text-xs"></i></span>
            <span class="text-blue-600 font-medium">Kebijakan Privasi</span>
        </div>

        <div class="flex flex-col lg:flex-row gap-10">
            <!-- Sidebar -->
            <aside class="w-full lg:w-72 shrink-0">
                <div class="sticky top-28">
                    <!-- Daftar Isi Box -->
                    <div class="bg-white rounded-2xl border border-gray-200 p-6 mb-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Daftar Isi</h3>
                        <nav class="space-y-1">
                            <a href="#pendahuluan" class="flex items-center px-3 py-2.5 text-sm font-semibold rounded-lg bg-blue-50 text-blue-700">
                                <i class="fa-solid fa-scale-balanced w-5 text-center mr-2"></i> 1. Pendahuluan
                            </a>
                            <a href="#informasi" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-solid fa-users w-5 text-center mr-2"></i> 2. Informasi yang Kami Kumpulkan
                            </a>
                            <a href="#penggunaan" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-solid fa-file-contract w-5 text-center mr-2"></i> 3. Cara Kami Menggunakan Informasi
                            </a>
                            <a href="#dasar" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-solid fa-scale-unbalanced w-5 text-center mr-2"></i> 4. Dasar Hukum Pemrosesan
                            </a>
                            <a href="#berbagi" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-solid fa-share-nodes w-5 text-center mr-2"></i> 5. Berbagi & Pengungkapan Informasi
                            </a>
                            <a href="#penyimpanan" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-solid fa-lock w-5 text-center mr-2"></i> 6. Penyimpanan & Keamanan Data
                            </a>
                            <a href="#hak" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-solid fa-user-shield w-5 text-center mr-2"></i> 7. Hak Anda
                            </a>
                            <a href="#cookies" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-solid fa-cookie-bite w-5 text-center mr-2"></i> 8. Cookies & Teknologi Serupa
                            </a>
                            <a href="#transfer" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-solid fa-globe w-5 text-center mr-2"></i> 9. Transfer Data Internasional
                            </a>
                            <a href="#perubahan" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-solid fa-pen-to-square w-5 text-center mr-2"></i> 10. Perubahan Kebijakan Privasi
                            </a>
                            <a href="#hubungi" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-solid fa-headset w-5 text-center mr-2"></i> 11. Hubungi Kami
                            </a>
                        </nav>
                    </div>

                    <!-- Info Box -->
                    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100 flex flex-col items-center text-center">
                        <div class="text-blue-600 mb-3 bg-blue-100 w-12 h-12 rounded-full flex items-center justify-center">
                            <i class="fa-solid fa-shield-halved text-2xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-900 mb-2">Privasi Anda, Prioritas Kami</h4>
                        <p class="text-xs text-gray-600 leading-relaxed">
                            Kami berkomitmen untuk melindungi data pribadi Anda dengan standar keamanan tinggi dan transparansi penuh.
                        </p>
                    </div>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="flex-1">
                <div class="inline-block px-3 py-1 bg-blue-50 text-blue-600 text-xs font-semibold rounded-full mb-6 uppercase tracking-wider">
                    Terakhir diperbarui: 26 Mei 2024
                </div>

                <h1 class="text-3xl md:text-4xl font-extrabold text-[#0B1120] mb-4">Kebijakan Privasi</h1>

                <p class="text-gray-600 mb-10 leading-relaxed text-[15px]">
                    KathaPayment ("kami", "milik kami", atau "KathaPayment") menghargai privasi Anda dan berkomitmen untuk melindungi data pribadi yang Anda berikan kepada kami. Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, menyimpan, dan melindungi informasi Anda ketika Anda menggunakan layanan kami.
                </p>

                <div class="space-y-10">
                    <!-- Item 1 -->
                    <div id="pendahuluan" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-shield-halved text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">1. Pendahuluan</h3>
                            <p class="text-gray-600 text-[15px] leading-relaxed">Kebijakan Privasi ini berlaku untuk semua layanan yang disediakan oleh KathaPayment, termasuk namun tidak terbatas pada website, API, dashboard, aplikasi, dan layanan terkait lainnya.</p>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div id="informasi" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-users text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">2. Informasi yang Kami Kumpulkan</h3>
                            <p class="text-gray-600 text-[15px] mb-2">Kami dapat mengumpulkan informasi berikut:</p>
                            <ul class="list-disc pl-5 text-gray-600 text-[15px] leading-relaxed space-y-1">
                                <li>Informasi pribadi: nama, email, nomor telepon, nama perusahaan, dan informasi identitas lainnya.</li>
                                <li>Informasi transaksi: detail pembayaran, metode pembayaran, nominal, dan riwayat transaksi.</li>
                                <li>Informasi teknis: alamat IP, jenis perangkat, browser, sistem operasi, dan log aktivitas.</li>
                                <li>Informasi cookies dan teknologi serupa (lihat bagian 8).</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div id="penggunaan" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-file-contract text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">3. Cara Kami Menggunakan Informasi</h3>
                            <p class="text-gray-600 text-[15px] mb-2">Kami menggunakan informasi yang kami kumpulkan untuk:</p>
                            <ul class="list-disc pl-5 text-gray-600 text-[15px] leading-relaxed space-y-1">
                                <li>Menyediakan, mengelola, dan mengembangkan layanan kami.</li>
                                <li>Memproses transaksi pembayaran dengan aman dan efisien.</li>
                                <li>Memberikan dukungan pelanggan dan komunikasi terkait layanan.</li>
                                <li>Meningkatkan pengalaman pengguna dan keamanan layanan.</li>
                                <li>Memenuhi kewajiban hukum dan regulasi yang berlaku.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div id="dasar" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-scale-balanced text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">4. Dasar Hukum Pemrosesan</h3>
                            <p class="text-gray-600 text-[15px] mb-2">Kami memproses data pribadi Anda berdasarkan:</p>
                            <ul class="list-disc pl-5 text-gray-600 text-[15px] leading-relaxed space-y-1">
                                <li>Persetujuan Anda.</li>
                                <li>Pelaksanaan kontrak untuk menyediakan layanan kami.</li>
                                <li>Kepatuhan terhadap kewajiban hukum.</li>
                                <li>Kepentingan sah kami untuk menjalankan dan meningkatkan layanan.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Item 5 -->
                    <div id="berbagi" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-share-nodes text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">5. Berbagi & Pengungkapan Informasi</h3>
                            <p class="text-gray-600 text-[15px] mb-2">Kami tidak menjual informasi pribadi Anda. Kami hanya berbagi informasi dengan pihak ketiga dalam kondisi berikut:</p>
                            <ul class="list-disc pl-5 text-gray-600 text-[15px] leading-relaxed space-y-1">
                                <li>Penyedia layanan pihak ketiga yang membantu operasional kami (misalnya: payment gateway, cloud hosting).</li>
                                <li>Kepada otoritas atau lembaga jika diwajibkan oleh hukum.</li>
                                <li>Dalam proses merger, akuisisi, atau transaksi bisnis lainnya (dengan kewajiban menjaga kerahasiaan).</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Item 6 -->
                    <div id="penyimpanan" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-lock text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">6. Penyimpanan & Keamanan Data</h3>
                            <p class="text-gray-600 text-[15px] leading-relaxed">Kami menyimpan data pribadi Anda selama diperlukan untuk tujuan yang dijelaskan dalam kebijakan ini atau sesuai dengan kewajiban hukum. Kami menerapkan langkah-langkah teknis dan organisasi yang sesuai untuk melindungi data Anda dari akses, perubahan, pengungkapan, atau penghancuran yang tidak sah.</p>
                        </div>
                    </div>

                    <!-- Item 7 -->
                    <div id="hak" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-users-gear text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">7. Hak Anda</h3>
                            <p class="text-gray-600 text-[15px] mb-2">Anda memiliki hak untuk:</p>
                            <ul class="list-disc pl-5 text-gray-600 text-[15px] leading-relaxed space-y-1 mb-2">
                                <li>Mengakses, memperbarui, atau mengoreksi data pribadi Anda.</li>
                                <li>Menghapus data pribadi Anda.</li>
                                <li>Membatasi atau menolak pemrosesan data.</li>
                                <li>Menarik persetujuan kapan saja (jika pemrosesan berdasarkan persetujuan).</li>
                            </ul>
                            <p class="text-gray-600 text-[15px] leading-relaxed">Untuk menjalankan hak-hak ini, silakan hubungi kami melalui kontak di bagian 11.</p>
                        </div>
                    </div>

                    <!-- Item 8 -->
                    <div id="cookies" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-cookie-bite text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">8. Cookies & Teknologi Serupa</h3>
                            <p class="text-gray-600 text-[15px] leading-relaxed">Kami menggunakan cookies dan teknologi serupa untuk meningkatkan pengalaman Anda, menganalisis lalu lintas, dan menyesuaikan konten. Anda dapat mengatur preferensi cookies melalui pengaturan browser Anda.</p>
                        </div>
                    </div>

                    <!-- Item 9 -->
                    <div id="transfer" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-globe text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">9. Transfer Data Internasional</h3>
                            <p class="text-gray-600 text-[15px] leading-relaxed">Data Anda dapat ditransfer dan diproses di luar wilayah negara Anda. Kami memastikan bahwa transfer data dilakukan sesuai dengan hukum yang berlaku dan dilindungi dengan standar keamanan yang memadai.</p>
                        </div>
                    </div>

                    <!-- Item 10 -->
                    <div id="perubahan" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-pen-to-square text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">10. Perubahan Kebijakan Privasi</h3>
                            <p class="text-gray-600 text-[15px] leading-relaxed">Kami dapat memperbarui Kebijakan Privasi ini dari waktu ke waktu. Perubahan akan kami informasikan melalui website atau email. Tanggal "Terakhir Diperbarui" di bagian atas akan menunjukkan versi terbaru.</p>
                        </div>
                    </div>

                    <!-- Item 11 -->
                    <div id="hubungi" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-headset text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">11. Hubungi Kami</h3>
                            <p class="text-gray-600 text-[15px] leading-relaxed mb-3">Jika Anda memiliki pertanyaan, keluhan, atau permintaan terkait privasi data, silakan hubungi kami:</p>
                            <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600">
                                <span class="flex items-center"><i class="fa-regular fa-envelope text-blue-600 mr-2"></i> Email: <a href="mailto:privacy@kathapayment.com" class="text-blue-600 ml-1 hover:underline">privacy@kathapayment.com</a></span>
                                <span class="hidden sm:inline text-gray-300">|</span>
                                <span class="flex items-center"><i class="fa-solid fa-building text-blue-600 mr-2"></i> Alamat: Jl. TB Simatupang No. 123, Jakarta Selatan, DKI Jakarta, Indonesia</span>
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
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Privasi dan Keamanan Anda adalah Prioritas Kami</h3>
                            <p class="text-gray-600 text-sm leading-relaxed max-w-md">Kami terus berupaya menjaga kepercayaan Anda dengan melindungi data dan memberikan layanan yang aman dan terpercaya.</p>
                        </div>
                    </div>
                    <a href="<?= base_url('terms') ?>" class="shrink-0 px-6 py-2.5 bg-white text-blue-600 font-semibold rounded-lg border border-blue-200 hover:bg-blue-50 hover:border-blue-300 transition-colors shadow-sm">
                        Pelajari Lebih Lanjut <i class="fa-solid fa-arrow-right ml-2 text-sm"></i>
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
