<?php ob_start(); ?>

<!-- Hero Section -->
<div class="relative overflow-hidden bg-white pt-24 pb-16 lg:pt-32 lg:pb-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="lg:grid lg:grid-cols-12 lg:gap-8 items-center">
            
            <!-- Left: Copy -->
            <div class="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-5 lg:text-left">
                <!-- Badge -->
                <div class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-semibold bg-[#e8f5f3] text-[#0d9488] mb-6">
                    <div class="w-1.5 h-1.5 bg-[#0d9488] rounded-full mr-2"></div>
                    <?= $lang['hero_badge'] ?? 'Payment Gateway untuk Semua Bisnis' ?>
                </div>
                
                <!-- Heading -->
                <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl lg:text-[54px] leading-[1.1] mb-6">
                    <span class="block text-gray-900"><?= $lang['hero_title_1'] ?? 'Terima Pembayaran' ?></span>
                    <span class="block text-gray-900"><?= $lang['hero_title_2'] ?? 'Global. Kelola dengan' ?></span>
                    <span class="block text-gray-900"><?= $lang['hero_title_3'] ?? 'Mudah.' ?> <span class="text-primary-600"><?= $lang['hero_title_4'] ?? 'Tumbuh Tanpa Batas.' ?></span></span>
                </h1>
                
                <!-- Description -->
                <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 lg:mx-0 mb-8 leading-relaxed font-medium">
                    <?= $lang['hero_desc'] ?? 'KathaPayment adalah payment gateway modern yang dirancang untuk membantu bisnis Anda menerima pembayaran online dengan aman, cepat, dan andal.' ?>
                </p>
                
                <!-- Buttons -->
                <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start gap-4 mb-10">
                    <a href="<?= base_url('register') ?>" class="w-full sm:w-auto flex items-center justify-center px-8 py-3.5 border border-transparent text-[15px] font-semibold rounded-full text-white bg-primary-600 hover:bg-primary-700 transition-all shadow-[0_8px_20px_rgba(13,110,253,0.25)] hover:-translate-y-0.5">
                        <?= $lang['hero_start'] ?? 'Mulai Sekarang' ?> <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                    </a>
                    <a href="<?= base_url('faq') ?>" class="w-full sm:w-auto mt-3 sm:mt-0 flex items-center justify-center px-8 py-3.5 border-2 border-blue-100 text-[15px] font-semibold rounded-full text-primary-600 bg-white hover:bg-blue-50 transition-all hover:border-blue-200">
                        <?= $lang['hero_contact'] ?? 'Lihat Dokumentasi' ?>
                    </a>
                </div>

                <!-- Checkmarks -->
                <div class="flex flex-wrap items-center justify-center lg:justify-start gap-6 text-[13px] font-semibold text-gray-600">
                    <div class="flex items-center gap-2">
                        <div class="w-5 h-5 rounded-full bg-[#dcfce7] text-[#16a34a] flex items-center justify-center"><i class="fa-solid fa-check text-[10px]"></i></div>
                        <?= $lang['hero_check_1'] ?? 'Mudah Integrasi' ?>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-5 h-5 rounded-full bg-[#dcfce7] text-[#16a34a] flex items-center justify-center"><i class="fa-solid fa-check text-[10px]"></i></div>
                        <?= $lang['hero_check_2'] ?? 'Aman & Terpercaya' ?>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-5 h-5 rounded-full bg-[#dcfce7] text-[#16a34a] flex items-center justify-center"><i class="fa-solid fa-check text-[10px]"></i></div>
                        <?= $lang['hero_check_3'] ?? 'Realtime Notification' ?>
                    </div>
                </div>
            </div>

            <!-- Right: Illustration / Dashboard Mockup -->
            <div class="mt-16 lg:mt-0 lg:col-span-7 relative hidden md:block">
                <!-- Background decorative blob -->
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-blue-50 rounded-full filter blur-[100px] opacity-70 z-0"></div>
                
                <div class="relative z-10 w-full h-[500px]">
                    <!-- Dashboard window -->
                    <div class="absolute right-12 top-0 w-[550px] bg-white rounded-xl shadow-[0_20px_50px_rgba(0,0,0,0.08)] border border-gray-100 overflow-hidden transform hover:-translate-y-2 transition-transform duration-500">
                        <!-- header -->
                        <div class="px-4 py-3 border-b border-gray-50 flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <img src="<?= base_url('assets/images/logo.png') ?>" class="h-4 w-auto grayscale opacity-80" alt="">
                            </div>
                            <div class="flex items-center gap-3">
                                <i class="fa-regular fa-bell text-gray-300 text-sm"></i>
                                <div class="w-6 h-6 rounded-full bg-gray-200"></div>
                            </div>
                        </div>
                        <!-- body -->
                        <div class="p-6">
                            <div class="font-bold text-gray-800 text-sm mb-4">Ringkasan</div>
                            <div class="grid grid-cols-4 gap-3 mb-6">
                                <div class="bg-white border border-gray-100 rounded-lg p-3 shadow-sm">
                                    <div class="text-[10px] text-gray-400 mb-1">Total Transaksi</div>
                                    <div class="font-bold text-gray-800 text-lg">1.482</div>
                                </div>
                                <div class="bg-white border border-gray-100 rounded-lg p-3 shadow-sm col-span-2">
                                    <div class="text-[10px] text-gray-400 mb-1">Total Volume</div>
                                    <div class="font-bold text-gray-800 text-lg">Rp 2.450.000.000</div>
                                </div>
                                <div class="bg-white border border-gray-100 rounded-lg p-3 shadow-sm">
                                    <div class="text-[10px] text-gray-400 mb-1">Berhasil</div>
                                    <div class="font-bold text-green-600 text-lg">1.320</div>
                                </div>
                            </div>
                            <!-- Mock chart -->
                            <div class="font-bold text-gray-800 text-sm mb-4">Volume Transaksi</div>
                            <div class="h-32 w-full relative mb-4">
                                <!-- simple svg chart -->
                                <svg viewBox="0 0 400 100" class="w-full h-full overflow-visible">
                                    <path d="M0,80 Q40,40 80,70 T160,30 T240,60 T320,20 T400,50" fill="none" stroke="#0d6efd" stroke-width="3" />
                                    <path d="M0,90 Q40,60 80,85 T160,50 T240,75 T320,40 T400,65" fill="none" stroke="#22c55e" stroke-width="2" opacity="0.5" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile Phone Mockup -->
                    <div class="absolute right-0 bottom-[-40px] w-[240px] h-[480px] bg-white rounded-[2.5rem] shadow-[0_25px_50px_rgba(0,0,0,0.15)] border-[8px] border-gray-900 overflow-hidden transform hover:-translate-y-4 transition-transform duration-500 z-20">
                        <div class="absolute top-0 w-full h-6 bg-gray-900 rounded-b-xl px-16 z-30"></div>
                        <div class="bg-gray-50 h-full p-4 pt-10 relative">
                            <div class="flex items-center gap-2 mb-6 text-gray-800">
                                <i class="fa-solid fa-chevron-left text-sm"></i>
                                <span class="font-bold text-sm">Pembayaran</span>
                            </div>
                            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100 mb-4 text-center">
                                <div class="text-[11px] text-gray-400 mb-1">Total Pembayaran</div>
                                <div class="font-bold text-xl text-gray-900">Rp 250.000</div>
                                <div class="text-[10px] text-gray-400 mt-2">Order ID: INV-20240520-001</div>
                            </div>
                            <div class="font-bold text-[11px] text-gray-800 mb-3">Metode Pembayaran</div>
                            <div class="space-y-2">
                                <div class="bg-white rounded-lg p-3 border border-blue-200 flex justify-between items-center shadow-sm">
                                    <div class="flex items-center gap-2"><div class="w-6 h-4 bg-gray-200 rounded text-[8px] font-bold text-center leading-4">QRIS</div><span class="text-xs font-semibold">QRIS</span></div>
                                    <i class="fa-solid fa-chevron-right text-[10px] text-gray-400"></i>
                                </div>
                                <div class="bg-white rounded-lg p-3 border border-gray-100 flex justify-between items-center shadow-sm">
                                    <div class="flex items-center gap-2"><i class="fa-solid fa-building-columns text-blue-500 text-xs w-6 text-center"></i><span class="text-xs font-semibold">Virtual Account</span></div>
                                    <i class="fa-solid fa-chevron-right text-[10px] text-gray-400"></i>
                                </div>
                                <div class="bg-white rounded-lg p-3 border border-gray-100 flex justify-between items-center shadow-sm">
                                    <div class="flex items-center gap-2"><i class="fa-solid fa-wallet text-green-500 text-xs w-6 text-center"></i><span class="text-xs font-semibold">E-Wallet</span></div>
                                    <i class="fa-solid fa-chevron-right text-[10px] text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Clients Section -->
<div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-center text-sm font-bold text-gray-800 mb-8"><?= $lang['client_title'] ?? 'Dipercaya oleh ribuan bisnis di seluruh Indonesia' ?></p>
        <div class="flex flex-wrap justify-center items-center gap-8 md:gap-16 opacity-60 grayscale hover:grayscale-0 transition-all duration-500">
            <!-- Simulated Logos with Text & Icons -->
            <div class="flex items-center gap-1 font-bold text-xl tracking-tighter text-[#42b549]"><i class="fa-solid fa-bag-shopping text-2xl"></i> tokopedia</div>
            <div class="flex items-center gap-1 font-bold text-xl tracking-tight text-[#1ba0e2]"><i class="fa-brands fa-fly text-2xl"></i> traveloka</div>
            <div class="flex items-center gap-1 font-bold text-xl tracking-tight text-[#e31e52]"><i class="fa-solid fa-b text-2xl"></i> bukalapak</div>
            <div class="flex items-center gap-1 font-black text-2xl tracking-tighter text-[#4c3494]">OVO</div>
            <div class="flex items-center gap-1 font-black text-2xl tracking-tighter text-[#108ee9]">DANA</div>
            <div class="flex items-center gap-1 font-bold text-xl tracking-tighter text-[#ee4d2d]"><i class="fa-solid fa-basket-shopping text-2xl"></i> Shopee</div>
            <div class="flex items-center gap-1 font-bold text-xl tracking-tighter text-[#00aa13]"><i class="fa-solid fa-motorcycle text-2xl"></i> gojek</div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div id="features" class="py-24 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-xs text-primary-600 font-extrabold tracking-widest uppercase mb-4"><?= $lang['feat_label'] ?? 'FITUR UNGGULAN' ?></h2>
            <p class="text-3xl font-extrabold text-gray-900 sm:text-4xl mb-4 leading-tight">
                <?= $lang['feat_title'] ?? 'Semua yang Anda Butuhkan dalam Satu Platform' ?>
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-[0_2px_10px_rgba(0,0,0,0.02)] hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 rounded-xl bg-[#f0f4ff] border border-[#e0e7ff] text-primary-600 flex items-center justify-center mb-6">
                    <i class="fa-solid fa-wallet text-xl"></i>
                </div>
                <h3 class="text-[17px] font-bold text-gray-900 mb-2"><?= $lang['feat_1_title'] ?? 'Beragam Metode Pembayaran' ?></h3>
                <p class="text-sm text-gray-500 leading-relaxed font-medium">
                    <?= $lang['feat_1_desc'] ?? 'Dukung QRIS, Virtual Account, E-Wallet, Kartu Kredit, Retail, dan lainnya.' ?>
                </p>
            </div>

            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-[0_2px_10px_rgba(0,0,0,0.02)] hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 rounded-xl bg-[#f0f4ff] border border-[#e0e7ff] text-primary-600 flex items-center justify-center mb-6">
                    <i class="fa-solid fa-bell text-xl"></i>
                </div>
                <h3 class="text-[17px] font-bold text-gray-900 mb-2"><?= $lang['feat_2_title'] ?? 'Realtime Notification' ?></h3>
                <p class="text-sm text-gray-500 leading-relaxed font-medium">
                    <?= $lang['feat_2_desc'] ?? 'Dapatkan notifikasi instan untuk setiap status transaksi.' ?>
                </p>
            </div>

            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-[0_2px_10px_rgba(0,0,0,0.02)] hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 rounded-xl bg-[#f0f4ff] border border-[#e0e7ff] text-primary-600 flex items-center justify-center mb-6">
                    <i class="fa-solid fa-code text-xl"></i>
                </div>
                <h3 class="text-[17px] font-bold text-gray-900 mb-2"><?= $lang['feat_3_title'] ?? 'Mudah Integrasi' ?></h3>
                <p class="text-sm text-gray-500 leading-relaxed font-medium">
                    <?= $lang['feat_3_desc'] ?? 'API simpel dengan dokumentasi lengkap dan SDK untuk berbagai platform.' ?>
                </p>
            </div>

            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-[0_2px_10px_rgba(0,0,0,0.02)] hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 rounded-xl bg-[#f0f9ed] border border-[#dcfce7] text-green-600 flex items-center justify-center mb-6">
                    <i class="fa-solid fa-shield-halved text-xl"></i>
                </div>
                <h3 class="text-[17px] font-bold text-gray-900 mb-2"><?= $lang['feat_4_title'] ?? 'Keamanan Terjamin' ?></h3>
                <p class="text-sm text-gray-500 leading-relaxed font-medium">
                    <?= $lang['feat_4_desc'] ?? 'Sistem keamanan berlapis dengan enkripsi tingkat perbankan.' ?>
                </p>
            </div>

            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-[0_2px_10px_rgba(0,0,0,0.02)] hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 rounded-xl bg-[#f0f4ff] border border-[#e0e7ff] text-primary-600 flex items-center justify-center mb-6">
                    <i class="fa-solid fa-chart-line text-xl"></i>
                </div>
                <h3 class="text-[17px] font-bold text-gray-900 mb-2"><?= $lang['feat_5_title'] ?? 'Dashboard Lengkap' ?></h3>
                <p class="text-sm text-gray-500 leading-relaxed font-medium">
                    <?= $lang['feat_5_desc'] ?? 'Pantau semua transaksi, settlement, dan laporan dalam satu dashboard.' ?>
                </p>
            </div>

            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-[0_2px_10px_rgba(0,0,0,0.02)] hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 rounded-xl bg-[#f0f9ed] border border-[#dcfce7] text-green-600 flex items-center justify-center mb-6">
                    <i class="fa-solid fa-money-bill-transfer text-xl"></i>
                </div>
                <h3 class="text-[17px] font-bold text-gray-900 mb-2"><?= $lang['feat_6_title'] ?? 'Settlement Cepat' ?></h3>
                <p class="text-sm text-gray-500 leading-relaxed font-medium">
                    <?= $lang['feat_6_desc'] ?? 'Dana cair otomatis sesuai jadwal settlement yang Anda pilih.' ?>
                </p>
            </div>
            
        </div>
    </div>
</div>

<!-- Stats Section -->
<div class="pb-24 pt-8 bg-white">
    <div class="max-w-[1000px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-[#f8f9fa] rounded-3xl p-8 lg:p-12 flex flex-col md:flex-row justify-between items-center gap-8 border border-gray-100">
            
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center shadow-sm">
                    <i class="fa-solid fa-store text-2xl"></i>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-900"><?= $lang['stat_1_val'] ?? '10.000+' ?></div>
                    <div class="text-[13px] font-bold text-gray-800"><?= $lang['stat_1_lbl'] ?? 'Merchant Aktif' ?></div>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center shadow-sm">
                    <i class="fa-solid fa-receipt text-2xl"></i>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-900"><?= $lang['stat_2_val'] ?? '50 Juta+' ?></div>
                    <div class="text-[13px] font-bold text-gray-800"><?= $lang['stat_2_lbl'] ?? 'Transaksi Berhasil' ?></div>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center shadow-sm">
                    <i class="fa-solid fa-chart-pie text-2xl"></i>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-900"><?= $lang['stat_3_val'] ?? 'Rp 25 Triliun+' ?></div>
                    <div class="text-[13px] font-bold text-gray-800"><?= $lang['stat_3_lbl'] ?? 'Total Volume' ?></div>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center shadow-sm">
                    <i class="fa-solid fa-server text-2xl"></i>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-900"><?= $lang['stat_4_val'] ?? '99,9%' ?></div>
                    <div class="text-[13px] font-bold text-gray-800"><?= $lang['stat_4_lbl'] ?? 'Uptime System' ?></div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="py-24 bg-white border-t border-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-6 leading-tight">
            <?= $lang['cta_title'] ?? 'Siap Mengembangkan Bisnis Anda?' ?>
        </h2>
        <p class="text-gray-500 font-medium text-lg mb-10 max-w-2xl mx-auto">
            <?= $lang['cta_desc'] ?? 'Bergabunglah dengan ribuan bisnis yang telah mempercayakan pembayaran online mereka kepada KathaPayment.' ?>
        </p>
        <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
            <a href="<?= base_url('register') ?>" class="w-full sm:w-auto px-8 py-3.5 rounded-full text-white bg-primary-600 hover:bg-primary-700 font-bold shadow-[0_8px_20px_rgba(13,110,253,0.25)] transition-all hover:-translate-y-0.5 text-[15px]">
                <?= $lang['cta_btn_primary'] ?? 'Daftar Gratis Sekarang' ?> <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
            </a>
            <a href="<?= base_url('faq') ?>" class="w-full sm:w-auto px-8 py-3.5 rounded-full text-primary-600 bg-white border-2 border-blue-100 hover:border-blue-200 hover:bg-blue-50 font-bold transition-all text-[15px]">
                <?= $lang['cta_btn_secondary'] ?? 'Hubungi Sales' ?>
            </a>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean(); 
include BASE_PATH . '/app/views/layouts/public.php'; 
?>
