<?php ob_start(); ?>

<div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <h2 class="text-2xl font-extrabold text-gray-900 tracking-tight">Refunds</h2>
        <p class="text-sm text-gray-500 mt-1">Kelola dan pantau proses pengembalian dana kepada pelanggan Anda.</p>
    </div>
    <div class="flex items-center gap-3">
        <button class="bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 font-semibold py-2 px-4 rounded-xl shadow-sm text-sm transition-all flex items-center gap-2">
            <i class="fa-solid fa-download"></i> Export
        </button>
        <button onclick="document.getElementById('create-refund-modal').classList.remove('hidden')" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-xl shadow-sm shadow-blue-600/20 text-sm transition-all flex items-center gap-2">
            <i class="fa-solid fa-plus"></i> Request Refund
        </button>
    </div>
</div>

<!-- Stats (Mock Data for Premium UI Feel) -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Total Refunded</p>
            <h3 class="text-2xl font-extrabold text-gray-900">Rp 1.450.000</h3>
            <div class="text-xs font-semibold text-gray-500 mt-2 flex items-center gap-1">
                Dari 8 transaksi lunas
            </div>
        </div>
        <div class="w-12 h-12 bg-gray-50 text-gray-600 rounded-xl flex items-center justify-center text-xl">
            <i class="fa-solid fa-money-bill-transfer"></i>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Pending Requests</p>
            <h3 class="text-2xl font-extrabold text-gray-900">12</h3>
            <div class="text-xs font-semibold text-yellow-600 mt-2 flex items-center gap-1">
                Sedang diproses bank
            </div>
        </div>
        <div class="w-12 h-12 bg-yellow-50 text-yellow-600 rounded-xl flex items-center justify-center text-xl">
            <i class="fa-solid fa-hourglass-half"></i>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Avg Process Time</p>
            <h3 class="text-2xl font-extrabold text-gray-900">1-3 Hari</h3>
            <div class="text-xs font-semibold text-green-600 mt-2 flex items-center gap-1">
                Sesuai SLA Perbankan
            </div>
        </div>
        <div class="w-12 h-12 bg-green-50 text-green-600 rounded-xl flex items-center justify-center text-xl">
            <i class="fa-solid fa-bolt"></i>
        </div>
    </div>
</div>

<!-- Tabs -->
<div class="border-b border-gray-200 mb-6">
    <nav class="-mb-px flex gap-6">
        <a href="#" class="border-b-2 border-blue-600 text-blue-600 font-bold py-3 px-1 text-sm">All Refunds</a>
        <a href="#" class="border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium py-3 px-1 text-sm transition-colors">Pending</a>
        <a href="#" class="border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium py-3 px-1 text-sm transition-colors">Processed</a>
        <a href="#" class="border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium py-3 px-1 text-sm transition-colors">Rejected</a>
    </nav>
</div>

<!-- Table Container -->
<div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm mb-6">
    <div class="p-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <form action="" method="GET" class="relative w-full sm:w-80">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
            </div>
            <input type="text" name="search" value="" class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2" placeholder="Search Refund ID, Trx Ref...">
        </form>
        <button class="text-gray-500 hover:text-gray-700 font-medium text-sm flex items-center gap-2">
            <i class="fa-solid fa-filter"></i> Filter
        </button>
    </div>

    <!-- MOCKUP DATA -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-400 uppercase bg-gray-50/50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-bold tracking-wider">Refund Details</th>
                    <th scope="col" class="px-6 py-4 font-bold tracking-wider">Amount</th>
                    <th scope="col" class="px-6 py-4 font-bold tracking-wider">Reason</th>
                    <th scope="col" class="px-6 py-4 font-bold tracking-wider">Status</th>
                    <th scope="col" class="px-6 py-4 font-bold tracking-wider">Requested On</th>
                    <th scope="col" class="px-6 py-4 font-bold tracking-wider text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                
                <tr class="hover:bg-gray-50/50 transition-colors group">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-yellow-50 text-yellow-600 flex items-center justify-center shrink-0">
                                <i class="fa-solid fa-arrow-rotate-left text-lg"></i>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900 hover:text-blue-600 cursor-pointer">RFD-A8C3B192</div>
                                <div class="text-[11px] text-gray-500 mt-0.5">Trx: PAY-29F8D...</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-bold text-gray-900">Rp 150.000</div>
                        <div class="text-[11px] text-gray-500">Partial Refund</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900 truncate max-w-[150px]">
                            Double Payment
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-yellow-100 text-yellow-700 text-[11px] font-bold px-2.5 py-1 rounded-full border border-yellow-200 flex items-center gap-1.5 w-max">
                            <i class="fa-solid fa-clock"></i> Pending
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900">26 Jul 2026</div>
                        <div class="text-[11px] text-gray-500 mt-0.5">14:30:12</div>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <button class="text-gray-400 hover:text-gray-900 p-2"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                    </td>
                </tr>
                
                <tr class="hover:bg-gray-50/50 transition-colors group">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-green-50 text-green-600 flex items-center justify-center shrink-0">
                                <i class="fa-solid fa-arrow-rotate-left text-lg"></i>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900 hover:text-blue-600 cursor-pointer">RFD-99D2F441</div>
                                <div class="text-[11px] text-gray-500 mt-0.5">Trx: PAY-11A0C...</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-bold text-gray-900">Rp 500.000</div>
                        <div class="text-[11px] text-gray-500">Full Refund</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900 truncate max-w-[150px]">
                            Fraudulent Transaction
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-green-100 text-green-700 text-[11px] font-bold px-2.5 py-1 rounded-full border border-green-200 flex items-center gap-1.5 w-max">
                            <i class="fa-solid fa-check"></i> Processed
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900">20 Jul 2026</div>
                        <div class="text-[11px] text-gray-500 mt-0.5">09:15:00</div>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <button class="text-gray-400 hover:text-gray-900 p-2"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                    </td>
                </tr>

                <tr class="hover:bg-gray-50/50 transition-colors group">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-red-50 text-red-600 flex items-center justify-center shrink-0">
                                <i class="fa-solid fa-arrow-rotate-left text-lg"></i>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900 hover:text-blue-600 cursor-pointer">RFD-45B1E999</div>
                                <div class="text-[11px] text-gray-500 mt-0.5">Trx: PAY-88Z9K...</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-bold text-gray-900">Rp 75.000</div>
                        <div class="text-[11px] text-gray-500">Full Refund</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900 truncate max-w-[150px]">
                            Customer Request
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-red-100 text-red-700 text-[11px] font-bold px-2.5 py-1 rounded-full border border-red-200 flex items-center gap-1.5 w-max">
                            <i class="fa-solid fa-xmark"></i> Rejected
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900">15 Jul 2026</div>
                        <div class="text-[11px] text-gray-500 mt-0.5">18:45:22</div>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <button class="text-gray-400 hover:text-gray-900 p-2"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
    
    <div class="p-4 border-t border-gray-100 flex items-center justify-between">
        <span class="text-sm text-gray-500">Showing <span class="font-bold text-gray-900">1-3</span> of <span class="font-bold text-gray-900">3</span> refunds</span>
        <div class="flex gap-1">
            <button class="p-2 border border-gray-200 rounded-lg text-gray-300 cursor-not-allowed bg-gray-50"><i class="fa-solid fa-chevron-left text-xs"></i></button>
            <button class="p-2 border border-gray-200 rounded-lg text-gray-300 cursor-not-allowed bg-gray-50"><i class="fa-solid fa-chevron-right text-xs"></i></button>
        </div>
    </div>
</div>

<!-- Request Refund Modal -->
<div id="create-refund-modal" class="fixed inset-0 z-50 hidden bg-gray-900/50 backdrop-blur-sm overflow-y-auto overflow-x-hidden flex justify-center items-center">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <div class="relative bg-white rounded-2xl shadow-xl border border-gray-100">
            <div class="flex justify-between items-center p-5 rounded-t border-b border-gray-100">
                <h3 class="text-lg font-bold text-gray-900">Request Refund</h3>
                <button type="button" onclick="document.getElementById('create-refund-modal').classList.add('hidden')" class="text-gray-400 bg-transparent hover:bg-gray-100 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center transition-colors">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-1">Transaction Reference</label>
                        <input type="text" placeholder="e.g. PAY-12345..." class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-1">Refund Amount</label>
                        <input type="number" placeholder="Rp" class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-1">Reason for Refund</label>
                        <select class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option>Double Payment</option>
                            <option>Customer Request</option>
                            <option>Fraudulent Transaction</option>
                            <option>Item Out of Stock</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <button type="button" onclick="document.getElementById('create-refund-modal').classList.add('hidden')" class="w-full mt-4 text-white bg-blue-600 hover:bg-blue-700 font-semibold rounded-xl text-sm px-5 py-3 text-center shadow-sm shadow-blue-600/20 transition-all">
                        Submit Request
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean(); 
require BASE_PATH . '/app/views/layouts/main.php'; 
?>
