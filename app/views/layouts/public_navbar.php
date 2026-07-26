    <!-- Navbar -->
    <header class="fixed w-full z-50 transition-all duration-300 bg-white border-b border-gray-100">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="<?= base_url('') ?>">
                        <img src="<?= base_url('assets/images/logo.png') ?>" alt="KathaPayment Logo" class="h-10 w-auto">
                    </a>
                </div>
                
                <!-- Center Navigation -->
                <div class="hidden lg:flex space-x-6 items-center">
                    <button id="dropdownProduct" data-dropdown-toggle="dropdownProductMenu" class="text-[15px] font-semibold text-gray-800 hover:text-primary-600 transition-colors flex items-center gap-1">
                        <?= $lang['nav_product'] ?? 'Produk' ?> <i class="fa-solid fa-chevron-down text-[10px]"></i>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownProductMenu" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg border border-gray-100 w-44">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownProduct">
                          <li><a href="<?= base_url('qris') ?>" class="block px-4 py-2 hover:bg-gray-50">QRIS</a></li>
                          <li><a href="<?= base_url('virtual-account') ?>" class="block px-4 py-2 hover:bg-gray-50">Virtual Account</a></li>
                        </ul>
                    </div>

                    <a href="<?= base_url('features') ?>" class="text-[15px] font-semibold text-gray-800 hover:text-primary-600 transition-colors"><?= $lang['nav_features'] ?? 'Fitur' ?></a>
                    <a href="<?= base_url('dokumentasi') ?>" class="text-[15px] font-semibold text-gray-800 hover:text-primary-600 transition-colors"><?= $lang['nav_docs'] ?? 'Dokumentasi' ?></a>
                    <a href="<?= base_url('pricing') ?>" class="text-[15px] font-semibold text-gray-800 hover:text-primary-600 transition-colors"><?= $lang['nav_pricing'] ?? 'Harga' ?></a>
                    <a href="<?= base_url('developers') ?>" class="text-[15px] font-semibold text-gray-800 hover:text-primary-600 transition-colors"><?= $lang['nav_developer'] ?? 'Developer' ?></a>
                    
                    <button id="dropdownCompany" data-dropdown-toggle="dropdownCompanyMenu" class="text-[15px] font-semibold text-gray-800 hover:text-primary-600 transition-colors flex items-center gap-1">
                        <?= $lang['nav_company'] ?? 'Perusahaan' ?> <i class="fa-solid fa-chevron-down text-[10px]"></i>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownCompanyMenu" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg border border-gray-100 w-44">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownCompany">
                          <li><a href="<?= base_url('about') ?>" class="block px-4 py-2 hover:bg-gray-50">Tentang Kami</a></li>
                          <li><a href="<?= base_url('careers') ?>" class="block px-4 py-2 hover:bg-gray-50">Karir</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Right Navigation -->
                <div class="flex items-center space-x-4">
                    
                    <!-- Language Switcher -->
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdownLang" class="text-gray-600 hover:text-gray-900 font-medium rounded-lg text-sm px-2 py-2.5 text-center inline-flex items-center transition-colors" type="button">
                        <?= strtoupper($current_lang ?? 'EN') ?> <i class="fa-solid fa-chevron-down ml-1 text-[10px]"></i>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownLang" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg border border-gray-100 w-32">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                          <li>
                            <a href="<?= base_url('lang/en') ?>" class="block px-4 py-2 hover:bg-gray-50 <?= ($current_lang ?? 'en') == 'en' ? 'font-bold text-primary-600' : '' ?>">English (EN)</a>
                          </li>
                          <li>
                            <a href="<?= base_url('lang/id') ?>" class="block px-4 py-2 hover:bg-gray-50 <?= ($current_lang ?? 'en') == 'id' ? 'font-bold text-primary-600' : '' ?>">Bahasa (ID)</a>
                          </li>
                        </ul>
                    </div>

                    <a href="<?= base_url('login') ?>" class="text-[15px] font-semibold text-gray-800 hover:text-primary-600 transition-colors hidden sm:inline-block px-3 py-2"><?= $lang['nav_signin'] ?? 'Masuk' ?></a>
                    <a href="<?= base_url('register') ?>" class="hidden md:inline-flex items-center justify-center px-6 py-2.5 rounded-full shadow-sm text-[15px] font-semibold text-white bg-primary-600 hover:bg-primary-700 transition-colors focus:outline-none">
                        <?= $lang['nav_getstarted'] ?? 'Daftar Gratis' ?>
                    </a>

                    <!-- Mobile Menu Button -->
                    <button type="button" class="lg:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none">
                        <span class="sr-only">Open main menu</span>
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </nav>
    </header>
