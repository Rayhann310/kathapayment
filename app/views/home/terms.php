<?php ob_start(); ?>

<div class="pt-24 pb-20 bg-white min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb -->
        <div class="flex items-center space-x-2 text-sm text-gray-500 mb-8 mt-4">
            <a href="<?= base_url('') ?>" class="hover:text-blue-600 transition-colors"><i class="fa-solid fa-house mr-1"></i> Beranda</a>
            <span><i class="fa-solid fa-chevron-right text-xs"></i></span>
            <span class="text-blue-600 font-medium">Syarat & Ketentuan</span>
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
                                <i class="fa-regular fa-file-lines w-5 text-center mr-2"></i> 1. Pendahuluan
                            </a>
                            <a href="#definisi" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-regular fa-user w-5 text-center mr-2"></i> 2. Definisi
                            </a>
                            <a href="#akun" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-regular fa-user w-5 text-center mr-2"></i> 3. Akun Pengguna
                            </a>
                            <a href="#penggunaan" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-regular fa-copy w-5 text-center mr-2"></i> 4. Penggunaan Layanan
                            </a>
                            <a href="#biaya" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-solid fa-coins w-5 text-center mr-2"></i> 5. Biaya dan Pembayaran
                            </a>
                            <a href="#kewajiban" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-regular fa-circle-check w-5 text-center mr-2"></i> 6. Kewajiban Pengguna
                            </a>
                            <a href="#larangan" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-solid fa-ban w-5 text-center mr-2"></i> 7. Larangan
                            </a>
                            <a href="#keamanan" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-solid fa-lock w-5 text-center mr-2"></i> 8. Keamanan Akun
                            </a>
                            <a href="#hki" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-regular fa-copyright w-5 text-center mr-2"></i> 9. Hak Kekayaan Intelektual
                            </a>
                            <a href="#tanggungjawab" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-solid fa-scale-balanced w-5 text-center mr-2"></i> 10. Pembatasan Tanggung Jawab
                            </a>
                            <a href="#penghentian" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-solid fa-power-off w-5 text-center mr-2"></i> 11. Penghentian Layanan
                            </a>
                            <a href="#hukum" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-solid fa-gavel w-5 text-center mr-2"></i> 12. Hukum yang Berlaku
                            </a>
                            <a href="#perubahan" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-solid fa-pen-to-square w-5 text-center mr-2"></i> 13. Perubahan Syarat
                            </a>
                            <a href="#hubungi" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <i class="fa-solid fa-headset w-5 text-center mr-2"></i> 14. Hubungi Kami
                            </a>
                        </nav>
                    </div>

                    <!-- Info Box -->
                    <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100 flex items-start gap-3">
                        <div class="text-blue-600 mt-0.5">
                            <i class="fa-solid fa-shield-check text-xl"></i>
                        </div>
                        <p class="text-xs text-gray-600 leading-relaxed">
                            Dengan menggunakan layanan KathaPayment, Anda menyatakan telah membaca, memahami, dan menyetujui seluruh syarat dan ketentuan ini.
                        </p>
                    </div>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="flex-1">
                <h1 class="text-3xl md:text-4xl font-extrabold text-[#0B1120] mb-4">Syarat & Ketentuan</h1>
                
                <div class="inline-block px-3 py-1 bg-blue-50 text-blue-600 text-xs font-semibold rounded-full mb-6">
                    Terakhir diperbarui: 26 Mei 2024
                </div>

                <p class="text-gray-600 mb-10 leading-relaxed text-[15px]">
                    Dengan mengakses atau menggunakan layanan KathaPayment, Anda menyetujui untuk terikat oleh syarat dan ketentuan berikut. Harap baca dengan seksama sebelum menggunakan layanan kami.
                </p>

                <div class="space-y-10">
                    <!-- Item 1 -->
                    <div id="pendahuluan" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-shield-halved text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">1. Pendahuluan</h3>
                            <p class="text-gray-600 text-[15px] leading-relaxed">Syarat & Ketentuan ini mengatur penggunaan layanan KathaPayment, termasuk seluruh produk, fitur, situs web, aplikasi, API, dan layanan lainnya yang disediakan oleh KathaPayment.</p>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div id="definisi" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-book-open text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">2. Definisi</h3>
                            <p class="text-gray-600 text-[15px] leading-relaxed mb-2">"KathaPayment", "kami", "milik kami" atau "Perusahaan" mengacu pada KathaPayment.</p>
                            <p class="text-gray-600 text-[15px] leading-relaxed">"Anda" atau "Pengguna" mengacu pada individu atau badan hukum yang menggunakan layanan kami.</p>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div id="akun" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-users text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">3. Akun Pengguna</h3>
                            <ul class="list-disc pl-5 text-gray-600 text-[15px] leading-relaxed space-y-1">
                                <li>Pengguna harus mendaftar untuk membuat akun guna mengakses layanan tertentu.</li>
                                <li>Anda bertanggung jawab atas kerahasiaan akun dan kata sandi Anda.</li>
                                <li>Anda bertanggung jawab atas semua aktivitas yang terjadi pada akun Anda.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div id="penggunaan" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-credit-card text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">4. Penggunaan Layanan</h3>
                            <ul class="list-disc pl-5 text-gray-600 text-[15px] leading-relaxed space-y-1">
                                <li>Layanan kami hanya boleh digunakan untuk tujuan yang sah dan sesuai dengan hukum yang berlaku.</li>
                                <li>Pengguna harus memastikan informasi yang diberikan akurat dan terbaru.</li>
                                <li>Kami berhak menolak atau membatasi layanan kepada siapa pun sesuai kebijakan kami.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Item 5 -->
                    <div id="biaya" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-circle-dollar-to-slot text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">5. Biaya dan Pembayaran</h3>
                            <ul class="list-disc pl-5 text-gray-600 text-[15px] leading-relaxed space-y-1">
                                <li>Beberapa layanan kami dikenakan biaya sesuai dengan paket atau penggunaan.</li>
                                <li>Semua biaya bersifat non-refundable kecuali ditentukan lain oleh kami.</li>
                                <li>KathaPayment berhak mengubah struktur biaya dengan pemberitahuan sebelumnya.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Item 6 -->
                    <div id="kewajiban" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-circle-check text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">6. Kewajiban Pengguna</h3>
                            <p class="text-gray-600 text-[15px] leading-relaxed">Pengguna setuju untuk menggunakan layanan dengan itikad baik, mematuhi semua kebijakan kami, serta bertanggung jawab penuh atas data dan konten yang dikirimkan.</p>
                        </div>
                    </div>

                    <!-- Item 7 -->
                    <div id="larangan" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-ban text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">7. Larangan</h3>
                            <p class="text-gray-600 text-[15px] leading-relaxed">Pengguna dilarang menggunakan layanan untuk aktivitas ilegal, penipuan, pelanggaran hak pihak lain, penyebaran malware, atau tindakan lain yang dapat merusak sistem, reputasi, atau operasional KathaPayment.</p>
                        </div>
                    </div>

                    <!-- Item 8 -->
                    <div id="keamanan" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-lock text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">8. Keamanan Akun</h3>
                            <p class="text-gray-600 text-[15px] leading-relaxed">Pengguna wajib menjaga kerahasiaan informasi akun mereka dan segera memberi tahu kami jika terjadi akses tidak sah atau pelanggaran keamanan.</p>
                        </div>
                    </div>

                    <!-- Item 9 -->
                    <div id="hki" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-regular fa-copyright text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">9. Hak Kekayaan Intelektual</h3>
                            <p class="text-gray-600 text-[15px] leading-relaxed">Seluruh konten, merek dagang, logo, dan materi lainnya pada layanan kami adalah milik KathaPayment dan dilindungi oleh hukum hak cipta dan kekayaan intelektual.</p>
                        </div>
                    </div>

                    <!-- Item 10 -->
                    <div id="tanggungjawab" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-scale-balanced text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">10. Pembatasan Tanggung Jawab</h3>
                            <p class="text-gray-600 text-[15px] leading-relaxed">KathaPayment tidak bertanggung jawab atas kerugian tidak langsung, kehilangan data, atau kerusakan lain yang timbul dari penggunaan layanan kami sejauh diizinkan oleh hukum.</p>
                        </div>
                    </div>

                    <!-- Item 11 -->
                    <div id="penghentian" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-power-off text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">11. Penghentian Layanan</h3>
                            <p class="text-gray-600 text-[15px] leading-relaxed">Kami berhak menghentikan atau menangguhkan akun atau akses ke layanan kami kapan saja tanpa pemberitahuan jika pengguna melanggar syarat ini.</p>
                        </div>
                    </div>

                    <!-- Item 12 -->
                    <div id="hukum" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-gavel text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">12. Hukum yang Berlaku</h3>
                            <p class="text-gray-600 text-[15px] leading-relaxed">Syarat & Ketentuan ini diatur dan ditafsirkan sesuai dengan hukum Republik Indonesia. Setiap sengketa akan diselesaikan di pengadilan yang berwenang di Jakarta.</p>
                        </div>
                    </div>

                    <!-- Item 13 -->
                    <div id="perubahan" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-pen-to-square text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">13. Perubahan Syarat</h3>
                            <p class="text-gray-600 text-[15px] leading-relaxed">Kami dapat memperbarui Syarat & Ketentuan ini dari waktu ke waktu. Perubahan akan diberitahukan melalui situs web atau email. Penggunaan layanan setelah perubahan berarti Anda menyetujui syarat baru.</p>
                        </div>
                    </div>

                    <!-- Item 14 -->
                    <div id="hubungi" class="flex gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <i class="fa-solid fa-headset text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">14. Hubungi Kami</h3>
                            <p class="text-gray-600 text-[15px] leading-relaxed mb-3">Jika Anda memiliki pertanyaan mengenai Syarat & Ketentuan ini, silakan hubungi kami:</p>
                            <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600">
                                <span class="flex items-center"><i class="fa-regular fa-envelope text-blue-600 mr-2"></i> Email: <a href="mailto:legal@kathapayment.com" class="text-blue-600 ml-1 hover:underline">legal@kathapayment.com</a></span>
                                <span class="hidden sm:inline text-gray-300">|</span>
                                <span class="flex items-center"><i class="fa-solid fa-building text-blue-600 mr-2"></i> Alamat: Jl. TB Simatupang No. 123, Jakarta Selatan, DKI Jakarta</span>
                                <span class="hidden sm:inline text-gray-300">|</span>
                                <span class="flex items-center"><i class="fa-solid fa-phone text-blue-600 mr-2"></i> Telepon: (021) 1234 5678</span>
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
                                <i class="fa-solid fa-file-contract"></i>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Terima kasih telah mempercayai KathaPayment</h3>
                            <p class="text-gray-600 text-sm leading-relaxed max-w-md">Kami berkomitmen untuk terus memberikan layanan pembayaran yang aman, mudah, dan terpercaya untuk mendukung pertumbuhan bisnis Anda.</p>
                        </div>
                    </div>
                    <a href="<?= base_url('privacy') ?>" class="shrink-0 px-6 py-2.5 bg-white text-blue-600 font-semibold rounded-lg border border-blue-200 hover:bg-blue-50 hover:border-blue-300 transition-colors shadow-sm">
                        Kunjungi Halaman Privasi <i class="fa-solid fa-arrow-right ml-2 text-sm"></i>
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
