    <!-- Footer -->
    <footer class="bg-white border-t border-gray-100 mt-20 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-6 gap-12 mb-16">
                
                <!-- Logo & Desc -->
                <div class="col-span-1 md:col-span-2">
                    <a href="<?= base_url('') ?>" class="block mb-6">
                        <img src="<?= base_url('assets/images/logo.png') ?>" alt="KathaPayment Logo" class="h-10 w-auto">
                    </a>
                    <p class="text-gray-500 text-sm max-w-xs leading-relaxed mb-6">
                        <?= $lang['foot_desc'] ?? 'Payment Gateway modern untuk bisnis Indonesia. Aman, cepat, dan terpercaya.' ?>
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full text-blue-600 hover:bg-blue-50 transition-colors">
                            <i class="fa-brands fa-facebook-f text-lg"></i>
                        </a>
                        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full text-blue-400 hover:bg-blue-50 transition-colors">
                            <i class="fa-brands fa-twitter text-lg"></i>
                        </a>
                        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full text-pink-600 hover:bg-pink-50 transition-colors">
                            <i class="fa-brands fa-instagram text-lg"></i>
                        </a>
                        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full text-blue-700 hover:bg-blue-50 transition-colors">
                            <i class="fa-brands fa-linkedin-in text-lg"></i>
                        </a>
                    </div>
                </div>

                <!-- Footer Columns -->
                <div class="col-span-1">
                    <h3 class="text-[15px] font-bold text-gray-900 mb-6"><?= $lang['foot_col1'] ?? 'Produk' ?></h3>
                    <ul class="space-y-4">
                        <li><a href="<?= base_url('features') ?>" class="text-sm text-gray-500 hover:text-primary-600 transition-colors font-medium"><?= $lang['foot_col1_l1'] ?? 'Fitur' ?></a></li>
                        <li><a href="<?= base_url('features') ?>" class="text-sm text-gray-500 hover:text-primary-600 transition-colors font-medium"><?= $lang['foot_col1_l2'] ?? 'Metode Pembayaran' ?></a></li>
                        <li><a href="<?= base_url('pricing') ?>" class="text-sm text-gray-500 hover:text-primary-600 transition-colors font-medium"><?= $lang['foot_col1_l3'] ?? 'Harga' ?></a></li>
                        <li><a href="<?= base_url('features') ?>" class="text-sm text-gray-500 hover:text-primary-600 transition-colors font-medium"><?= $lang['foot_col1_l4'] ?? 'Keamanan' ?></a></li>
                    </ul>
                </div>
                
                <div class="col-span-1">
                    <h3 class="text-[15px] font-bold text-gray-900 mb-6"><?= $lang['foot_col2'] ?? 'Developer' ?></h3>
                    <ul class="space-y-4">
                        <li><a href="<?= base_url('dokumentasi') ?>" class="text-sm text-gray-500 hover:text-primary-600 transition-colors font-medium"><?= $lang['foot_col2_l1'] ?? 'Dokumentasi' ?></a></li>
                        <li><a href="<?= base_url('developers') ?>" class="text-sm text-gray-500 hover:text-primary-600 transition-colors font-medium"><?= $lang['foot_col2_l2'] ?? 'API Reference' ?></a></li>
                        <li><a href="<?= base_url('developers') ?>" class="text-sm text-gray-500 hover:text-primary-600 transition-colors font-medium"><?= $lang['foot_col2_l3'] ?? 'SDK' ?></a></li>
                        <li><a href="<?= base_url('developers') ?>" class="text-sm text-gray-500 hover:text-primary-600 transition-colors font-medium"><?= $lang['foot_col2_l4'] ?? 'Webhook' ?></a></li>
                    </ul>
                </div>

                <div class="col-span-1">
                    <h3 class="text-[15px] font-bold text-gray-900 mb-6"><?= $lang['foot_col3'] ?? 'Perusahaan' ?></h3>
                    <ul class="space-y-4">
                        <li><a href="<?= base_url('about') ?>" class="text-sm text-gray-500 hover:text-primary-600 transition-colors font-medium"><?= $lang['foot_col3_l1'] ?? 'Tentang Kami' ?></a></li>
                        <li><a href="<?= base_url('careers') ?>" class="text-sm text-gray-500 hover:text-primary-600 transition-colors font-medium"><?= $lang['foot_col3_l2'] ?? 'Karir' ?></a></li>
                        <li><a href="<?= base_url('about') ?>" class="text-sm text-gray-500 hover:text-primary-600 transition-colors font-medium"><?= $lang['foot_col3_l3'] ?? 'Blog' ?></a></li>
                        <li><a href="<?= base_url('about') ?>" class="text-sm text-gray-500 hover:text-primary-600 transition-colors font-medium"><?= $lang['foot_col3_l4'] ?? 'Kontak' ?></a></li>
                    </ul>
                </div>

                <div class="col-span-1">
                    <h3 class="text-[15px] font-bold text-gray-900 mb-6"><?= $lang['foot_col4'] ?? 'Legal' ?></h3>
                    <ul class="space-y-4">
                        <li><a href="<?= base_url('terms') ?>" class="text-sm text-gray-500 hover:text-primary-600 transition-colors font-medium"><?= $lang['foot_col4_l1'] ?? 'Syarat & Ketentuan' ?></a></li>
                        <li><a href="<?= base_url('privacy') ?>" class="text-sm text-gray-500 hover:text-primary-600 transition-colors font-medium"><?= $lang['foot_col4_l2'] ?? 'Kebijakan Privasi' ?></a></li>
                        <li><a href="<?= base_url('refund') ?>" class="text-sm text-gray-500 hover:text-primary-600 transition-colors font-medium"><?= $lang['foot_col4_l3'] ?? 'Kebijakan Refund' ?></a></li>
                    </ul>
                </div>
            </div>

            <div class="pt-8 border-t border-gray-100 text-center">
                <p class="text-[13px] font-medium text-gray-500">
                    <?= $lang['foot_rights'] ?? '© ' . date('Y') . ' KathaPayment. All rights reserved.' ?>
                </p>
            </div>
        </div>
    </footer>
