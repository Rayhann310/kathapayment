<?php ob_start(); ?>

<!-- Hero Section -->
<div class="pt-32 pb-16 bg-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            
            <!-- Left Text -->
            <div class="relative z-10">
                <div class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-blue-50 text-blue-600 mb-6 uppercase tracking-wider">
                    DEVELOPER
                </div>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-[#0B1120] mb-6 tracking-tight leading-[1.1]">
                    Bangun Integrasi Pembayaran dengan <span class="text-blue-600">Mudah & Cepat</span>
                </h1>
                <p class="text-lg text-gray-500 mb-8 max-w-lg leading-relaxed">
                    API KathaPayment dirancang untuk developer dengan dokumentasi yang lengkap, SDK siap pakai, dan contoh kode di berbagai bahasa pemrograman.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 mb-10">
                    <a href="<?= base_url('register') ?>" class="px-8 py-3.5 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors text-center shadow-md shadow-blue-500/30">
                        Mulai Integrasi <i class="fa-solid fa-arrow-right ml-2"></i>
                    </a>
                    <a href="<?= base_url('dokumentasi') ?>" class="px-8 py-3.5 bg-white text-blue-600 border border-blue-200 font-semibold rounded-lg hover:bg-blue-50 transition-colors text-center">
                        <i class="fa-regular fa-file-lines mr-2"></i> Lihat Dokumentasi
                    </a>
                </div>

                <div class="flex flex-wrap gap-6 items-center">
                    <div class="flex items-center text-sm font-semibold text-gray-600"><i class="fa-solid fa-code text-blue-500 mr-2"></i> RESTful API</div>
                    <div class="flex items-center text-sm font-semibold text-gray-600"><i class="fa-solid fa-brackets-curly text-blue-500 mr-2"></i> JSON Response</div>
                    <div class="flex items-center text-sm font-semibold text-gray-600"><i class="fa-solid fa-lock text-blue-500 mr-2"></i> HTTPS Secure</div>
                    <div class="flex items-center text-sm font-semibold text-gray-600"><i class="fa-solid fa-layer-group text-blue-500 mr-2"></i> API Versioning</div>
                </div>
            </div>

            <!-- Right Terminal Mockup -->
            <div class="relative z-10">
                <div class="bg-[#0f172a] rounded-2xl shadow-2xl overflow-hidden font-mono text-sm border border-slate-800 relative group">
                    <div class="absolute top-4 right-4 z-20">
                        <button class="bg-white/10 hover:bg-white/20 text-white border border-white/20 px-3 py-1.5 rounded-md text-xs font-sans transition-colors flex items-center">
                            <i class="fa-regular fa-copy mr-1.5"></i> Salin
                        </button>
                    </div>
                    <!-- Mac Header -->
                    <div class="bg-slate-900/80 px-4 py-3 flex items-center border-b border-slate-800">
                        <div class="flex space-x-2 mr-6">
                            <div class="w-3 h-3 rounded-full bg-rose-500/80"></div>
                            <div class="w-3 h-3 rounded-full bg-amber-500/80"></div>
                            <div class="w-3 h-3 rounded-full bg-emerald-500/80"></div>
                        </div>
                        <div class="flex gap-4">
                            <button class="text-white border-b-2 border-white pb-1 px-2 text-xs font-sans font-semibold">cURL</button>
                            <button class="text-slate-400 hover:text-slate-200 pb-1 px-2 text-xs font-sans font-semibold transition-colors">PHP</button>
                            <button class="text-slate-400 hover:text-slate-200 pb-1 px-2 text-xs font-sans font-semibold transition-colors">Node.js</button>
                            <button class="text-slate-400 hover:text-slate-200 pb-1 px-2 text-xs font-sans font-semibold transition-colors">Python</button>
                            <button class="text-slate-400 hover:text-slate-200 pb-1 px-2 text-xs font-sans font-semibold transition-colors">Go</button>
                        </div>
                    </div>
                    <!-- Code Content -->
                    <div class="p-6 text-slate-300 overflow-x-auto text-[13px] leading-relaxed">
<pre class="flex">
<div class="flex flex-col text-slate-600 select-none pr-4 border-r border-slate-800 text-right mr-4">
<span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span><span>10</span><span>11</span><span>12</span><span>13</span><span>14</span><span>15</span>
</div>
<div>
<span class="text-cyan-400">curl</span> <span class="text-purple-400">--request</span> POST \
  <span class="text-purple-400">--url</span> <span class="text-green-300">https://api.kathapayment.id/v1/payment</span> \
  <span class="text-purple-400">--header</span> <span class="text-green-300">'Authorization: Bearer YOUR_API_KEY'</span> \
  <span class="text-purple-400">--header</span> <span class="text-green-300">'Content-Type: application/json'</span> \
  <span class="text-purple-400">--data</span> <span class="text-green-300">'{</span>
    <span class="text-orange-300">"order_id"</span>: <span class="text-green-300">"INV-20240520-0001"</span>,
    <span class="text-orange-300">"amount"</span>: <span class="text-blue-400">100000</span>,
    <span class="text-orange-300">"customer"</span>: {
      <span class="text-orange-300">"name"</span>: <span class="text-green-300">"John Doe"</span>,
      <span class="text-orange-300">"email"</span>: <span class="text-green-300">"john@example.com"</span>,
      <span class="text-orange-300">"phone"</span>: <span class="text-green-300">"081234567890"</span>
    },
    <span class="text-orange-300">"return_url"</span>: <span class="text-green-300">"https://yourdomain.com/thank-you"</span>,
    <span class="text-orange-300">"notification_url"</span>: <span class="text-green-300">"https://yourdomain.com/webhook"</span>
<span class="text-green-300">}'</span>
</div>
</pre>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Kenapa API -->
<div class="py-20 bg-gray-50/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900">Kenapa Developer memilih KathaPayment API?</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-4">
            
            <div class="bg-white p-6 border border-gray-100 rounded-xl shadow-sm text-center col-span-1 lg:col-span-2 hover:-translate-y-1 transition-transform">
                <div class="w-12 h-12 mx-auto text-blue-500 mb-4"><i class="fa-solid fa-bolt text-3xl"></i></div>
                <h4 class="font-bold text-gray-900 mb-2">Mudah & Cepat</h4>
                <p class="text-xs text-gray-500">Integrasi hanya dalam hitungan jam.</p>
            </div>
            
            <div class="bg-white p-6 border border-gray-100 rounded-xl shadow-sm text-center col-span-1 lg:col-span-2 hover:-translate-y-1 transition-transform">
                <div class="w-12 h-12 mx-auto text-blue-500 mb-4"><i class="fa-solid fa-shield-check text-3xl"></i></div>
                <h4 class="font-bold text-gray-900 mb-2">Aman & Terpercaya</h4>
                <p class="text-xs text-gray-500">Enkripsi berlapis, tokenisasi, dan standar keamanan tinggi.</p>
            </div>
            
            <div class="bg-white p-6 border border-gray-100 rounded-xl shadow-sm text-center col-span-1 lg:col-span-2 hover:-translate-y-1 transition-transform">
                <div class="w-12 h-12 mx-auto text-blue-500 mb-4"><i class="fa-solid fa-cube text-3xl"></i></div>
                <h4 class="font-bold text-gray-900 mb-2">SDK & Library</h4>
                <p class="text-xs text-gray-500">Tersedia SDK resmi untuk berbagai bahasa.</p>
            </div>
            
            <div class="bg-white p-6 border border-gray-100 rounded-xl shadow-sm text-center col-span-1 lg:col-span-2 hover:-translate-y-1 transition-transform">
                <div class="w-12 h-12 mx-auto text-blue-500 mb-4"><i class="fa-solid fa-desktop text-3xl"></i></div>
                <h4 class="font-bold text-gray-900 mb-2">Webhook Real-time</h4>
                <p class="text-xs text-gray-500">Update transaksi otomatis melalui webhook.</p>
            </div>
            
            <div class="bg-white p-6 border border-gray-100 rounded-xl shadow-sm text-center col-span-1 lg:col-span-2 hover:-translate-y-1 transition-transform">
                <div class="w-12 h-12 mx-auto text-blue-500 mb-4"><i class="fa-solid fa-chart-line-up text-3xl"></i></div>
                <h4 class="font-bold text-gray-900 mb-2">Monitoring Lengkap</h4>
                <p class="text-xs text-gray-500">Dashboard developer & log transaksi detail.</p>
            </div>
            
            <div class="bg-white p-6 border border-gray-100 rounded-xl shadow-sm text-center col-span-1 lg:col-span-2 hover:-translate-y-1 transition-transform">
                <div class="w-12 h-12 mx-auto text-blue-500 mb-4"><i class="fa-solid fa-headset text-3xl"></i></div>
                <h4 class="font-bold text-gray-900 mb-2">Developer Support</h4>
                <p class="text-xs text-gray-500">Tim developer support siap membantu Anda.</p>
            </div>
            
        </div>
    </div>
</div>

<!-- Alur Integrasi -->
<div class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900">Alur Integrasi</h2>
        </div>

        <div class="relative max-w-5xl mx-auto">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4 relative z-10">
                
                <div class="flex-1 bg-white p-6 rounded-xl border border-gray-100 shadow-sm flex flex-col items-center text-center">
                    <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mb-4"><i class="fa-solid fa-key"></i></div>
                    <h5 class="text-sm font-bold text-gray-900 mb-2">Daftar & Dapatkan API Key</h5>
                    <p class="text-xs text-gray-500">Buat akun dan dapatkan API Key di Dashboard.</p>
                </div>
                <div class="text-gray-300 hidden md:block"><i class="fa-solid fa-arrow-right"></i></div>
                
                <div class="flex-1 bg-white p-6 rounded-xl border border-gray-100 shadow-sm flex flex-col items-center text-center">
                    <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mb-4"><i class="fa-solid fa-code"></i></div>
                    <h5 class="text-sm font-bold text-gray-900 mb-2">Integrasi API</h5>
                    <p class="text-xs text-gray-500">Gunakan API sesuai dokumentasi kami.</p>
                </div>
                <div class="text-gray-300 hidden md:block"><i class="fa-solid fa-arrow-right"></i></div>
                
                <div class="flex-1 bg-white p-6 rounded-xl border border-gray-100 shadow-sm flex flex-col items-center text-center">
                    <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mb-4"><i class="fa-solid fa-shield-check"></i></div>
                    <h5 class="text-sm font-bold text-gray-900 mb-2">Terima Pembayaran</h5>
                    <p class="text-xs text-gray-500">Pelanggan melakukan pembayaran.</p>
                </div>
                <div class="text-gray-300 hidden md:block"><i class="fa-solid fa-arrow-right"></i></div>

                <div class="flex-1 bg-white p-6 rounded-xl border border-gray-100 shadow-sm flex flex-col items-center text-center">
                    <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mb-4"><i class="fa-regular fa-bell"></i></div>
                    <h5 class="text-sm font-bold text-gray-900 mb-2">Notifikasi Webhook</h5>
                    <p class="text-xs text-gray-500">Kami kirim update status transaksi ke server Anda.</p>
                </div>
                <div class="text-gray-300 hidden md:block"><i class="fa-solid fa-arrow-right"></i></div>

                <div class="flex-1 bg-white p-6 rounded-xl border border-gray-100 shadow-sm flex flex-col items-center text-center">
                    <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mb-4"><i class="fa-regular fa-circle-check"></i></div>
                    <h5 class="text-sm font-bold text-gray-900 mb-2">Cek Status</h5>
                    <p class="text-xs text-gray-500">Verifikasi status transaksi melalui API.</p>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Endpoints & SDK -->
<div class="py-20 bg-gray-50/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <!-- Endpoints -->
            <div>
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Endpoint Populer</h3>
                <div class="bg-white rounded-xl border border-gray-100 overflow-hidden shadow-sm">
                    <div class="divide-y divide-gray-100">
                        <a href="#" class="flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center gap-4">
                                <span class="px-2 py-1 bg-blue-50 text-blue-600 font-bold text-[10px] rounded uppercase">POST</span>
                                <span class="text-sm font-mono text-gray-900">/v1/payment</span>
                            </div>
                            <span class="text-sm text-gray-500">Buat transaksi pembayaran <i class="fa-solid fa-chevron-right ml-2 text-xs text-gray-300"></i></span>
                        </a>
                        <a href="#" class="flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center gap-4">
                                <span class="px-2 py-1 bg-emerald-50 text-emerald-600 font-bold text-[10px] rounded uppercase">GET</span>
                                <span class="text-sm font-mono text-gray-900">/v1/payment/{id}</span>
                            </div>
                            <span class="text-sm text-gray-500">Cek detail transaksi <i class="fa-solid fa-chevron-right ml-2 text-xs text-gray-300"></i></span>
                        </a>
                        <a href="#" class="flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center gap-4">
                                <span class="px-2 py-1 bg-emerald-50 text-emerald-600 font-bold text-[10px] rounded uppercase">GET</span>
                                <span class="text-sm font-mono text-gray-900">/v1/payment/{id}/status</span>
                            </div>
                            <span class="text-sm text-gray-500">Cek status transaksi <i class="fa-solid fa-chevron-right ml-2 text-xs text-gray-300"></i></span>
                        </a>
                        <a href="#" class="flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center gap-4">
                                <span class="px-2 py-1 bg-blue-50 text-blue-600 font-bold text-[10px] rounded uppercase">POST</span>
                                <span class="text-sm font-mono text-gray-900">/v1/refund</span>
                            </div>
                            <span class="text-sm text-gray-500">Buat permintaan refund <i class="fa-solid fa-chevron-right ml-2 text-xs text-gray-300"></i></span>
                        </a>
                        <a href="#" class="flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center gap-4">
                                <span class="px-2 py-1 bg-emerald-50 text-emerald-600 font-bold text-[10px] rounded uppercase">GET</span>
                                <span class="text-sm font-mono text-gray-900">/v1/merchant/balance</span>
                            </div>
                            <span class="text-sm text-gray-500">Cek saldo merchant <i class="fa-solid fa-chevron-right ml-2 text-xs text-gray-300"></i></span>
                        </a>
                        <a href="#" class="flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center gap-4">
                                <span class="px-2 py-1 bg-blue-50 text-blue-600 font-bold text-[10px] rounded uppercase">POST</span>
                                <span class="text-sm font-mono text-gray-900">/v1/webhook/simulate</span>
                            </div>
                            <span class="text-sm text-gray-500">Simulasi webhook <i class="fa-solid fa-chevron-right ml-2 text-xs text-gray-300"></i></span>
                        </a>
                    </div>
                    <div class="p-4 bg-gray-50 border-t border-gray-100">
                        <a href="#" class="text-sm font-bold text-blue-600 hover:text-blue-700">Lihat semua endpoint <i class="fa-solid fa-arrow-right ml-1"></i></a>
                    </div>
                </div>
            </div>

            <!-- SDK -->
            <div>
                <h3 class="text-2xl font-bold text-gray-900 mb-6">SDK & Library</h3>
                <div class="bg-white rounded-xl border border-gray-100 overflow-hidden shadow-sm flex flex-col h-[calc(100%-2rem)]">
                    <div class="flex border-b border-gray-100 overflow-x-auto">
                        <button class="px-6 py-4 text-sm font-bold text-blue-600 border-b-2 border-blue-600 flex items-center gap-2"><i class="fa-brands fa-php text-lg"></i> PHP</button>
                        <button class="px-6 py-4 text-sm font-semibold text-gray-500 hover:text-gray-900 flex items-center gap-2"><i class="fa-brands fa-node-js text-lg text-green-600"></i> Node.js</button>
                        <button class="px-6 py-4 text-sm font-semibold text-gray-500 hover:text-gray-900 flex items-center gap-2"><i class="fa-brands fa-python text-lg text-blue-800"></i> Python</button>
                        <button class="px-6 py-4 text-sm font-semibold text-gray-500 hover:text-gray-900 flex items-center gap-2">Go</button>
                    </div>
                    
                    <div class="p-6 flex-1 bg-gray-50/50">
                        <div class="bg-white border border-gray-200 rounded-lg p-3 flex justify-between items-center mb-6 shadow-sm">
                            <code class="text-sm font-mono text-gray-700">composer require kathapayment/kathapayment-php</code>
                            <button class="text-gray-400 hover:text-gray-600"><i class="fa-regular fa-copy"></i></button>
                        </div>
                        
                        <div class="relative">
                            <div class="flex justify-between items-center mb-2">
                                <p class="text-sm font-bold text-gray-900">Contoh Penggunaan</p>
                                <button class="text-xs font-semibold px-2 py-1 bg-white border border-gray-200 rounded text-gray-600 hover:bg-gray-50"><i class="fa-regular fa-copy mr-1"></i> Salin</button>
                            </div>
                            <pre class="bg-white border border-gray-200 rounded-lg p-4 text-xs font-mono text-gray-800 overflow-x-auto shadow-sm">
<span class="text-rose-500">use</span> KathaPayment\Client;

<span class="text-blue-500">$client</span> = <span class="text-rose-500">new</span> Client(<span class="text-green-600">'YOUR_API_KEY'</span>);

<span class="text-blue-500">$payment</span> = <span class="text-blue-500">$client</span>->createPayment([
    <span class="text-green-600">'order_id'</span> => <span class="text-green-600">'INV-20240520-0001'</span>,
    <span class="text-green-600">'amount'</span>   => <span class="text-amber-600">100000</span>,
    <span class="text-green-600">'customer'</span> => [
        <span class="text-green-600">'name'</span>  => <span class="text-green-600">'John Doe'</span>,
        <span class="text-green-600">'email'</span> => <span class="text-green-600">'john@example.com'</span>,
        <span class="text-green-600">'phone'</span> => <span class="text-green-600">'081234567890'</span>
    ],
    <span class="text-green-600">'return_url'</span> => <span class="text-green-600">'https://yourdomain.com/thank-you'</span>,
    <span class="text-green-600">'notification_url'</span> => <span class="text-green-600">'https://yourdomain.com/webhook'</span>
]);</pre>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Resources -->
<div class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900">Resource untuk Developer</h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white border border-gray-100 p-6 rounded-2xl shadow-sm hover:shadow-md transition-shadow">
                <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center mb-4"><i class="fa-regular fa-file-lines"></i></div>
                <h4 class="font-bold text-gray-900 mb-2">Dokumentasi API</h4>
                <p class="text-sm text-gray-500 mb-4 h-10">Panduan lengkap penggunaan API KathaPayment.</p>
                <a href="<?= base_url('dokumentasi') ?>" class="text-sm font-bold text-blue-600 hover:text-blue-700">Baca Dokumentasi <i class="fa-solid fa-arrow-right ml-1"></i></a>
            </div>
            <div class="bg-white border border-gray-100 p-6 rounded-2xl shadow-sm hover:shadow-md transition-shadow">
                <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center mb-4"><i class="fa-solid fa-gear"></i></div>
                <h4 class="font-bold text-gray-900 mb-2">API Reference</h4>
                <p class="text-sm text-gray-500 mb-4 h-10">Detail semua endpoint, parameter, dan response.</p>
                <a href="#" class="text-sm font-bold text-blue-600 hover:text-blue-700">Lihat Reference <i class="fa-solid fa-arrow-right ml-1"></i></a>
            </div>
            <div class="bg-white border border-gray-100 p-6 rounded-2xl shadow-sm hover:shadow-md transition-shadow">
                <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center mb-4"><i class="fa-solid fa-cubes"></i></div>
                <h4 class="font-bold text-gray-900 mb-2">SDK & Library</h4>
                <p class="text-sm text-gray-500 mb-4 h-10">Library resmi untuk memudahkan integrasi.</p>
                <a href="#" class="text-sm font-bold text-blue-600 hover:text-blue-700">Lihat SDK <i class="fa-solid fa-arrow-right ml-1"></i></a>
            </div>
            <div class="bg-white border border-gray-100 p-6 rounded-2xl shadow-sm hover:shadow-md transition-shadow">
                <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center mb-4"><i class="fa-solid fa-clock-rotate-left"></i></div>
                <h4 class="font-bold text-gray-900 mb-2">Changelog</h4>
                <p class="text-sm text-gray-500 mb-4 h-10">Update terbaru, fitur baru, dan perbaikan.</p>
                <a href="#" class="text-sm font-bold text-blue-600 hover:text-blue-700">Lihat Changelog <i class="fa-solid fa-arrow-right ml-1"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="py-12 bg-white pb-24">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gray-50 rounded-2xl p-8 md:p-12 flex flex-col md:flex-row items-center justify-between border border-gray-100">
            <div class="flex items-center gap-6 mb-6 md:mb-0">
                <div class="w-20 h-20 bg-blue-600 rounded-xl hidden md:flex shrink-0 items-center justify-center text-white text-3xl shadow-lg">
                    <i class="fa-solid fa-code"></i>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Siap mengintegrasikan pembayaran ke aplikasi Anda?</h3>
                    <p class="text-gray-600">Mulai integrasi sekarang dan berikan pengalaman pembayaran terbaik untuk pelanggan Anda.</p>
                </div>
            </div>
            <div class="flex gap-4 shrink-0">
                <a href="<?= base_url('register') ?>" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors shadow-md">
                    Dapatkan API Key
                </a>
                <a href="#" class="px-6 py-3 bg-white text-blue-600 border border-blue-200 font-semibold rounded-lg hover:bg-blue-50 transition-colors">
                    Hubungi Developer Support
                </a>
            </div>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean(); 
include BASE_PATH . '/app/views/layouts/public.php'; 
?>
