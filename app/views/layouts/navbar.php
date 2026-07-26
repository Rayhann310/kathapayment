<?php
$isMerchant = isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'merchant_owner';
$isSandbox = true;
$companyName = 'KathaPayment Merchant';
$merchantId = 'MRC-' . rand(100000, 999999);
if ($isMerchant) {
    $db = \App\Providers\Database::getInstance()->getConnection();
    $stmt = $db->prepare("SELECT is_sandbox, name, merchant_id FROM merchants WHERE user_id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $merchantData = $stmt->fetch();
    if ($merchantData) {
        $isSandbox = (bool)$merchantData['is_sandbox'];
        $companyName = $merchantData['name'] ?: 'RND Kreatif';
        $merchantId = $merchantData['merchant_id'] ?: 'MRC-102938';
    } else {
        $companyName = 'RND Kreatif';
        $merchantId = 'MRC-102938';
    }
}
$userName = $_SESSION['user_name'] ?? 'Rayhan';
$userEmail = $_SESSION['user_email'] ?? 'rayhan@email.com';
?>

<div class="fixed z-40 w-full flex flex-col top-0" x-init="$nextTick(() => navHeight = $el.offsetHeight)" @resize.window="navHeight = $el.offsetHeight">
    
    <?php if ($isMerchant && $isSandbox): ?>
    <!-- Top Sandbox Banner -->
    <div id="sandbox-banner" class="bg-[#1D4ED8] text-white flex items-center justify-between px-4 sm:px-6 py-2.5">
        <div class="flex items-center gap-3">
            <i class="fa-solid fa-flask text-white/80"></i>
            <span class="font-bold text-sm tracking-wide">Sandbox Mode</span>
            <span class="hidden sm:inline text-sm text-blue-100">Anda berada di environment sandbox. Semua transaksi adalah simulasi.</span>
        </div>
        <div class="flex items-center gap-4">
            <button class="bg-white hover:bg-blue-50 text-blue-700 text-xs font-bold py-1.5 px-4 rounded-md transition-colors">
                Switch to Production <i class="fa-solid fa-arrow-right ml-1"></i>
            </button>
            <button onclick="document.getElementById('sandbox-banner').style.display='none'" class="text-white/70 hover:text-white">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
        </div>
    </div>
    <?php endif; ?>

    <!-- Main Navbar -->
    <nav class="bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700 h-16 flex items-center w-full">
        <div class="px-3 lg:px-4 w-full flex items-center justify-between gap-4">
            
            <!-- LEFT SECTION -->
            <div class="flex items-center gap-4 shrink-0">
                <button @click="sidebarOpen = !sidebarOpen" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 transition-colors">
                    <span class="sr-only">Toggle sidebar</span>
                    <i class="fa-solid fa-bars text-lg"></i>
                </button>
                
                <a href="<?= base_url('dashboard') ?>" class="flex gap-2 items-center mr-2">
                    <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo" class="h-8" onerror="this.style.display='none'">
                    <div class="w-8 h-8 rounded-lg bg-blue-600 flex items-center justify-center shadow-lg shadow-blue-500/30" style="display: <?= file_exists(BASE_PATH.'/public/assets/images/logo.png') ? 'none' : 'flex' ?>;">
                        <i class="fa-solid fa-wallet text-xl text-white"></i>
                    </div>
                    <span class="hidden sm:block self-center text-xl font-extrabold whitespace-nowrap dark:text-white tracking-tight" style="display: <?= file_exists(BASE_PATH.'/public/assets/images/logo.png') ? 'none' : 'block' ?>;">KathaPayment</span>
                </a>

                <?php if ($isMerchant): ?>
                <div class="hidden lg:block w-px h-8 bg-gray-200 mx-2"></div>

                <!-- Merchant Selector -->
                <button id="dropdownMerchantButton" data-dropdown-toggle="dropdownMerchant" class="hidden lg:flex items-center gap-3 hover:bg-gray-50 p-1.5 pr-2 rounded-lg transition-colors text-left">
                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center text-gray-500 shrink-0 border border-gray-200">
                        <i class="fa-regular fa-building text-lg"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-1.5">
                            <span class="font-bold text-gray-900 text-sm truncate max-w-[120px]"><?= htmlspecialchars($companyName) ?></span>
                            <i class="fa-solid fa-circle-check text-green-500 text-xs"></i>
                        </div>
                        <p class="text-[11px] text-gray-500 leading-tight">Merchant ID: <?= $merchantId ?></p>
                    </div>
                    <i class="fa-solid fa-chevron-down text-gray-400 text-xs ml-1"></i>
                </button>
                
                <!-- Merchant Dropdown -->
                <div id="dropdownMerchant" class="z-50 hidden bg-white divide-y divide-gray-100 rounded-xl shadow-xl w-64 border border-gray-100">
                    <div class="px-4 py-3 text-sm text-gray-900 font-bold">
                        Switch Merchant
                    </div>
                    <ul class="py-2 text-sm text-gray-700">
                        <li>
                            <a href="#" class="flex items-center justify-between px-4 py-2 hover:bg-gray-50 bg-blue-50/50 text-blue-700">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-blue-100 text-blue-600 rounded flex items-center justify-center"><i class="fa-regular fa-building"></i></div>
                                    <div>
                                        <div class="font-bold"><?= htmlspecialchars($companyName) ?></div>
                                        <div class="text-[10px] text-blue-600/70"><?= $merchantId ?></div>
                                    </div>
                                </div>
                                <i class="fa-solid fa-check text-blue-600"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between px-4 py-2 hover:bg-gray-50 text-gray-700">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-gray-100 text-gray-500 rounded flex items-center justify-center"><i class="fa-regular fa-building"></i></div>
                                    <div>
                                        <div class="font-bold">Katha Store</div>
                                        <div class="text-[10px] text-gray-500">MRC-556677</div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between px-4 py-2 hover:bg-gray-50 text-gray-700">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-gray-100 text-gray-500 rounded flex items-center justify-center"><i class="fa-regular fa-building"></i></div>
                                    <div>
                                        <div class="font-bold">Demo Merchant</div>
                                        <div class="text-[10px] text-gray-500">MRC-889900</div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="py-2">
                        <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 font-medium">
                            <i class="fa-solid fa-plus w-5 text-gray-400"></i> Create Merchant
                        </a>
                        <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 font-medium">
                            <i class="fa-solid fa-gear w-5 text-gray-400"></i> Manage Merchant
                        </a>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <!-- CENTER SECTION (Search) -->
            <div class="flex-1 max-w-xl hidden md:block">
                <form class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
                    </div>
                    <input type="text" id="simple-search" class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2" placeholder="Search transactions, customers, invoices..." required>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <span class="text-xs font-semibold text-gray-400 bg-white border border-gray-200 rounded px-1.5 py-0.5">⌘K</span>
                    </div>
                </form>
            </div>

            <!-- RIGHT SECTION -->
            <div class="flex items-center gap-1 sm:gap-2">
                
                <?php if ($isMerchant): ?>
                <!-- Environment Switch -->
                <button id="dropdownEnvButton" data-dropdown-toggle="dropdownEnv" class="hidden xl:flex bg-gray-100 hover:bg-gray-200 rounded-full p-1 items-center gap-1 transition-colors mr-2">
                    <?php if($isSandbox): ?>
                        <div class="bg-white shadow-sm rounded-full py-1 px-3 flex items-center gap-1.5 text-blue-600 text-xs font-bold">
                            <i class="fa-solid fa-flask"></i> Sandbox
                        </div>
                        <div class="py-1 px-3 flex items-center gap-1.5 text-gray-500 text-xs font-semibold">
                            <i class="fa-solid fa-circle text-[8px] text-gray-400"></i> Production
                        </div>
                    <?php else: ?>
                        <div class="py-1 px-3 flex items-center gap-1.5 text-gray-500 text-xs font-semibold">
                            <i class="fa-solid fa-flask"></i> Sandbox
                        </div>
                        <div class="bg-white shadow-sm rounded-full py-1 px-3 flex items-center gap-1.5 text-green-600 text-xs font-bold">
                            <i class="fa-solid fa-circle text-[8px] text-green-500"></i> Production
                        </div>
                    <?php endif; ?>
                </button>

                <!-- Environment Dropdown -->
                <div id="dropdownEnv" class="z-50 hidden bg-white divide-y divide-gray-100 rounded-xl shadow-xl w-64 border border-gray-100">
                    <div class="px-4 py-3 text-sm text-gray-900 font-bold">
                        Environment
                    </div>
                    <ul class="py-2 text-sm text-gray-700 px-2 space-y-1">
                        <li>
                            <a href="#" class="flex items-start p-2 rounded-lg <?= $isSandbox ? 'bg-blue-50/50' : 'hover:bg-gray-50' ?>">
                                <div class="mt-1 w-8 text-center <?= $isSandbox ? 'text-blue-600' : 'text-gray-400' ?>"><i class="fa-solid fa-flask"></i></div>
                                <div class="flex-1">
                                    <div class="font-bold <?= $isSandbox ? 'text-blue-700' : 'text-gray-900' ?>">Sandbox</div>
                                    <div class="text-[10px] text-gray-500 leading-tight">Untuk testing dan integrasi</div>
                                </div>
                                <?php if($isSandbox): ?><i class="fa-solid fa-square-check text-blue-600 mt-1"></i><?php endif; ?>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-start p-2 rounded-lg <?= !$isSandbox ? 'bg-green-50/50' : 'hover:bg-gray-50' ?>">
                                <div class="mt-1 w-8 text-center <?= !$isSandbox ? 'text-green-600' : 'text-green-500' ?>"><i class="fa-solid fa-circle text-[8px]"></i></div>
                                <div class="flex-1">
                                    <div class="font-bold <?= !$isSandbox ? 'text-green-700' : 'text-gray-900' ?>">Production</div>
                                    <div class="text-[10px] text-gray-500 leading-tight">Untuk transaksi live</div>
                                </div>
                                <?php if(!$isSandbox): ?><i class="fa-solid fa-square-check text-green-600 mt-1"></i><?php endif; ?>
                            </a>
                        </li>
                    </ul>
                    <div class="py-2 px-2 text-center">
                        <a href="#" class="text-xs font-semibold text-blue-600 hover:underline">Pelajari perbedaan environment <i class="fa-solid fa-arrow-up-right-from-square ml-1 text-[10px]"></i></a>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Notifications -->
                <button id="dropdownNotifButton" data-dropdown-toggle="dropdownNotif" class="relative p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                    <i class="fa-regular fa-bell text-lg"></i>
                    <div class="absolute top-1.5 right-1 bg-blue-600 text-white text-[9px] font-bold px-1 rounded-full border-2 border-white">12</div>
                </button>

                <!-- Notifications Dropdown -->
                <div id="dropdownNotif" class="z-50 hidden bg-white divide-y divide-gray-100 rounded-xl shadow-xl w-80 border border-gray-100">
                    <div class="px-4 py-3 flex items-center justify-between">
                        <span class="text-sm font-bold text-gray-900">Notifications</span>
                        <a href="#" class="text-xs font-semibold text-blue-600 hover:underline">Mark all as read</a>
                    </div>
                    <ul class="py-2 divide-y divide-gray-100">
                        <li>
                            <a href="#" class="flex px-4 py-3 hover:bg-gray-50 transition-colors">
                                <div class="shrink-0 w-8 text-blue-600 mt-1"><i class="fa-solid fa-money-bill-transfer"></i></div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-sm font-bold text-gray-900">Payment received</div>
                                    <div class="text-xs text-gray-500 truncate">Transaction #INV-12345 berhasil</div>
                                </div>
                                <div class="shrink-0 text-[10px] text-gray-400">2m ago</div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex px-4 py-3 hover:bg-gray-50 transition-colors">
                                <div class="shrink-0 w-8 text-blue-600 mt-1"><i class="fa-solid fa-arrow-rotate-left"></i></div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-sm font-bold text-gray-900">Refund processed</div>
                                    <div class="text-xs text-gray-500 truncate">Refund #RFN-54321 telah berhasil</div>
                                </div>
                                <div class="shrink-0 text-[10px] text-gray-400">15m ago</div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex px-4 py-3 hover:bg-gray-50 transition-colors">
                                <div class="shrink-0 w-8 text-blue-600 mt-1"><i class="fa-solid fa-satellite-dish"></i></div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-sm font-bold text-gray-900">Webhook delivered</div>
                                    <div class="text-xs text-gray-500 truncate">invoice.payment.succeeded</div>
                                </div>
                                <div class="shrink-0 text-[10px] text-gray-400">30m ago</div>
                            </a>
                        </li>
                    </ul>
                    <div class="py-2 text-center">
                        <a href="#" class="text-xs font-semibold text-blue-600 hover:underline">View all notifications <i class="fa-solid fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

                <!-- API Status (Desktop) -->
                <a href="#" class="hidden lg:flex p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition-colors" title="API Status">
                    <i class="fa-solid fa-code text-lg"></i>
                </a>

                <!-- Language -->
                <button class="hidden lg:flex items-center gap-1.5 p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition-colors font-semibold text-sm">
                    <i class="fa-solid fa-globe text-lg"></i> EN <i class="fa-solid fa-chevron-down text-[10px] ml-0.5"></i>
                </button>

                <!-- Theme Toggle -->
                <button class="hidden lg:flex p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                    <i class="fa-regular fa-sun text-lg"></i>
                </button>

                <!-- Documentation -->
                <a href="#" class="hidden md:flex p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition-colors" title="Documentation">
                    <i class="fa-solid fa-book-open text-lg"></i>
                </a>

                <!-- Support -->
                <button id="dropdownSupportButton" data-dropdown-toggle="dropdownSupport" class="hidden md:flex p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition-colors" title="Support">
                    <i class="fa-regular fa-circle-question text-lg"></i>
                </button>

                <!-- Support Dropdown -->
                <div id="dropdownSupport" class="z-50 hidden bg-white divide-y divide-gray-100 rounded-xl shadow-xl w-64 border border-gray-100">
                    <div class="px-4 py-3 text-sm text-gray-900 font-bold">
                        Butuh bantuan?
                    </div>
                    <ul class="py-2 text-sm text-gray-700 px-2 space-y-1">
                        <li>
                            <a href="#" class="flex items-center justify-between p-2 rounded-lg hover:bg-gray-50">
                                <div class="flex items-start gap-3">
                                    <div class="mt-0.5 w-5 text-center text-blue-600"><i class="fa-solid fa-book-bookmark"></i></div>
                                    <div>
                                        <div class="font-bold text-gray-900">Help Center</div>
                                        <div class="text-[10px] text-gray-500">Pusat bantuan & FAQ</div>
                                    </div>
                                </div>
                                <i class="fa-solid fa-arrow-up-right-from-square text-[10px] text-gray-400"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between p-2 rounded-lg hover:bg-gray-50">
                                <div class="flex items-start gap-3">
                                    <div class="mt-0.5 w-5 text-center text-blue-600"><i class="fa-solid fa-headset"></i></div>
                                    <div>
                                        <div class="font-bold text-gray-900">Contact Support</div>
                                        <div class="text-[10px] text-gray-500">Kirim tiket ke tim kami</div>
                                    </div>
                                </div>
                                <i class="fa-solid fa-arrow-up-right-from-square text-[10px] text-gray-400"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between p-2 rounded-lg hover:bg-gray-50">
                                <div class="flex items-start gap-3">
                                    <div class="mt-0.5 w-5 text-center text-blue-600"><i class="fa-solid fa-signal"></i></div>
                                    <div>
                                        <div class="font-bold text-gray-900">System Status</div>
                                        <div class="text-[10px] text-gray-500">Cek status sistem</div>
                                    </div>
                                </div>
                                <i class="fa-solid fa-arrow-up-right-from-square text-[10px] text-gray-400"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="w-px h-6 bg-gray-200 mx-2 hidden md:block"></div>

                <!-- User Menu -->
                <button id="dropdownUserButton" data-dropdown-toggle="dropdownUser" class="flex items-center gap-2 hover:bg-gray-100 p-1.5 rounded-lg transition-colors text-left focus:outline-none">
                    <div class="w-8 h-8 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center font-bold text-sm">
                        <?= strtoupper(substr($userName, 0, 1)) ?>
                    </div>
                    <div class="hidden md:block">
                        <div class="font-bold text-gray-900 text-sm leading-tight"><?= htmlspecialchars($userName) ?></div>
                        <div class="text-[10px] text-gray-500 leading-tight">Owner</div>
                    </div>
                    <i class="fa-solid fa-chevron-down text-gray-400 text-[10px] ml-1 hidden md:block"></i>
                </button>
                
                <!-- User Dropdown -->
                <div id="dropdownUser" class="z-50 hidden bg-white rounded-xl shadow-xl w-64 border border-gray-100 overflow-hidden">
                    <div class="p-4 border-b border-gray-100 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center font-bold text-lg">
                                <?= strtoupper(substr($userName, 0, 1)) ?>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900 text-sm"><?= htmlspecialchars($userName) ?></div>
                                <div class="text-[10px] text-gray-500"><?= htmlspecialchars($userEmail) ?></div>
                            </div>
                        </div>
                        <span class="bg-blue-50 text-blue-600 text-[10px] font-bold px-2 py-0.5 rounded uppercase tracking-wider">Owner</span>
                    </div>
                    <ul class="py-2 text-sm text-gray-700">
                        <li><a href="<?= base_url('settings') ?>" class="flex items-center gap-3 px-4 py-2.5 hover:bg-gray-50 font-medium"><i class="fa-regular fa-user w-5 text-center text-gray-400"></i> Profile & Account</a></li>
                        <li><a href="#" class="flex items-center gap-3 px-4 py-2.5 hover:bg-gray-50 font-medium"><i class="fa-solid fa-users w-5 text-center text-gray-400"></i> Team & Members</a></li>
                        <li><a href="#" class="flex items-center gap-3 px-4 py-2.5 hover:bg-gray-50 font-medium"><i class="fa-regular fa-credit-card w-5 text-center text-gray-400"></i> Billing & Subscription</a></li>
                        <li><a href="<?= base_url('apikeys') ?>" class="flex items-center gap-3 px-4 py-2.5 hover:bg-gray-50 font-medium"><i class="fa-solid fa-code w-5 text-center text-gray-400"></i> API Keys</a></li>
                        <li><a href="<?= base_url('settings') ?>" class="flex items-center gap-3 px-4 py-2.5 hover:bg-gray-50 font-medium"><i class="fa-solid fa-gear w-5 text-center text-gray-400"></i> Settings</a></li>
                    </ul>
                    <div class="p-2 border-t border-gray-100">
                        <a href="<?= base_url('logout') ?>" class="flex items-center gap-3 px-4 py-2 text-sm font-bold text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                            <i class="fa-solid fa-arrow-right-from-bracket w-5 text-center"></i> Logout
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </nav>
</div>
