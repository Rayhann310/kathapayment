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
                
                <div class="relative z-10">
                    <h2 class="text-2xl font-extrabold text-gray-900 mb-3">Lupa Password?</h2>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Jangan khawatir, kami akan membantu Anda mereset password.
                    </p>
                </div>

                <div class="mt-auto pt-16 relative z-10 hidden md:block pb-4">
                    <!-- Abstract Lock Illustration -->
                    <div class="relative w-48 h-48 mx-auto">
                        <div class="absolute inset-0 bg-white rounded-3xl shadow-sm border border-gray-100 flex items-center justify-center">
                            <i class="fa-solid fa-lock text-6xl text-blue-400"></i>
                        </div>
                        <div class="absolute -bottom-4 -right-4 w-20 h-20 bg-blue-600 rounded-2xl flex items-center justify-center shadow-lg transform rotate-12 border-4 border-[#F4F7FB]">
                            <i class="fa-solid fa-envelope-open-text text-white text-3xl transform -rotate-12"></i>
                        </div>
                        <div class="absolute -bottom-10 right-4 flex space-x-1 opacity-70">
                            <i class="fa-solid fa-star text-blue-500 text-xs"></i>
                            <i class="fa-solid fa-star text-blue-500 text-xs"></i>
                            <i class="fa-solid fa-star text-blue-500 text-xs"></i>
                            <i class="fa-solid fa-star text-blue-500 text-xs"></i>
                            <i class="fa-solid fa-star text-blue-500 text-xs"></i>
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
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Email Terkirim!</h2>
                        <p class="text-gray-500 text-sm mb-6 max-w-xs mx-auto">
                            Kami telah mengirimkan link reset password ke email Anda.
                        </p>
                        
                        <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 flex items-start gap-3 text-left mb-8">
                            <i class="fa-solid fa-circle-info text-blue-600 mt-0.5"></i>
                            <p class="text-xs text-blue-800 leading-relaxed">
                                Link reset akan kadaluarsa dalam 60 menit untuk keamanan akun Anda.
                            </p>
                        </div>

                        <a href="<?= base_url('login') ?>" class="block w-full py-3 px-4 bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-semibold rounded-xl transition-colors mb-6">
                            Kembali ke Login
                        </a>
                        
                        <p class="text-xs text-gray-500">Belum menerima email? Cek folder spam atau <a href="#" class="font-bold text-blue-600 hover:underline">kirim ulang</a></p>
                    </div>
                <?php else: ?>
                    <!-- Form State -->
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Atur Ulang Password</h2>
                        <p class="text-sm text-gray-500">Masukkan email yang terdaftar pada akun Anda. Kami akan mengirimkan link untuk mereset password.</p>
                    </div>

                    <?php if(isset($_SESSION['error'])): ?>
                        <div class="bg-red-50 text-red-600 text-sm p-3 rounded-lg border border-red-100 mb-6 flex items-start gap-2">
                            <i class="fa-solid fa-circle-exclamation mt-0.5"></i>
                            <span><?= $_SESSION['error']; unset($_SESSION['error']); ?></span>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('forgot-password') ?>" method="POST" class="space-y-6">
                        <?= csrf_field() ?>
                        
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-1.5">Email</label>
                            <input type="email" id="email" name="email" required placeholder="nama@bisnisanda.com" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-colors placeholder-gray-400">
                        </div>

                        <button type="submit" class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition-colors shadow-lg shadow-blue-600/30">
                            Kirim Link Reset
                        </button>
                    </form>

                    <div class="mt-8 text-left">
                        <a href="<?= base_url('login') ?>" class="inline-flex items-center text-sm font-semibold text-blue-600 hover:text-blue-700">
                            <i class="fa-solid fa-arrow-left mr-2 text-xs"></i> Kembali ke halaman masuk
                        </a>
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
