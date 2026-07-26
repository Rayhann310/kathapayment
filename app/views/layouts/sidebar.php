<?php
$isMerchant = isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'merchant_owner';
$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Helper function untuk mengecek menu aktif
if (!function_exists('isMenuActive')) {
    function isMenuActive($path, $currentPath) {
        if ($path === 'dashboard' || $path === '') {
            return preg_match('/\/dashboard$/', $currentPath) || preg_match('/\/kathapayment\/?$/', $currentPath);
        }
        return strpos($currentPath, '/' . $path) !== false;
    }
}

if (!function_exists('getMenuClass')) {
    function getMenuClass($path, $currentPath, $additionalClasses = '') {
        $active = isMenuActive($path, $currentPath);
        $base = 'flex items-center px-3 py-2.5 text-sm rounded-lg transition-colors ' . $additionalClasses;
        if ($active) {
            return $base . ' text-blue-600 bg-blue-50 font-bold';
        }
        return $base . ' text-gray-600 hover:bg-gray-50 hover:text-gray-900 font-medium';
    }
}

if (!function_exists('getIconClass')) {
    function getIconClass($path, $currentPath, $iconBase) {
        $active = isMenuActive($path, $currentPath);
        return $iconBase . ' w-5 text-center ' . ($active ? 'text-blue-600' : 'text-gray-400');
    }
}
?>
<aside id="logo-sidebar" 
       :class="{'w-64': sidebarOpen, 'w-0 hidden lg:hidden': !sidebarOpen}"
       :style="'top: ' + navHeight + 'px; height: calc(100vh - ' + navHeight + 'px)'"
       class="fixed left-0 z-30 transition-all duration-300 border-r border-gray-200 bg-white" aria-label="Sidebar">
    
    <div class="h-full flex flex-col relative overflow-hidden">
        
        <!-- Scrollable Menu -->
        <div class="flex-1 overflow-y-auto scrollbar-hide px-3 pb-10">
            
            <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'super_admin'): ?>
                <!-- SUPER ADMIN MENU -->
                <div class="mb-6 mt-4">
                    <h3 class="px-3 text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Admin</h3>
                    <ul class="space-y-1">
                        <li><a href="<?= base_url('dashboard') ?>" class="<?= getMenuClass('dashboard', $currentPath, 'gap-3') ?>"><i class="<?= getIconClass('dashboard', $currentPath, 'fa-solid fa-house') ?>"></i> Ikhtisar Sistem</a></li>
                        <li><a href="<?= base_url('admin/merchants') ?>" class="<?= getMenuClass('admin/merchants', $currentPath, 'gap-3') ?>"><i class="<?= getIconClass('admin/merchants', $currentPath, 'fa-solid fa-store') ?>"></i> Merchant</a></li>
                        <li><a href="<?= base_url('admin/users') ?>" class="<?= getMenuClass('admin/users', $currentPath, 'gap-3') ?>"><i class="<?= getIconClass('admin/users', $currentPath, 'fa-solid fa-users') ?>"></i> Pengguna</a></li>
                    </ul>
                </div>
            <?php else: ?>
                <!-- MERCHANT MENU -->
                
                <!-- UTAMA -->
                <div class="mb-6 mt-6">
                    <h3 class="px-3 text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Utama</h3>
                    <ul class="space-y-1">
                        <li>
                            <a href="<?= base_url('dashboard') ?>" class="<?= getMenuClass('dashboard', $currentPath, 'gap-3') ?>">
                                <i class="<?= getIconClass('dashboard', $currentPath, 'fa-solid fa-house') ?>"></i> Beranda
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- PEMBAYARAN -->
                <div class="mb-6">
                    <h3 class="px-3 text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Pembayaran</h3>
                    <ul class="space-y-1">
                        <li><a href="<?= base_url('payments') ?>" class="<?= getMenuClass('payments', $currentPath, 'gap-3') ?>"><i class="<?= getIconClass('payments', $currentPath, 'fa-regular fa-credit-card') ?>"></i> Transaksi</a></li>
                        <li><a href="<?= base_url('payment-links') ?>" class="<?= getMenuClass('payment-links', $currentPath, 'gap-3') ?>"><i class="<?= getIconClass('payment-links', $currentPath, 'fa-solid fa-link') ?>"></i> Tautan Pembayaran</a></li>
                        <li><a href="<?= base_url('invoices') ?>" class="<?= getMenuClass('invoices', $currentPath, 'gap-3') ?>"><i class="<?= getIconClass('invoices', $currentPath, 'fa-solid fa-file-invoice-dollar') ?>"></i> Faktur</a></li>
                        <li>
                            <a href="<?= base_url('refunds') ?>" class="<?= getMenuClass('refunds', $currentPath, 'justify-between') ?>">
                                <div class="flex items-center gap-3"><i class="<?= getIconClass('refunds', $currentPath, 'fa-solid fa-arrow-rotate-left') ?>"></i> Pengembalian Dana</div>
                                <span class="bg-blue-100 text-blue-600 text-[10px] font-bold px-2 py-0.5 rounded-full">12</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- PELANGGAN -->
                <div class="mb-6">
                    <h3 class="px-3 text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Pelanggan</h3>
                    <ul class="space-y-1">
                        <li><a href="<?= base_url('customers') ?>" class="<?= getMenuClass('customers', $currentPath, 'gap-3') ?>"><i class="<?= getIconClass('customers', $currentPath, 'fa-solid fa-users') ?>"></i> Daftar Pelanggan</a></li>
                        <li><a href="<?= base_url('payment-methods') ?>" class="<?= getMenuClass('payment-methods', $currentPath, 'gap-3') ?>"><i class="<?= getIconClass('payment-methods', $currentPath, 'fa-regular fa-credit-card') ?>"></i> Metode Pembayaran</a></li>
                        <li><a href="<?= base_url('risk-analysis') ?>" class="<?= getMenuClass('risk-analysis', $currentPath, 'gap-3') ?>"><i class="<?= getIconClass('risk-analysis', $currentPath, 'fa-solid fa-shield') ?>"></i> Analisis Risiko</a></li>
                    </ul>
                </div>

                <!-- DOMPET -->
                <div class="mb-6">
                    <h3 class="px-3 text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Dompet</h3>
                    <ul class="space-y-1">
                        <li><a href="<?= base_url('withdrawals') ?>" class="<?= getMenuClass('withdrawals', $currentPath, 'gap-3') ?>"><i class="<?= getIconClass('withdrawals', $currentPath, 'fa-solid fa-building-columns') ?>"></i> Penarikan Dana</a></li>
                    </ul>
                </div>

                <!-- PENGEMBANG -->
                <div class="mb-6">
                    <h3 class="px-3 text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Pengembang</h3>
                    <ul class="space-y-1">
                        <li><a href="<?= base_url('apikeys') ?>" class="<?= getMenuClass('apikeys', $currentPath, 'gap-3') ?>"><i class="<?= getIconClass('apikeys', $currentPath, 'fa-solid fa-key') ?>"></i> Kunci API</a></li>
                        <li><a href="<?= base_url('webhooks') ?>" class="<?= getMenuClass('webhooks', $currentPath, 'gap-3') ?>"><i class="<?= getIconClass('webhooks', $currentPath, 'fa-solid fa-satellite-dish') ?>"></i> Webhooks</a></li>
                    </ul>
                </div>

                <!-- PENGATURAN -->
                <div class="mb-2">
                    <h3 class="px-3 text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Pengaturan</h3>
                    <ul class="space-y-1">
                        <li><a href="<?= base_url('settings') ?>" class="<?= getMenuClass('settings', $currentPath, 'gap-3') ?>"><i class="<?= getIconClass('settings', $currentPath, 'fa-solid fa-gear') ?>"></i> Pengaturan Umum</a></li>
                    </ul>
                </div>

            <?php endif; ?>

            <!-- Usage Summary -->
            <div class="mt-8 mb-6 mx-2 bg-gray-50 rounded-xl p-4 border border-gray-100">
                <h3 class="text-[10px] font-bold text-gray-500 uppercase tracking-wider mb-3">Penggunaan Sistem</h3>
                
                <div class="space-y-3">
                    <div>
                        <div class="flex justify-between text-xs mb-1">
                            <span class="font-medium text-gray-600">Penyimpanan</span>
                            <span class="font-bold text-gray-900">72%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-1.5">
                            <div class="bg-blue-600 h-1.5 rounded-full" style="width: 72%"></div>
                        </div>
                    </div>
                    
                    <div class="flex justify-between items-center text-xs">
                        <span class="font-medium text-gray-600">Panggilan API</span>
                        <span class="font-bold text-gray-900">16.4k</span>
                    </div>
                </div>
            </div>

        </div>

    </div>
</aside>

<style>
/* Hide scrollbar for sidebar */
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}
.scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
</style>
