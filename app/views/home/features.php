<?php ob_start(); ?>

<!-- Hero Section -->
<div class="pt-32 pb-16 bg-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Text Content -->
            <div>
                <div class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-blue-50 text-blue-600 mb-6 uppercase tracking-wider">
                    FITUR KATHAPAYMENT
                </div>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-[#0B1120] mb-6 tracking-tight leading-[1.1]">
                    Semua Fitur yang Anda Butuhkan untuk Menerima Pembayaran Online dengan <span class="text-primary-600">Mudah</span>
                </h1>
                <p class="text-lg text-gray-500 mb-8 max-w-lg leading-relaxed">
                    KathaPayment menyediakan berbagai fitur canggih dan fleksibel untuk membantu bisnis Anda tumbuh lebih cepat.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="<?= base_url('register') ?>" class="px-8 py-3.5 bg-primary-600 text-white font-semibold rounded-lg hover:bg-primary-700 transition-colors text-center shadow-md shadow-primary-500/30">
                        Daftar Gratis <i class="fa-solid fa-arrow-right ml-2"></i>
                    </a>
                    <a href="<?= base_url('dokumentasi') ?>" class="px-8 py-3.5 bg-white text-gray-700 border border-gray-200 font-semibold rounded-lg hover:bg-gray-50 transition-colors text-center">
                        <i class="fa-regular fa-file-lines mr-2"></i> Lihat Dokumentasi
                    </a>
                </div>
            </div>

            <!-- Dashboard Mockup -->
            <div class="relative hidden md:block">
                <!-- Outer Window -->
                <div class="bg-white rounded-2xl shadow-[0_20px_50px_-12px_rgba(0,0,0,0.1)] border border-gray-100 overflow-hidden">
                    <!-- Mac Header -->
                    <div class="bg-gray-50 px-4 py-3 flex items-center border-b border-gray-100">
                        <div class="flex space-x-1.5">
                            <div class="w-3 h-3 rounded-full bg-red-400"></div>
                            <div class="w-3 h-3 rounded-full bg-amber-400"></div>
                            <div class="w-3 h-3 rounded-full bg-green-400"></div>
                        </div>
                    </div>
                    <!-- Dashboard Content -->
                    <div class="p-6 grid grid-cols-12 gap-6 bg-gray-50/50">
                        <!-- Sidebar -->
                        <div class="col-span-3 space-y-4 border-r border-gray-100 pr-4">
                            <div class="w-10 h-10 bg-primary-600 rounded-lg flex items-center justify-center text-white font-bold mb-8">KP</div>
                            <div class="flex items-center text-primary-600 font-medium text-sm bg-primary-50 p-2 rounded-md"><i class="fa-solid fa-chart-pie w-6"></i> Dashboard</div>
                            <div class="flex items-center text-gray-500 font-medium text-sm p-2 hover:bg-gray-100 rounded-md"><i class="fa-solid fa-money-bill-transfer w-6"></i> Transaksi</div>
                            <div class="flex items-center text-gray-500 font-medium text-sm p-2 hover:bg-gray-100 rounded-md"><i class="fa-solid fa-users w-6"></i> Pelanggan</div>
                            <div class="flex items-center text-gray-500 font-medium text-sm p-2 hover:bg-gray-100 rounded-md"><i class="fa-solid fa-wallet w-6"></i> Settlement</div>
                            <div class="flex items-center text-gray-500 font-medium text-sm p-2 hover:bg-gray-100 rounded-md"><i class="fa-solid fa-file-invoice w-6"></i> Laporan</div>
                            <div class="flex items-center text-gray-500 font-medium text-sm p-2 hover:bg-gray-100 rounded-md mt-8"><i class="fa-solid fa-code w-6"></i> API & Webhook</div>
                        </div>
                        
                        <!-- Main Panel -->
                        <div class="col-span-9 space-y-6">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100">
                                    <p class="text-xs text-gray-500 font-medium mb-1">Total Transaksi</p>
                                    <h4 class="text-2xl font-bold text-gray-900 mb-2">1.482</h4>
                                    <p class="text-xs text-emerald-500 font-medium"><i class="fa-solid fa-arrow-trend-up mr-1"></i> +12.9% <span class="text-gray-400 font-normal ml-1">Dibanding kemarin</span></p>
                                </div>
                                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100">
                                    <p class="text-xs text-gray-500 font-medium mb-1">Total Volume</p>
                                    <h4 class="text-2xl font-bold text-gray-900 mb-2">Rp 2.450.000.000</h4>
                                    <p class="text-xs text-emerald-500 font-medium"><i class="fa-solid fa-arrow-trend-up mr-1"></i> +18.2% <span class="text-gray-400 font-normal ml-1">Dibanding kemarin</span></p>
                                </div>
                            </div>
                            
                            <!-- Chart Mockup -->
                            <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 h-40 relative overflow-hidden">
                                <p class="text-xs text-gray-500 font-medium mb-4">Volume Transaksi</p>
                                <svg class="w-full h-full text-blue-100" preserveAspectRatio="none" viewBox="0 0 100 100">
                                    <path d="M0,100 L0,60 C20,70 40,40 60,50 C80,60 90,30 100,20 L100,100 Z" fill="currentColor"></path>
                                    <path d="M0,60 C20,70 40,40 60,50 C80,60 90,30 100,20" fill="none" stroke="#2563eb" stroke-width="2"></path>
                                </svg>
                                <!-- Tooltip Mockup -->
                                <div class="absolute top-8 right-16 bg-white shadow-lg border border-gray-100 p-2 rounded-md z-10 text-center">
                                    <p class="text-[10px] text-gray-500">18 Mei 2024</p>
                                    <p class="text-xs font-bold text-gray-900">Rp 240.000.000</p>
                                </div>
                                <div class="absolute top-[20%] right-[16%] w-3 h-3 bg-blue-600 rounded-full border-2 border-white shadow-sm z-10"></div>
                                <div class="absolute top-[20%] right-[16%] w-[1px] h-full bg-blue-600/30 border-dashed z-0"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Features Grid -->
<div class="py-24 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h4 class="text-sm font-bold text-blue-600 tracking-widest uppercase mb-3">FITUR UNGGULAN</h4>
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">Fitur Lengkap untuk Setiap Kebutuhan Bisnis</h2>
            <p class="text-gray-500 text-lg">Dirancang untuk kemudahan, keamanan, dan performa terbaik.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <!-- Feature 1 -->
            <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center mb-6">
                    <i class="fa-solid fa-credit-card text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Beragam Metode Pembayaran</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-6">Dukung berbagai metode pembayaran populer seperti QRIS, Virtual Account, E-Wallet, Kartu Kredit, Retail, dan lainnya.</p>
                <a href="#" class="text-blue-600 font-semibold text-sm hover:text-blue-700">Pelajari lebih lanjut <i class="fa-solid fa-arrow-right ml-1"></i></a>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-6">
                    <i class="fa-solid fa-shield-check text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Keamanan Terjamin</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-6">Sistem keamanan berlapis dengan enkripsi tingkat tinggi dan kepatuhan terhadap standar industri.</p>
                <a href="#" class="text-blue-600 font-semibold text-sm hover:text-blue-700">Pelajari lebih lanjut <i class="fa-solid fa-arrow-right ml-1"></i></a>
            </div>

            <!-- Feature 3 -->
            <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center mb-6">
                    <i class="fa-solid fa-bolt text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Proses Cepat & Stabil</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-6">Infrastruktur modern dengan uptime 99,9% untuk memastikan setiap transaksi berjalan cepat dan stabil.</p>
                <a href="#" class="text-blue-600 font-semibold text-sm hover:text-blue-700">Pelajari lebih lanjut <i class="fa-solid fa-arrow-right ml-1"></i></a>
            </div>

            <!-- Feature 4 -->
            <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center mb-6">
                    <i class="fa-solid fa-wallet text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Settlement Otomatis</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-6">Pencairan dana otomatis sesuai jadwal yang Anda pilih dengan transparansi penuh.</p>
                <a href="#" class="text-blue-600 font-semibold text-sm hover:text-blue-700">Pelajari lebih lanjut <i class="fa-solid fa-arrow-right ml-1"></i></a>
            </div>

            <!-- Feature 5 -->
            <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center mb-6">
                    <i class="fa-solid fa-code text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Integrasi Mudah</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-6">API sederhana dan dokumentasi lengkap memudahkan integrasi dengan sistem Anda dalam hitungan jam.</p>
                <a href="#" class="text-blue-600 font-semibold text-sm hover:text-blue-700">Pelajari lebih lanjut <i class="fa-solid fa-arrow-right ml-1"></i></a>
            </div>

            <!-- Feature 6 -->
            <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 rounded-xl bg-cyan-50 text-cyan-600 flex items-center justify-center mb-6">
                    <i class="fa-solid fa-chart-mixed text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Laporan Real-time</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-6">Pantau semua transaksi dan settlement secara real-time dengan dashboard yang informatif.</p>
                <a href="#" class="text-blue-600 font-semibold text-sm hover:text-blue-700">Pelajari lebih lanjut <i class="fa-solid fa-arrow-right ml-1"></i></a>
            </div>

        </div>
    </div>
</div>

<!-- Stats & Integration -->
<div class="py-16 bg-gray-50/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-10">
            <h3 class="text-xl font-bold text-gray-900">Dipercaya oleh Ribuan Bisnis di Seluruh Indonesia</h3>
        </div>
        
        <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm mb-20 flex flex-wrap justify-between items-center gap-8">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center"><i class="fa-solid fa-store text-xl"></i></div>
                <div>
                    <h4 class="text-3xl font-extrabold text-blue-600">10.000+</h4>
                    <p class="text-sm font-medium text-gray-600">Merchant Aktif</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center"><i class="fa-solid fa-money-bill-transfer text-xl"></i></div>
                <div>
                    <h4 class="text-3xl font-extrabold text-blue-600">50 Juta+</h4>
                    <p class="text-sm font-medium text-gray-600">Transaksi Berhasil</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center"><i class="fa-solid fa-coins text-xl"></i></div>
                <div>
                    <h4 class="text-3xl font-extrabold text-blue-600">Rp 25 Triliun+</h4>
                    <p class="text-sm font-medium text-gray-600">Total Volume Transaksi</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-cyan-50 text-cyan-600 flex items-center justify-center"><i class="fa-solid fa-shield-check text-xl"></i></div>
                <div>
                    <h4 class="text-3xl font-extrabold text-blue-600">99,9%</h4>
                    <p class="text-sm font-medium text-gray-600">Uptime System</p>
                </div>
            </div>
        </div>

        <div class="text-center mb-10">
            <h3 class="text-2xl font-bold text-gray-900 mb-2">Integrasi Fleksibel</h3>
            <p class="text-gray-500">KathaPayment mudah terintegrasi dengan berbagai platform dan teknologi.</p>
        </div>

        <div class="flex flex-wrap justify-center gap-4 md:gap-8 mb-8 opacity-70 grayscale hover:grayscale-0 transition-all">
            <div class="h-12 px-6 bg-white border border-gray-200 rounded-xl flex items-center shadow-sm"><i class="fa-brands fa-php text-3xl text-[#777bb3]"></i></div>
            <div class="h-12 px-6 bg-white border border-gray-200 rounded-xl flex items-center shadow-sm"><i class="fa-brands fa-laravel text-3xl text-[#F05340]"></i><span class="ml-2 font-bold text-[#F05340]">LARAVEL</span></div>
            <div class="h-12 px-6 bg-white border border-gray-200 rounded-xl flex items-center shadow-sm font-black text-2xl text-black">NEXT<span class="font-light text-sm">.js</span></div>
            <div class="h-12 px-6 bg-white border border-gray-200 rounded-xl flex items-center shadow-sm"><i class="fa-brands fa-node-js text-3xl text-[#339933]"></i></div>
            <div class="h-12 px-6 bg-white border border-gray-200 rounded-xl flex items-center shadow-sm"><i class="fa-brands fa-wordpress text-3xl text-[#21759b]"></i><span class="ml-2 font-bold text-[#21759b]">WooCommerce</span></div>
            <div class="h-12 px-6 bg-white border border-gray-200 rounded-xl flex items-center shadow-sm"><i class="fa-brands fa-shopify text-3xl text-[#95bf47]"></i><span class="ml-2 font-bold text-[#95bf47]">shopify</span></div>
        </div>
        <div class="text-center">
            <a href="#" class="text-blue-600 font-semibold text-sm hover:text-blue-700">Lihat semua integrasi <i class="fa-solid fa-arrow-right ml-1"></i></a>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="py-12 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-blue-50 rounded-2xl p-8 md:p-12 flex flex-col md:flex-row items-center justify-between">
            <div class="mb-6 md:mb-0 text-center md:text-left">
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Siap Mengembangkan Bisnis Anda?</h3>
                <p class="text-gray-600">Gunakan fitur lengkap KathaPayment sekarang juga.</p>
            </div>
            <div class="flex gap-4">
                <a href="<?= base_url('register') ?>" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors shadow-md">
                    Daftar Gratis Sekarang <i class="fa-solid fa-arrow-right ml-1"></i>
                </a>
                <a href="#" class="px-6 py-3 bg-white text-blue-600 border border-blue-200 font-semibold rounded-lg hover:bg-blue-50 transition-colors">
                    Hubungi Sales
                </a>
            </div>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean(); 
include BASE_PATH . '/app/views/layouts/public.php'; 
?>
