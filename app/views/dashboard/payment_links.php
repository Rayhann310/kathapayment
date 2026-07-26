<?php ob_start(); ?>

<div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <h2 class="text-2xl font-extrabold text-gray-900 tracking-tight">Payment Links</h2>
        <p class="text-sm text-gray-500 mt-1">Buat dan kelola link pembayaran statis untuk produk atau layanan Anda.</p>
    </div>
    <div class="flex items-center gap-3">
        <button class="bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 font-semibold py-2 px-4 rounded-xl shadow-sm text-sm transition-all flex items-center gap-2">
            <i class="fa-solid fa-download"></i> Export
        </button>
        <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-xl shadow-sm shadow-blue-600/20 text-sm transition-all flex items-center gap-2">
            <i class="fa-solid fa-plus"></i> Create Link
        </button>
    </div>
</div>

<!-- Stats -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Active Links</p>
            <h3 class="text-2xl font-extrabold text-gray-900">12</h3>
            <div class="text-xs font-semibold text-green-600 mt-2 flex items-center gap-1">
                <i class="fa-solid fa-arrow-trend-up"></i> +2 this week
            </div>
        </div>
        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center text-xl">
            <i class="fa-solid fa-link"></i>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Total Revenue</p>
            <h3 class="text-2xl font-extrabold text-gray-900">Rp 12.450.000</h3>
            <div class="text-xs font-semibold text-green-600 mt-2 flex items-center gap-1">
                <i class="fa-solid fa-arrow-trend-up"></i> +15.2% vs last month
            </div>
        </div>
        <div class="w-12 h-12 bg-green-50 text-green-600 rounded-xl flex items-center justify-center text-xl">
            <i class="fa-solid fa-money-bill-wave"></i>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Total Transactions</p>
            <h3 class="text-2xl font-extrabold text-gray-900">143</h3>
            <div class="text-xs font-semibold text-gray-500 mt-2 flex items-center gap-1">
                From all active links
            </div>
        </div>
        <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-xl flex items-center justify-center text-xl">
            <i class="fa-solid fa-bolt"></i>
        </div>
    </div>
</div>

<!-- Tabs -->
<div class="border-b border-gray-200 mb-6">
    <nav class="-mb-px flex gap-6">
        <a href="#" class="border-b-2 border-blue-600 text-blue-600 font-bold py-3 px-1 text-sm">All Links (15)</a>
        <a href="#" class="border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium py-3 px-1 text-sm transition-colors">Active (12)</a>
        <a href="#" class="border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium py-3 px-1 text-sm transition-colors">Inactive (3)</a>
    </nav>
</div>

<!-- Table / List -->
<div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm">
    <div class="p-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="relative w-full sm:w-72">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
            </div>
            <input type="text" class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2" placeholder="Search link name...">
        </div>
        <button class="text-gray-500 hover:text-gray-700 font-medium text-sm flex items-center gap-2">
            <i class="fa-solid fa-filter"></i> Filter
        </button>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-400 uppercase bg-gray-50/50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-bold tracking-wider">Product Name</th>
                    <th scope="col" class="px-6 py-4 font-bold tracking-wider">Price</th>
                    <th scope="col" class="px-6 py-4 font-bold tracking-wider">Sales</th>
                    <th scope="col" class="px-6 py-4 font-bold tracking-wider">Status</th>
                    <th scope="col" class="px-6 py-4 font-bold tracking-wider text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <!-- Row 1 -->
                <tr class="hover:bg-gray-50/50 transition-colors group">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center shrink-0">
                                <i class="fa-solid fa-book-open text-lg"></i>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900">E-Book Masterclass Digital Marketing</div>
                                <div class="text-[11px] text-gray-500 mt-0.5 flex items-center gap-2">
                                    <span class="truncate max-w-[200px] text-blue-600 hover:underline cursor-pointer">pay.katha.id/l/ebook-masterclass</span>
                                    <button class="hover:text-blue-600 transition-colors" title="Copy Link"><i class="fa-regular fa-copy"></i></button>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-bold text-gray-900">Rp 150.000</div>
                        <div class="text-[11px] text-gray-500">One-time</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-bold text-gray-900">24</div>
                        <div class="text-[11px] text-gray-500">Rp 3.600.000 total</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-green-100 text-green-700 text-xs font-bold px-2.5 py-1 rounded-full border border-green-200">Active</span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <button class="text-gray-400 hover:text-gray-900 p-2 opacity-0 group-hover:opacity-100 transition-opacity"><i class="fa-solid fa-pen"></i></button>
                        <button class="text-gray-400 hover:text-gray-900 p-2 opacity-0 group-hover:opacity-100 transition-opacity"><i class="fa-solid fa-share-nodes"></i></button>
                        <button class="text-gray-400 hover:text-gray-900 p-2"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                    </td>
                </tr>
                
                <!-- Row 2 -->
                <tr class="hover:bg-gray-50/50 transition-colors group">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-orange-50 text-orange-600 flex items-center justify-center shrink-0">
                                <i class="fa-solid fa-video text-lg"></i>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900">Konsultasi Bisnis 1-on-1 (60 Menit)</div>
                                <div class="text-[11px] text-gray-500 mt-0.5 flex items-center gap-2">
                                    <span class="truncate max-w-[200px] text-blue-600 hover:underline cursor-pointer">pay.katha.id/l/konsultasi-bisnis</span>
                                    <button class="hover:text-blue-600 transition-colors" title="Copy Link"><i class="fa-regular fa-copy"></i></button>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-bold text-gray-900">Rp 500.000</div>
                        <div class="text-[11px] text-gray-500">One-time</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-bold text-gray-900">5</div>
                        <div class="text-[11px] text-gray-500">Rp 2.500.000 total</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-green-100 text-green-700 text-xs font-bold px-2.5 py-1 rounded-full border border-green-200">Active</span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <button class="text-gray-400 hover:text-gray-900 p-2 opacity-0 group-hover:opacity-100 transition-opacity"><i class="fa-solid fa-pen"></i></button>
                        <button class="text-gray-400 hover:text-gray-900 p-2 opacity-0 group-hover:opacity-100 transition-opacity"><i class="fa-solid fa-share-nodes"></i></button>
                        <button class="text-gray-400 hover:text-gray-900 p-2"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                    </td>
                </tr>

                <!-- Row 3 -->
                <tr class="hover:bg-gray-50/50 transition-colors group">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-gray-100 text-gray-500 flex items-center justify-center shrink-0">
                                <i class="fa-solid fa-ticket text-lg"></i>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900">Tiket Webinar: Strategi Q3 2026</div>
                                <div class="text-[11px] text-gray-500 mt-0.5 flex items-center gap-2">
                                    <span class="truncate max-w-[200px] text-gray-500">pay.katha.id/l/webinar-q3</span>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-bold text-gray-900">Rp 75.000</div>
                        <div class="text-[11px] text-gray-500">One-time</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-bold text-gray-900">102</div>
                        <div class="text-[11px] text-gray-500">Rp 7.650.000 total</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-gray-100 text-gray-600 text-xs font-bold px-2.5 py-1 rounded-full border border-gray-200">Inactive</span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <button class="text-gray-400 hover:text-gray-900 p-2"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="p-4 border-t border-gray-100 flex items-center justify-between">
        <span class="text-sm text-gray-500">Showing <span class="font-bold text-gray-900">1-3</span> of <span class="font-bold text-gray-900">15</span> links</span>
        <div class="flex gap-1">
            <button class="p-2 border border-gray-200 rounded-lg text-gray-400 cursor-not-allowed bg-gray-50"><i class="fa-solid fa-chevron-left text-xs"></i></button>
            <button class="p-2 border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-50"><i class="fa-solid fa-chevron-right text-xs"></i></button>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require BASE_PATH . '/app/views/layouts/main.php';
?>
