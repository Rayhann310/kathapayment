<?php ob_start(); ?>

<div class="min-h-screen bg-[#F8FAFC] flex flex-col font-sans">
    
    <!-- Header -->
    <div class="text-center pt-12 pb-8 px-4">
        <a href="<?= base_url() ?>" class="inline-flex items-center gap-3 mb-6">
            <img src="<?= base_url('assets/images/logo.png') ?>" alt="KathaPayment Logo" class="h-10 w-auto mx-auto" onerror="this.style.display='none'">
            <div class="w-10 h-10 rounded-lg bg-blue-600 flex items-center justify-center shadow-lg shadow-blue-500/30" style="display: <?= file_exists(BASE_PATH.'/public/assets/images/logo.png') ? 'none' : 'flex' ?>;">
                <i class="fa-solid fa-wallet text-xl text-white"></i>
            </div>
            <span class="font-extrabold text-2xl tracking-tight text-gray-900" style="display: <?= file_exists(BASE_PATH.'/public/assets/images/logo.png') ? 'none' : 'block' ?>;">KathaPayment</span>
        </a>
        <p class="text-gray-500 text-[15px] max-w-md mx-auto">
            Solusi pembayaran online yang aman, mudah, dan terpercaya untuk mendukung pertumbuhan bisnis Anda.
        </p>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex items-start justify-center px-4 sm:px-6 lg:px-8 pb-12">
        <div class="w-full max-w-4xl bg-white rounded-3xl shadow-xl shadow-gray-200/50 overflow-hidden flex flex-col md:flex-row border border-gray-100">
            
            <!-- Left Column -->
            <div class="w-full md:w-5/12 bg-[#F4F7FB] p-8 md:p-10 flex flex-col relative overflow-hidden">
                <a href="<?= base_url() ?>" class="flex items-center gap-2 mb-12 relative z-10">
                    <div class="w-8 h-8 rounded-md bg-blue-600 flex items-center justify-center">
                        <i class="fa-solid fa-wallet text-white text-sm"></i>
                    </div>
                    <span class="font-bold text-gray-900 text-lg tracking-tight">KathaPayment</span>
                </a>
                
                <div class="relative z-10 mb-8">
                    <h2 class="text-2xl font-extrabold text-gray-900 mb-3">Buat Akun Baru</h2>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Daftar dan mulai gunakan KathaPayment sekarang.
                    </p>
                </div>

                <div class="relative z-10 space-y-5">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded bg-blue-100 text-blue-600 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-cubes text-sm"></i>
                        </div>
                        <span class="text-sm font-semibold text-gray-700">Proses integrasi mudah</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded bg-blue-100 text-blue-600 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-shield-halved text-sm"></i>
                        </div>
                        <span class="text-sm font-semibold text-gray-700">Transaksi aman & terenkripsi</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded bg-blue-100 text-blue-600 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-headset text-sm"></i>
                        </div>
                        <span class="text-sm font-semibold text-gray-700">Dukungan 24/7</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded bg-blue-100 text-blue-600 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-file-invoice-dollar text-sm"></i>
                        </div>
                        <span class="text-sm font-semibold text-gray-700">Biaya transparan</span>
                    </div>
                </div>
                
                <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>
            </div>

            <!-- Right Column -->
            <div class="w-full md:w-7/12 p-8 md:p-12 flex flex-col justify-center bg-white relative">
                
                <?php if(isset($_SESSION['success'])): ?>
                    <!-- Success State -->
                    <div class="text-center py-8">
                        <div class="w-20 h-20 bg-green-50 text-green-500 rounded-full flex items-center justify-center text-4xl mx-auto mb-6">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Registrasi Berhasil!</h2>
                        <p class="text-gray-500 text-sm mb-8 max-w-sm mx-auto">
                            Akun Anda telah berhasil dibuat. Silakan cek email Anda untuk verifikasi akun.
                        </p>
                        
                        <a href="mailto:" class="block w-full py-3 px-4 bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-semibold rounded-xl transition-colors mb-4">
                            Buka Email
                        </a>
                        
                        <div class="flex items-center justify-center my-4">
                            <div class="w-12 border-t border-gray-200"></div>
                            <span class="px-3 text-xs text-gray-400 font-medium uppercase">atau</span>
                            <div class="w-12 border-t border-gray-200"></div>
                        </div>

                        <a href="<?= base_url('login') ?>" class="block w-full py-3 px-4 bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-semibold rounded-xl transition-colors mb-6">
                            Masuk Sekarang
                        </a>
                        
                        <p class="text-xs text-gray-500">Belum menerima email? <a href="#" class="font-bold text-blue-600 hover:underline">Kirim ulang</a></p>
                    </div>
                <?php else: ?>
                    <!-- Form State -->
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Daftar Akun</h2>
                        <p class="text-sm text-gray-500">Lengkapi data di bawah untuk membuat akun.</p>
                    </div>

                    <?php if(isset($_SESSION['error'])): ?>
                        <div class="bg-red-50 text-red-600 text-sm p-3 rounded-lg border border-red-100 mb-6 flex items-start gap-2">
                            <i class="fa-solid fa-circle-exclamation mt-0.5"></i>
                            <span><?= $_SESSION['error']; unset($_SESSION['error']); ?></span>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('register') ?>" method="POST" class="space-y-4">
                        <?= csrf_field() ?>
                        
                        <div>
                            <label for="name" class="block text-xs font-semibold text-gray-700 mb-1.5 uppercase tracking-wide">Nama Lengkap</label>
                            <input type="text" id="name" name="name" required placeholder="Nama lengkap Anda" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-colors placeholder-gray-400">
                        </div>

                        <div>
                            <label for="email" class="block text-xs font-semibold text-gray-700 mb-1.5 uppercase tracking-wide">Email</label>
                            <input type="email" id="email" name="email" required placeholder="nama@bisnisanda.com" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-colors placeholder-gray-400">
                        </div>
                        
                        <div>
                            <label for="phone" class="block text-xs font-semibold text-gray-700 mb-1.5 uppercase tracking-wide">Nomor Telepon</label>
                            <input type="text" id="phone" name="phone" placeholder="0812 3456 7890" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-colors placeholder-gray-400">
                        </div>

                        <div>
                            <label for="password" class="block text-xs font-semibold text-gray-700 mb-1.5 uppercase tracking-wide">Password</label>
                            <div class="relative">
                                <input type="password" id="password" name="password" required minlength="8" placeholder="Buat password (min. 8 karakter)" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-colors placeholder-gray-400 pr-10">
                                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600" onclick="const p = document.getElementById('password'); p.type = p.type === 'password' ? 'text' : 'password';">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div>
                            <label for="password_confirmation" class="block text-xs font-semibold text-gray-700 mb-1.5 uppercase tracking-wide">Konfirmasi Password</label>
                            <div class="relative">
                                <input type="password" id="password_confirmation" name="password_confirmation" required minlength="8" placeholder="Ulangi password Anda" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-colors placeholder-gray-400 pr-10">
                                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600" onclick="const p = document.getElementById('password_confirmation'); p.type = p.type === 'password' ? 'text' : 'password';">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="flex items-start mt-4">
                            <div class="flex items-center h-5">
                                <input type="checkbox" id="terms" name="terms" required class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <label for="terms" class="ml-2 text-xs text-gray-600 leading-tight">
                                Saya setuju dengan <a href="<?= base_url('terms') ?>" class="text-blue-600 font-semibold hover:underline">Syarat & Ketentuan</a> dan <a href="<?= base_url('privacy') ?>" class="text-blue-600 font-semibold hover:underline">Kebijakan Privasi</a>
                            </label>
                        </div>

                        <button type="submit" class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition-colors shadow-lg shadow-blue-600/30 mt-6">
                            Daftar Akun
                        </button>
                    </form>

                    <div class="mt-8 text-center text-sm text-gray-600">
                        Sudah punya akun? <a href="<?= base_url('login') ?>" class="font-semibold text-blue-600 hover:text-blue-700">Masuk di sini</a>
                    </div>
                <?php endif; ?>
                
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="py-6 text-center text-sm text-gray-500 flex flex-col md:flex-row items-center justify-center gap-4 md:gap-12 pb-10">
        <p>&copy; <?= date('Y') ?> KathaPayment. All rights reserved.</p>
        <div class="flex gap-6">
            <a href="<?= base_url('terms') ?>" class="hover:text-gray-800 transition-colors">Syarat & Ketentuan</a>
            <a href="<?= base_url('privacy') ?>" class="hover:text-gray-800 transition-colors">Kebijakan Privasi</a>
            <a href="<?= base_url('faq') ?>" class="hover:text-gray-800 transition-colors">Bantuan</a>
            <a href="<?= base_url('about') ?>" class="hover:text-gray-800 transition-colors">Kontak Kami</a>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean(); 
$hideNavbar = true; 
include BASE_PATH . '/app/views/layouts/main.php'; 
?>
