<?php ob_start(); ?>

<div class="pt-20 bg-white min-h-screen flex flex-col md:flex-row">
    <!-- Sidebar -->
    <aside class="w-full md:w-64 lg:w-72 border-r border-gray-100 bg-gray-50/30 flex-shrink-0 md:h-[calc(100vh-5rem)] md:sticky md:top-20 overflow-y-auto hidden md:block">
        <div class="p-6">
            <div class="mb-8">
                <h4 class="text-xs font-bold text-gray-400 tracking-widest uppercase mb-3">DOKUMENTASI</h4>
                <div class="space-y-1">
                    <a href="#" class="block px-3 py-2 text-sm font-semibold bg-blue-50 text-blue-600 rounded-lg">Pengantar</a>
                    <a href="#" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors">Konsep Dasar</a>
                    <a href="#" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors">Autentikasi</a>
                    <a href="#" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors">Error Handling</a>
                </div>
            </div>
            
            <div class="mb-8">
                <h4 class="text-xs font-bold text-gray-400 tracking-widest uppercase mb-3">MEMULAI</h4>
                <div class="space-y-1">
                    <a href="#" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors">Quick Start</a>
                    <a href="#" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors">Mode Sandbox</a>
                    <a href="#" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors">Go Live</a>
                </div>
            </div>

            <div class="mb-8">
                <h4 class="text-xs font-bold text-gray-400 tracking-widest uppercase mb-3">PEMBAYARAN</h4>
                <div class="space-y-1">
                    <a href="#" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors flex items-center justify-between">QRIS <span class="text-[10px] bg-blue-100 text-blue-600 px-1.5 py-0.5 rounded">Populer</span></a>
                    <a href="#" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors">Virtual Account</a>
                    <a href="#" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors">E-Wallet</a>
                    <a href="#" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors">Retail Outlet</a>
                </div>
            </div>

            <div class="mb-8">
                <h4 class="text-xs font-bold text-gray-400 tracking-widest uppercase mb-3">WEBHOOK</h4>
                <div class="space-y-1">
                    <a href="#" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors">Setup Webhook</a>
                    <a href="#" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors">Keamanan Tanda Tangan</a>
                    <a href="#" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors">Best Practices</a>
                </div>
            </div>
            
            <div class="mb-8">
                <h4 class="text-xs font-bold text-gray-400 tracking-widest uppercase mb-3">INTEGRASI</h4>
                <div class="space-y-1">
                    <a href="#" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors">PHP / Laravel</a>
                    <a href="#" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors">Node.js</a>
                    <a href="#" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors">WordPress Plugin</a>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 max-w-4xl px-4 sm:px-6 lg:px-12 py-10">
        
        <!-- Breadcrumb -->
        <nav class="flex text-sm text-gray-500 mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-2">
                <li><a href="#" class="hover:text-blue-600">Dokumentasi</a></li>
                <li><span class="mx-1">/</span></li>
                <li class="text-gray-900 font-medium">Pengantar</li>
            </ol>
        </nav>

        <h1 class="text-3xl font-extrabold text-gray-900 mb-6">Pengantar KathaPayment</h1>
        
        <p class="text-lg text-gray-600 mb-8 leading-relaxed">
            Selamat datang di Dokumentasi Resmi KathaPayment API. KathaPayment adalah payment gateway modern yang memungkinkan Anda menerima pembayaran dari pelanggan Anda dengan mudah, aman, dan cepat.
        </p>

        <h2 class="text-2xl font-bold text-gray-900 mt-12 mb-4 border-b border-gray-100 pb-2">Alur Pembayaran</h2>
        <p class="text-gray-600 mb-6 leading-relaxed">
            Secara garis besar, proses pembayaran menggunakan KathaPayment sangat sederhana:
        </p>
        
        <div class="bg-gray-50 p-6 rounded-xl border border-gray-100 mb-8">
            <ol class="list-decimal list-inside space-y-4 text-gray-700">
                <li><strong class="text-gray-900">Inisiasi:</strong> Sistem Anda memanggil API KathaPayment untuk membuat transaksi baru (Payment Request).</li>
                <li><strong class="text-gray-900">Pembayaran:</strong> KathaPayment memberikan URL checkout atau kode bayar, dan pelanggan melakukan pembayaran.</li>
                <li><strong class="text-gray-900">Notifikasi:</strong> KathaPayment mengirimkan notifikasi asinkron (Webhook) ke sistem Anda saat pembayaran berhasil.</li>
                <li><strong class="text-gray-900">Selesai:</strong> Sistem Anda memperbarui status pesanan menjadi lunas berdasarkan notifikasi tersebut.</li>
            </ol>
        </div>

        <h2 class="text-2xl font-bold text-gray-900 mt-12 mb-4 border-b border-gray-100 pb-2">Base URL</h2>
        <p class="text-gray-600 mb-4 leading-relaxed">
            KathaPayment menyediakan dua lingkungan (environment): <strong class="text-gray-900">Sandbox</strong> untuk tahap pengembangan/testing, dan <strong class="text-gray-900">Production</strong> untuk transaksi sungguhan.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
            <div class="border border-gray-200 rounded-lg p-4">
                <h4 class="font-bold text-sm text-gray-900 mb-2 flex items-center"><span class="w-2 h-2 rounded-full bg-amber-500 mr-2"></span> Sandbox (Testing)</h4>
                <code class="text-xs bg-gray-100 text-pink-600 px-2 py-1 rounded">https://api.sandbox.kathapayment.id</code>
            </div>
            <div class="border border-gray-200 rounded-lg p-4 bg-emerald-50/30">
                <h4 class="font-bold text-sm text-gray-900 mb-2 flex items-center"><span class="w-2 h-2 rounded-full bg-emerald-500 mr-2"></span> Production (Live)</h4>
                <code class="text-xs bg-gray-100 text-pink-600 px-2 py-1 rounded">https://api.kathapayment.id</code>
            </div>
        </div>

        <h2 class="text-2xl font-bold text-gray-900 mt-12 mb-4 border-b border-gray-100 pb-2">Contoh Request Dasar</h2>
        <p class="text-gray-600 mb-6 leading-relaxed">
            Untuk melakukan permintaan ke API kami, Anda harus menyertakan <code class="text-xs bg-gray-100 text-pink-600 px-1 rounded">API Key</code> Anda pada header <code class="text-xs bg-gray-100 text-pink-600 px-1 rounded">Authorization: Bearer</code>.
        </p>

        <div class="bg-[#1e1e1e] rounded-xl overflow-hidden mb-8 shadow-md">
            <div class="flex items-center px-4 py-2 bg-[#2d2d2d] border-b border-[#404040]">
                <span class="text-xs font-mono text-gray-400">cURL</span>
                <div class="ml-auto flex gap-2">
                    <button class="text-gray-400 hover:text-white"><i class="fa-regular fa-copy"></i></button>
                </div>
            </div>
            <div class="p-4 overflow-x-auto text-sm font-mono text-gray-300">
<pre>
<span class="text-pink-400">curl</span> -X POST \
  <span class="text-green-400">https://api.sandbox.kathapayment.id/v1/payment</span> \
  -H <span class="text-yellow-300">'Authorization: Bearer SK_SANDBOX_YOUR_KEY'</span> \
  -H <span class="text-yellow-300">'Content-Type: application/json'</span> \
  -d <span class="text-yellow-300">'{</span>
    <span class="text-blue-300">"amount"</span>: <span class="text-purple-300">50000</span>,
    <span class="text-blue-300">"method"</span>: <span class="text-yellow-300">"QRIS"</span>
  <span class="text-yellow-300">}'</span>
</pre>
            </div>
        </div>

        <!-- Pagination -->
        <div class="flex justify-between items-center mt-16 pt-8 border-t border-gray-100">
            <div></div> <!-- Spacer -->
            <a href="#" class="flex flex-col items-end text-right group">
                <span class="text-xs text-gray-500 mb-1">Selanjutnya</span>
                <span class="text-blue-600 font-bold group-hover:text-blue-700">Konsep Dasar <i class="fa-solid fa-arrow-right ml-1"></i></span>
            </a>
        </div>

    </main>
</div>

<?php 
$content = ob_get_clean(); 
include BASE_PATH . '/app/views/layouts/public.php'; 
?>
