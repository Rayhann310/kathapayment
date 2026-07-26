<?php ob_start(); ?>

<div class="min-h-screen bg-[#F8FAFC] flex flex-col font-sans">
    
    <!-- Header -->
    <div class="text-center pt-12 pb-8 px-4">
        <a href="<?= base_url() ?>" class="inline-flex items-center gap-3 mb-6">
            <img src="<?= base_url('assets/images/logo.png') ?>" alt="KathaPayment Logo" class="h-10 w-auto mx-auto" onerror="this.style.display='none'">
            <!-- Fallback if logo.png doesn't exist -->
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
                
                <div class="relative z-10">
                    <h2 class="text-2xl font-extrabold text-gray-900 mb-3">Selamat datang kembali!</h2>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Masuk ke akun Anda untuk melanjutkan ke dashboard.
                    </p>
                </div>

                <div class="mt-auto pt-12 relative z-10 hidden md:block">
                    <!-- Abstract Dashboard Illustration -->
                    <div class="relative w-full h-40 bg-white rounded-t-xl border border-gray-200 border-b-0 shadow-sm p-4 overflow-hidden">
                        <div class="flex gap-2 mb-4">
                            <div class="w-3 h-3 rounded-full bg-red-400"></div>
                            <div class="w-3 h-3 rounded-full bg-amber-400"></div>
                            <div class="w-3 h-3 rounded-full bg-green-400"></div>
                        </div>
                        <div class="w-1/2 h-4 bg-gray-100 rounded mb-4"></div>
                        <div class="w-3/4 h-3 bg-gray-50 rounded mb-2"></div>
                        <div class="w-2/3 h-3 bg-gray-50 rounded mb-6"></div>
                        
                        <div class="absolute -right-4 bottom-4 w-20 h-20 bg-blue-600 rounded-full flex items-center justify-center shadow-lg border-4 border-[#F4F7FB]">
                            <span class="text-white font-bold text-xl">KP</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="w-full md:w-7/12 p-8 md:p-12 flex flex-col justify-center bg-white relative">
                
                <?php if(isset($_SESSION['success'])): ?>
                    <!-- Success State -->
                    <div class="text-center py-8">
                        <div class="w-20 h-20 bg-green-50 text-green-500 rounded-full flex items-center justify-center text-4xl mx-auto mb-6">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Berhasil Masuk!</h2>
                        <p class="text-gray-500 text-sm mb-8">Anda akan diarahkan ke dashboard.</p>
                        
                        <a href="<?= base_url('dashboard') ?>" class="block w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition-colors shadow-lg shadow-blue-600/30 mb-4">
                            Ke Dashboard
                        </a>
                        <p class="text-xs text-gray-400">Mengalihkan otomatis dalam 3 detik...</p>
                        <meta http-equiv="refresh" content="3;url=<?= base_url('dashboard') ?>">
                    </div>
                <?php else: ?>
                    <!-- Form State -->
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Masuk ke Akun Anda</h2>
                        <p class="text-sm text-gray-500">Silakan masukkan email dan password Anda.</p>
                    </div>

                    <?php if(isset($_SESSION['error'])): ?>
                        <div class="bg-red-50 text-red-600 text-sm p-3 rounded-lg border border-red-100 mb-6 flex items-start gap-2">
                            <i class="fa-solid fa-circle-exclamation mt-0.5"></i>
                            <span><?= $_SESSION['error']; unset($_SESSION['error']); ?></span>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('login') ?>" method="POST" class="space-y-5">
                        <?= csrf_field() ?>
                        
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-1.5">Email</label>
                            <input type="email" id="email" name="email" required placeholder="nama@bisnisanda.com" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-colors placeholder-gray-400">
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-1.5">Password</label>
                            <div class="relative">
                                <input type="password" id="password" name="password" required placeholder="Masukkan password Anda" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-colors placeholder-gray-400 pr-10">
                                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600" onclick="const p = document.getElementById('password'); p.type = p.type === 'password' ? 'text' : 'password';">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>
                            <div class="flex justify-between items-center mt-2">
                                <div class="flex items-center">
                                    <input type="checkbox" id="remember" name="remember" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <label for="remember" class="ml-2 text-sm text-gray-600">Ingat saya</label>
                                </div>
                                <a href="<?= base_url('forgot-password') ?>" class="text-sm font-semibold text-blue-600 hover:text-blue-700">Lupe password?</a>
                            </div>
                        </div>

                        <button type="submit" class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition-colors shadow-lg shadow-blue-600/30 mt-2">
                            Masuk
                        </button>
                    </form>

                    <div class="mt-8 flex items-center">
                        <div class="flex-grow border-t border-gray-200"></div>
                        <span class="px-4 text-xs text-gray-400 uppercase tracking-wider font-medium">atau masuk dengan</span>
                        <div class="flex-grow border-t border-gray-200"></div>
                    </div>

                    <div class="mt-6 grid grid-cols-2 gap-4">
                        <button type="button" class="flex items-center justify-center gap-2 py-2.5 px-4 bg-white border border-gray-200 rounded-xl text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-colors">
                            <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="w-4 h-4"> Google
                        </button>
                        <button type="button" class="flex items-center justify-center gap-2 py-2.5 px-4 bg-white border border-gray-200 rounded-xl text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-colors">
                            <i class="fa-brands fa-github text-base"></i> GitHub
                        </button>
                    </div>

                    <div class="mt-8 text-center text-sm text-gray-600">
                        Belum punya akun? <a href="<?= base_url('register') ?>" class="font-semibold text-blue-600 hover:text-blue-700">Daftar sekarang</a>
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
