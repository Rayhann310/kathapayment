<?php ob_start(); ?>

<div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <h2 class="text-2xl font-extrabold text-gray-900 tracking-tight flex items-center gap-2">
            <i class="fa-solid fa-shield-halved text-blue-600"></i> Risk Analysis
        </h2>
        <p class="text-sm text-gray-500 mt-1">Sistem deteksi penipuan (Fraud Detection) bertenaga AI untuk mengamankan pendapatan Anda.</p>
    </div>
    <div class="flex items-center gap-4 bg-white p-2 rounded-xl border border-gray-200 shadow-sm">
        <div class="pl-2 pr-1">
            <p class="text-xs font-bold text-gray-900">Strict Mode</p>
            <p class="text-[10px] text-gray-500">Blokir otomatis risiko medium</p>
        </div>
        <label class="relative inline-flex items-center cursor-pointer mr-2">
            <input type="checkbox" class="sr-only peer">
            <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-600"></div>
        </label>
    </div>
</div>

<!-- Stats (Mock Data for Premium UI Feel) -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center justify-between relative overflow-hidden">
        <div class="absolute -right-4 -top-4 text-red-50 opacity-50">
            <i class="fa-solid fa-ban text-9xl"></i>
        </div>
        <div class="relative z-10">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Fraud Blocked</p>
            <h3 class="text-2xl font-extrabold text-gray-900">Rp 12.500.000</h3>
            <div class="text-xs font-semibold text-red-500 mt-2 flex items-center gap-1">
                <i class="fa-solid fa-shield-virus"></i> 14 transaksi diblokir bulan ini
            </div>
        </div>
        <div class="w-12 h-12 bg-red-50 text-red-600 rounded-xl flex items-center justify-center text-xl relative z-10">
            <i class="fa-solid fa-hand"></i>
        </div>
    </div>
    
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center justify-between relative overflow-hidden">
        <div class="absolute -right-4 -bottom-4 text-yellow-50 opacity-50">
            <i class="fa-solid fa-triangle-exclamation text-9xl"></i>
        </div>
        <div class="relative z-10">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Suspicious (Need Review)</p>
            <h3 class="text-2xl font-extrabold text-gray-900">3</h3>
            <div class="text-xs font-semibold text-yellow-600 mt-2 flex items-center gap-1">
                <i class="fa-solid fa-eye"></i> Tertahan di sistem
            </div>
        </div>
        <div class="w-12 h-12 bg-yellow-50 text-yellow-600 rounded-xl flex items-center justify-center text-xl relative z-10">
            <i class="fa-solid fa-user-secret"></i>
        </div>
    </div>
    
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center justify-between relative overflow-hidden">
        <div class="absolute -right-4 -bottom-4 text-green-50 opacity-50">
            <i class="fa-solid fa-scale-balanced text-9xl"></i>
        </div>
        <div class="relative z-10">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Global Dispute Rate</p>
            <h3 class="text-2xl font-extrabold text-gray-900">0.02%</h3>
            <div class="text-xs font-semibold text-green-600 mt-2 flex items-center gap-1">
                <i class="fa-solid fa-check"></i> Akun Anda Sangat Aman
            </div>
        </div>
        <div class="w-12 h-12 bg-green-50 text-green-600 rounded-xl flex items-center justify-center text-xl relative z-10">
            <i class="fa-solid fa-thumbs-up"></i>
        </div>
    </div>
</div>

<!-- Tabs -->
<div class="border-b border-gray-200 mb-6">
    <nav class="-mb-px flex gap-6">
        <a href="#" class="border-b-2 border-blue-600 text-blue-600 font-bold py-3 px-1 text-sm">Flagged Transactions</a>
        <a href="#" class="border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium py-3 px-1 text-sm transition-colors">Blocked</a>
        <a href="#" class="border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium py-3 px-1 text-sm transition-colors">Custom Rules</a>
    </nav>
</div>

<!-- Table Container -->
<div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm mb-6">
    <div class="p-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <form action="" method="GET" class="relative w-full sm:w-80">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
            </div>
            <input type="text" name="search" value="" class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2" placeholder="Search Trx ID, IP Address...">
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
                    <th scope="col" class="px-6 py-4 font-bold tracking-wider">Transaction</th>
                    <th scope="col" class="px-6 py-4 font-bold tracking-wider">Amount</th>
                    <th scope="col" class="px-6 py-4 font-bold tracking-wider">Risk Score</th>
                    <th scope="col" class="px-6 py-4 font-bold tracking-wider">Detected Patterns</th>
                    <th scope="col" class="px-6 py-4 font-bold tracking-wider text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                
                <tr class="hover:bg-gray-50/50 transition-colors group">
                    <td class="px-6 py-4">
                        <div class="font-bold text-gray-900 hover:text-blue-600 cursor-pointer">PAY-99X8F1</div>
                        <div class="text-[11px] text-gray-500 mt-0.5">john.doe.fake@gmail.com</div>
                        <div class="text-[10px] text-gray-400 font-mono mt-1">IP: 185.193.12.4 (Russia)</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-bold text-gray-900">Rp 4.500.000</div>
                        <div class="text-[11px] text-gray-500">Credit Card</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-red-100 text-red-700 text-[11px] font-bold px-2.5 py-1 rounded-full border border-red-200 flex items-center gap-1.5 w-max">
                            <i class="fa-solid fa-skull"></i> 98 (High Risk)
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-col gap-1">
                            <span class="text-[10px] bg-gray-100 text-gray-600 px-2 py-0.5 rounded w-max">IP Mismatch (Country)</span>
                            <span class="text-[10px] bg-gray-100 text-gray-600 px-2 py-0.5 rounded w-max">7 Failed Attempts</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="text-red-600 hover:text-red-800 font-semibold text-xs bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-lg transition-colors border border-red-200">
                                Block
                            </button>
                            <button class="text-gray-600 hover:text-gray-900 font-semibold text-xs bg-gray-50 hover:bg-gray-100 px-3 py-1.5 rounded-lg transition-colors border border-gray-200">
                                Review
                            </button>
                        </div>
                    </td>
                </tr>

                <tr class="hover:bg-gray-50/50 transition-colors group">
                    <td class="px-6 py-4">
                        <div class="font-bold text-gray-900 hover:text-blue-600 cursor-pointer">PAY-22B1C9</div>
                        <div class="text-[11px] text-gray-500 mt-0.5">m.siregar@office.co.id</div>
                        <div class="text-[10px] text-gray-400 font-mono mt-1">IP: 103.11.23.5 (Jakarta)</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-bold text-gray-900">Rp 12.000.000</div>
                        <div class="text-[11px] text-gray-500">Virtual Account</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-yellow-100 text-yellow-700 text-[11px] font-bold px-2.5 py-1 rounded-full border border-yellow-200 flex items-center gap-1.5 w-max">
                            <i class="fa-solid fa-triangle-exclamation"></i> 65 (Medium Risk)
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-col gap-1">
                            <span class="text-[10px] bg-gray-100 text-gray-600 px-2 py-0.5 rounded w-max">Unusually Large Amount</span>
                            <span class="text-[10px] bg-gray-100 text-gray-600 px-2 py-0.5 rounded w-max">New Device</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="text-green-600 hover:text-green-800 font-semibold text-xs bg-green-50 hover:bg-green-100 px-3 py-1.5 rounded-lg transition-colors border border-green-200">
                                Release
                            </button>
                            <button class="text-gray-600 hover:text-gray-900 font-semibold text-xs bg-gray-50 hover:bg-gray-100 px-3 py-1.5 rounded-lg transition-colors border border-gray-200">
                                Review
                            </button>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

<?php 
$content = ob_get_clean(); 
require BASE_PATH . '/app/views/layouts/main.php'; 
?>
