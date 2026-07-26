<?php ob_start(); ?>

<div class="pt-24 pb-20 bg-gray-50/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-blue-100 text-blue-700 mb-6 uppercase tracking-wider">
                HARGA TRANSPARAN
            </div>
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-[#0B1120] mb-6 tracking-tight leading-[1.1]">
                Harga Sederhana,<br>
                <span class="text-blue-600">Tanpa Biaya Tersembunyi</span>
            </h1>
            <p class="text-lg text-gray-500 mb-8 max-w-2xl mx-auto leading-relaxed">
                Bayar hanya untuk transaksi yang berhasil. Tidak ada biaya bulanan, tidak ada biaya setup, tidak ada biaya tersembunyi.
            </p>

            <!-- Toggle -->
            <div class="inline-flex bg-white rounded-full p-1 border border-gray-200 shadow-sm relative">
                <button class="px-8 py-2.5 rounded-full text-sm font-semibold bg-blue-600 text-white shadow-sm transition-all">Per Transaksi</button>
                <button class="px-8 py-2.5 rounded-full text-sm font-semibold text-gray-600 hover:text-gray-900 transition-all">Estimasi Biaya</button>
            </div>
        </div>

        <!-- Pricing Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
            
            <!-- Starter -->
            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm flex flex-col hover:shadow-lg transition-shadow relative">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mb-6">
                    <i class="fa-solid fa-paper-plane text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Starter</h3>
                <p class="text-sm text-gray-500 mb-6 min-h-[40px]">Untuk bisnis baru yang sedang berkembang.</p>
                <div class="mb-8">
                    <span class="text-4xl font-extrabold text-blue-600">2,9%</span>
                    <p class="text-xs text-gray-500 font-medium mt-1">/ transaksi berhasil</p>
                </div>
                <ul class="space-y-4 mb-8 flex-1">
                    <li class="flex items-start"><i class="fa-solid fa-circle-check text-emerald-500 mt-1 mr-3"></i><span class="text-sm text-gray-600 font-medium">Semua Metode Pembayaran</span></li>
                    <li class="flex items-start"><i class="fa-solid fa-circle-check text-emerald-500 mt-1 mr-3"></i><span class="text-sm text-gray-600 font-medium">Dashboard & Laporan Dasar</span></li>
                    <li class="flex items-start"><i class="fa-solid fa-circle-check text-emerald-500 mt-1 mr-3"></i><span class="text-sm text-gray-600 font-medium">Settlement Harian (H+1)</span></li>
                    <li class="flex items-start"><i class="fa-solid fa-circle-check text-emerald-500 mt-1 mr-3"></i><span class="text-sm text-gray-600 font-medium">API Standard</span></li>
                    <li class="flex items-start"><i class="fa-solid fa-circle-check text-emerald-500 mt-1 mr-3"></i><span class="text-sm text-gray-600 font-medium">Email Support</span></li>
                </ul>
                <a href="#" class="w-full py-3.5 px-4 bg-white border border-gray-200 text-gray-900 font-bold rounded-xl text-center hover:bg-gray-50 transition-colors">Daftar Gratis</a>
            </div>

            <!-- Professional -->
            <div class="bg-white rounded-3xl p-8 border-2 border-blue-600 shadow-xl flex flex-col relative transform lg:-translate-y-4">
                <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-blue-600 text-white text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wider">Paling Populer</div>
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mb-6">
                    <i class="fa-solid fa-briefcase text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Professional</h3>
                <p class="text-sm text-gray-500 mb-6 min-h-[40px]">Untuk bisnis yang sudah bertumbuh dan stabil.</p>
                <div class="mb-8">
                    <span class="text-4xl font-extrabold text-blue-600">2,4%</span>
                    <p class="text-xs text-gray-500 font-medium mt-1">/ transaksi berhasil</p>
                </div>
                <ul class="space-y-4 mb-8 flex-1">
                    <li class="flex items-start"><i class="fa-solid fa-circle-check text-emerald-500 mt-1 mr-3"></i><span class="text-sm text-gray-600 font-medium">Semua di Starter</span></li>
                    <li class="flex items-start"><i class="fa-solid fa-circle-check text-emerald-500 mt-1 mr-3"></i><span class="text-sm text-gray-600 font-medium">Settlement Instan (T+0)</span></li>
                    <li class="flex items-start"><i class="fa-solid fa-circle-check text-emerald-500 mt-1 mr-3"></i><span class="text-sm text-gray-600 font-medium">API Advanced</span></li>
                    <li class="flex items-start"><i class="fa-solid fa-circle-check text-emerald-500 mt-1 mr-3"></i><span class="text-sm text-gray-600 font-medium">Webhook & Notifikasi</span></li>
                    <li class="flex items-start"><i class="fa-solid fa-circle-check text-emerald-500 mt-1 mr-3"></i><span class="text-sm text-gray-600 font-medium">Laporan Real-time</span></li>
                    <li class="flex items-start"><i class="fa-solid fa-circle-check text-emerald-500 mt-1 mr-3"></i><span class="text-sm text-gray-600 font-medium">Prioritas Support</span></li>
                </ul>
                <a href="<?= base_url('register') ?>" class="w-full py-3.5 px-4 bg-blue-600 text-white font-bold rounded-xl text-center hover:bg-blue-700 transition-colors shadow-lg shadow-blue-500/30">Daftar Gratis</a>
            </div>

            <!-- Enterprise -->
            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm flex flex-col hover:shadow-lg transition-shadow relative">
                <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-xl flex items-center justify-center mb-6">
                    <i class="fa-regular fa-building text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Enterprise</h3>
                <p class="text-sm text-gray-500 mb-6 min-h-[40px]">Untuk perusahaan dengan volume transaksi besar.</p>
                <div class="mb-8">
                    <span class="text-4xl font-extrabold text-purple-600">Custom</span>
                    <p class="text-xs text-gray-500 font-medium mt-1">/ transaksi berhasil</p>
                </div>
                <ul class="space-y-4 mb-8 flex-1">
                    <li class="flex items-start"><i class="fa-solid fa-circle-check text-emerald-500 mt-1 mr-3"></i><span class="text-sm text-gray-600 font-medium">Semua di Professional</span></li>
                    <li class="flex items-start"><i class="fa-solid fa-circle-check text-emerald-500 mt-1 mr-3"></i><span class="text-sm text-gray-600 font-medium">Account Manager Dedicated</span></li>
                    <li class="flex items-start"><i class="fa-solid fa-circle-check text-emerald-500 mt-1 mr-3"></i><span class="text-sm text-gray-600 font-medium">SLA & Uptime 99,9%</span></li>
                    <li class="flex items-start"><i class="fa-solid fa-circle-check text-emerald-500 mt-1 mr-3"></i><span class="text-sm text-gray-600 font-medium">Custom Integration</span></li>
                    <li class="flex items-start"><i class="fa-solid fa-circle-check text-emerald-500 mt-1 mr-3"></i><span class="text-sm text-gray-600 font-medium">Analisa & Konsultasi Bisnis</span></li>
                    <li class="flex items-start"><i class="fa-solid fa-circle-check text-emerald-500 mt-1 mr-3"></i><span class="text-sm text-gray-600 font-medium">24/7 Priority Support</span></li>
                </ul>
                <a href="#" class="w-full py-3.5 px-4 bg-white border border-gray-200 text-blue-600 font-bold rounded-xl text-center hover:bg-gray-50 transition-colors">Hubungi Sales</a>
            </div>

            <!-- Non-profit -->
            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm flex flex-col hover:shadow-lg transition-shadow relative">
                <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center mb-6">
                    <i class="fa-regular fa-heart text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Non-profit</h3>
                <p class="text-sm text-gray-500 mb-6 min-h-[40px]">Untuk organisasi nirlaba dan sosial.</p>
                <div class="mb-8">
                    <span class="text-4xl font-extrabold text-emerald-600">1,5%</span>
                    <p class="text-xs text-gray-500 font-medium mt-1">/ transaksi berhasil</p>
                </div>
                <ul class="space-y-4 mb-8 flex-1">
                    <li class="flex items-start"><i class="fa-solid fa-circle-check text-emerald-500 mt-1 mr-3"></i><span class="text-sm text-gray-600 font-medium">Semua Metode Pembayaran</span></li>
                    <li class="flex items-start"><i class="fa-solid fa-circle-check text-emerald-500 mt-1 mr-3"></i><span class="text-sm text-gray-600 font-medium">Dashboard & Laporan Dasar</span></li>
                    <li class="flex items-start"><i class="fa-solid fa-circle-check text-emerald-500 mt-1 mr-3"></i><span class="text-sm text-gray-600 font-medium">Settlement Harian (H+1)</span></li>
                    <li class="flex items-start"><i class="fa-solid fa-circle-check text-emerald-500 mt-1 mr-3"></i><span class="text-sm text-gray-600 font-medium">API Standard</span></li>
                    <li class="flex items-start"><i class="fa-solid fa-circle-check text-emerald-500 mt-1 mr-3"></i><span class="text-sm text-gray-600 font-medium">Email Support</span></li>
                </ul>
                <a href="#" class="w-full py-3.5 px-4 bg-white border border-gray-200 text-gray-900 font-bold rounded-xl text-center hover:bg-gray-50 transition-colors">Daftar Gratis</a>
            </div>

        </div>

        <!-- 4 Badges -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-20">
            <div class="bg-white rounded-2xl p-6 border border-gray-100 flex items-start gap-4">
                <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center shrink-0 mt-1"><i class="fa-solid fa-shield-halved text-lg"></i></div>
                <div>
                    <h4 class="font-bold text-gray-900 mb-1 text-sm">Tanpa Biaya Setup</h4>
                    <p class="text-xs text-gray-500 leading-relaxed">Daftar gratis, tanpa biaya pendaftaran.</p>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-6 border border-gray-100 flex items-start gap-4">
                <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center shrink-0 mt-1"><i class="fa-regular fa-file-lines text-lg"></i></div>
                <div>
                    <h4 class="font-bold text-gray-900 mb-1 text-sm">Tanpa Biaya Bulanan</h4>
                    <p class="text-xs text-gray-500 leading-relaxed">Tidak ada biaya bulanan atau biaya langganan.</p>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-6 border border-gray-100 flex items-start gap-4">
                <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center shrink-0 mt-1"><i class="fa-solid fa-percent text-lg"></i></div>
                <div>
                    <h4 class="font-bold text-gray-900 mb-1 text-sm">Harga Transparan</h4>
                    <p class="text-xs text-gray-500 leading-relaxed">Bayar hanya untuk transaksi yang berhasil.</p>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-6 border border-gray-100 flex items-start gap-4">
                <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center shrink-0 mt-1"><i class="fa-solid fa-lock text-lg"></i></div>
                <div>
                    <h4 class="font-bold text-gray-900 mb-1 text-sm">Keamanan Terjamin</h4>
                    <p class="text-xs text-gray-500 leading-relaxed">Sistem berstandar internasional dan terenkripsi.</p>
                </div>
            </div>
        </div>

        <!-- Compare Features Table -->
        <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden mb-20">
            <div class="px-8 py-6 border-b border-gray-100">
                <h3 class="text-xl font-bold text-gray-900">Perbandingan Fitur</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50 text-sm">
                            <th class="px-8 py-4 font-bold text-gray-900 w-1/3">Fitur</th>
                            <th class="px-6 py-4 font-bold text-gray-900 text-center w-1/6">Starter</th>
                            <th class="px-6 py-4 font-bold text-gray-900 text-center w-1/6">Professional</th>
                            <th class="px-6 py-4 font-bold text-gray-900 text-center w-1/6">Enterprise</th>
                            <th class="px-6 py-4 font-bold text-gray-900 text-center w-1/6">Non-profit</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-100">
                        <tr>
                            <td class="px-8 py-5 font-semibold text-gray-700">Metode Pembayaran</td>
                            <td class="px-6 py-5 text-gray-600 text-center">Semua</td>
                            <td class="px-6 py-5 text-gray-600 text-center">Semua</td>
                            <td class="px-6 py-5 text-gray-600 text-center">Semua</td>
                            <td class="px-6 py-5 text-gray-600 text-center">Semua</td>
                        </tr>
                        <tr>
                            <td class="px-8 py-5 font-semibold text-gray-700">Settlement</td>
                            <td class="px-6 py-5 text-gray-600 text-center">H+1</td>
                            <td class="px-6 py-5 text-gray-600 text-center">T+0 (Instan)</td>
                            <td class="px-6 py-5 text-gray-600 text-center">T+0 (Instan)</td>
                            <td class="px-6 py-5 text-gray-600 text-center">H+1</td>
                        </tr>
                        <tr>
                            <td class="px-8 py-5 font-semibold text-gray-700">Dashboard & Laporan</td>
                            <td class="px-6 py-5 text-center text-emerald-500"><i class="fa-solid fa-circle-check"></i></td>
                            <td class="px-6 py-5 text-center text-emerald-500"><i class="fa-solid fa-circle-check"></i></td>
                            <td class="px-6 py-5 text-center text-emerald-500"><i class="fa-solid fa-circle-check"></i></td>
                            <td class="px-6 py-5 text-center text-emerald-500"><i class="fa-solid fa-circle-check"></i></td>
                        </tr>
                        <tr>
                            <td class="px-8 py-5 font-semibold text-gray-700">Laporan Real-time</td>
                            <td class="px-6 py-5 text-center text-gray-300"><i class="fa-solid fa-minus"></i></td>
                            <td class="px-6 py-5 text-center text-emerald-500"><i class="fa-solid fa-circle-check"></i></td>
                            <td class="px-6 py-5 text-center text-emerald-500"><i class="fa-solid fa-circle-check"></i></td>
                            <td class="px-6 py-5 text-center text-gray-300"><i class="fa-solid fa-minus"></i></td>
                        </tr>
                        <tr>
                            <td class="px-8 py-5 font-semibold text-gray-700">Webhook & Notifikasi</td>
                            <td class="px-6 py-5 text-center text-gray-300"><i class="fa-solid fa-minus"></i></td>
                            <td class="px-6 py-5 text-center text-emerald-500"><i class="fa-solid fa-circle-check"></i></td>
                            <td class="px-6 py-5 text-center text-emerald-500"><i class="fa-solid fa-circle-check"></i></td>
                            <td class="px-6 py-5 text-center text-gray-300"><i class="fa-solid fa-minus"></i></td>
                        </tr>
                        <tr>
                            <td class="px-8 py-5 font-semibold text-gray-700">API Access</td>
                            <td class="px-6 py-5 text-gray-600 text-center">Standard</td>
                            <td class="px-6 py-5 text-gray-600 text-center">Advanced</td>
                            <td class="px-6 py-5 text-gray-600 text-center">Custom</td>
                            <td class="px-6 py-5 text-gray-600 text-center">Standard</td>
                        </tr>
                        <tr>
                            <td class="px-8 py-5 font-semibold text-gray-700">Account Manager</td>
                            <td class="px-6 py-5 text-center text-gray-300"><i class="fa-solid fa-minus"></i></td>
                            <td class="px-6 py-5 text-center text-gray-300"><i class="fa-solid fa-minus"></i></td>
                            <td class="px-6 py-5 text-center text-emerald-500"><i class="fa-solid fa-circle-check"></i></td>
                            <td class="px-6 py-5 text-center text-gray-300"><i class="fa-solid fa-minus"></i></td>
                        </tr>
                        <tr>
                            <td class="px-8 py-5 font-semibold text-gray-700">SLA & Uptime 99,9%</td>
                            <td class="px-6 py-5 text-center text-gray-300"><i class="fa-solid fa-minus"></i></td>
                            <td class="px-6 py-5 text-center text-gray-300"><i class="fa-solid fa-minus"></i></td>
                            <td class="px-6 py-5 text-center text-emerald-500"><i class="fa-solid fa-circle-check"></i></td>
                            <td class="px-6 py-5 text-center text-gray-300"><i class="fa-solid fa-minus"></i></td>
                        </tr>
                        <tr>
                            <td class="px-8 py-5 font-semibold text-gray-700">Support</td>
                            <td class="px-6 py-5 text-gray-600 text-center">Email (24 Jam)</td>
                            <td class="px-6 py-5 text-gray-600 text-center">Prioritas</td>
                            <td class="px-6 py-5 text-gray-600 text-center">24/7 Priority</td>
                            <td class="px-6 py-5 text-gray-600 text-center">Email (24 Jam)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- CTA -->
        <div class="bg-blue-50 rounded-[2.5rem] p-10 flex flex-col md:flex-row items-center justify-between border border-blue-100">
            <div class="flex items-center gap-6 mb-6 md:mb-0">
                <div class="w-24 h-24 hidden md:flex shrink-0">
                    <img src="<?= base_url('assets/images/logo.png') ?>" alt="CTA Icon" class="object-contain opacity-50">
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Siap Terima Pembayaran dengan KathaPayment?</h3>
                    <p class="text-gray-600">Bergabunglah dengan ribuan bisnis yang telah mempercayakan pembayaran online mereka kepada KathaPayment.</p>
                </div>
            </div>
            <div class="flex gap-4 shrink-0">
                <a href="<?= base_url('register') ?>" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-xl hover:bg-blue-700 transition-colors shadow-md">
                    Daftar Gratis Sekarang <i class="fa-solid fa-arrow-right ml-1"></i>
                </a>
                <a href="#" class="px-6 py-3 bg-white text-blue-600 border border-blue-200 font-semibold rounded-xl hover:bg-blue-50 transition-colors">
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
