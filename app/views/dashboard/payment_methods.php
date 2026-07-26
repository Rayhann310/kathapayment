<?php ob_start(); ?>

<div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <h2 class="text-2xl font-extrabold text-gray-900 tracking-tight">Payment Methods</h2>
        <p class="text-sm text-gray-500 mt-1">Aktifkan atau nonaktifkan saluran pembayaran yang tersedia untuk pelanggan Anda.</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- E-Wallets & QRIS -->
    <div class="col-span-1 lg:col-span-1">
        <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
            <i class="fa-solid fa-qrcode text-blue-600"></i> E-Wallets & QRIS
        </h3>
        <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm">
            <div class="divide-y divide-gray-100">
                <!-- QRIS -->
                <div class="p-5 flex items-center justify-between hover:bg-gray-50/50 transition-colors">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl border border-gray-100 flex items-center justify-center p-2 text-2xl">
                            <i class="fa-solid fa-qrcode"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">QRIS</h4>
                            <p class="text-xs text-gray-500 mt-0.5">Biaya: 0.7% per transaksi</p>
                        </div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" checked class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>
                <!-- GoPay -->
                <div class="p-5 flex items-center justify-between hover:bg-gray-50/50 transition-colors">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-green-50 text-green-600 rounded-xl border border-gray-100 flex items-center justify-center p-2 text-xl">
                            <i class="fa-solid fa-wallet"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">GoPay</h4>
                            <p class="text-xs text-gray-500 mt-0.5">Biaya: 2% per transaksi</p>
                        </div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" checked class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>
                <!-- OVO -->
                <div class="p-5 flex items-center justify-between hover:bg-gray-50/50 transition-colors">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-xl border border-gray-100 flex items-center justify-center p-2 text-2xl">
                            <i class="fa-solid fa-mobile-screen"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">OVO</h4>
                            <p class="text-xs text-gray-500 mt-0.5">Biaya: 1.5% per transaksi</p>
                        </div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!-- Virtual Accounts -->
    <div class="col-span-1 lg:col-span-1">
        <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
            <i class="fa-solid fa-building-columns text-green-600"></i> Virtual Accounts
        </h3>
        <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm">
            <div class="divide-y divide-gray-100">
                <!-- BCA -->
                <div class="p-5 flex items-center justify-between hover:bg-gray-50/50 transition-colors">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-blue-50 text-blue-800 rounded-xl border border-gray-100 flex items-center justify-center p-2 text-xl font-bold">
                            BCA
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">BCA VA</h4>
                            <p class="text-xs text-gray-500 mt-0.5">Biaya: Rp 4.000 / trx</p>
                        </div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" checked class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600"></div>
                    </label>
                </div>
                <!-- Mandiri -->
                <div class="p-5 flex items-center justify-between hover:bg-gray-50/50 transition-colors">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-yellow-50 text-yellow-600 rounded-xl border border-gray-100 flex items-center justify-center p-2 text-xl font-bold">
                            BMRI
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Mandiri VA</h4>
                            <p class="text-xs text-gray-500 mt-0.5">Biaya: Rp 4.000 / trx</p>
                        </div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" checked class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600"></div>
                    </label>
                </div>
                <!-- BNI -->
                <div class="p-5 flex items-center justify-between hover:bg-gray-50/50 transition-colors">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-orange-50 text-orange-600 rounded-xl border border-gray-100 flex items-center justify-center p-2 text-xl font-bold">
                            BNI
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">BNI VA</h4>
                            <p class="text-xs text-gray-500 mt-0.5">Biaya: Rp 4.000 / trx</p>
                        </div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" checked class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600"></div>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!-- Retail Outlets -->
    <div class="col-span-1 lg:col-span-1">
        <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
            <i class="fa-solid fa-store text-orange-600"></i> Retail Outlets
        </h3>
        <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm">
            <div class="divide-y divide-gray-100">
                <!-- Alfamart -->
                <div class="p-5 flex items-center justify-between hover:bg-gray-50/50 transition-colors">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-red-50 text-red-600 rounded-xl border border-gray-100 flex items-center justify-center p-2 text-2xl">
                            <i class="fa-solid fa-shop"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Alfamart</h4>
                            <p class="text-xs text-gray-500 mt-0.5">Biaya: Rp 5.000 / trx</p>
                        </div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-600"></div>
                    </label>
                </div>
                <!-- Indomaret -->
                <div class="p-5 flex items-center justify-between hover:bg-gray-50/50 transition-colors">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl border border-gray-100 flex items-center justify-center p-2 text-2xl">
                            <i class="fa-solid fa-store"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Indomaret</h4>
                            <p class="text-xs text-gray-500 mt-0.5">Biaya: Rp 5.000 / trx</p>
                        </div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" checked class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-600"></div>
                    </label>
                </div>
            </div>
        </div>
        
        <div class="mt-6 bg-blue-50 border border-blue-100 rounded-xl p-4 flex gap-3 text-sm text-blue-800">
            <i class="fa-solid fa-circle-info text-blue-600 mt-0.5"></i>
            <div>
                Perubahan pada metode pembayaran akan otomatis diterapkan pada halaman *Checkout* Anda. Tidak diperlukan modifikasi *code*.
            </div>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean(); 
require BASE_PATH . '/app/views/layouts/main.php'; 
?>
