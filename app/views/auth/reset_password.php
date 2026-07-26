<?php ob_start(); ?>

<div class="min-h-screen bg-white flex font-sans">
    
    <!-- Left Side: Image (Hidden on mobile) with Slanted Edge -->
    <div class="hidden lg:flex lg:w-[55%] relative bg-gray-900 overflow-hidden items-center justify-center" style="clip-path: polygon(0 0, 100% 0, 85% 100%, 0 100%);">
        <div class="absolute inset-0 bg-primary-900 opacity-20 z-10"></div>
        <img src="<?= base_url('assets/images/login_hero.png') ?>" alt="Fintech visualization" class="absolute inset-0 w-full h-full object-cover transform scale-125 object-center">
        
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-transparent to-transparent z-10 flex flex-col justify-end px-12 py-16 pr-32">
            <h1 class="text-4xl font-extrabold text-white tracking-tight mb-4">Secure Access</h1>
            <p class="text-lg text-gray-300 max-w-md">Regain access to your account quickly and securely. Your business operations are safe with KathaPayment.</p>
        </div>
    </div>

    <!-- Right Side: Reset Password Form -->
    <div class="w-full lg:w-[45%] flex flex-col justify-center py-12 px-6 sm:px-12 xl:px-24">
        
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <a href="<?= base_url() ?>" class="flex items-center gap-3 mb-8">
                <div class="w-10 h-10 rounded-lg bg-primary-600 flex items-center justify-center shadow-lg shadow-primary-500/30">
                    <i class="fa-solid fa-wallet text-xl text-white"></i>
                </div>
                <span class="font-extrabold text-2xl tracking-tight text-gray-900">KathaPayment</span>
            </a>
            <h2 class="text-3xl font-extrabold text-gray-900 mb-2">
                Set new password
            </h2>
            <p class="text-sm text-gray-600 mb-8">
                Please enter your new password below.
            </p>
        </div>

        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            
            <?php if(isset($_SESSION['error'])): ?>
                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-r-md">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fa-solid fa-circle-exclamation text-red-500 mt-0.5"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-red-800">
                                <?= $_SESSION['error']; unset($_SESSION['error']); ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <form class="space-y-5" action="<?= base_url('reset-password') ?>" method="POST">
                <?= csrf_field() ?>
                <input type="hidden" name="token" value="<?= htmlspecialchars($_GET['token'] ?? '') ?>">
                
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                        New Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-lock text-gray-400"></i>
                        </div>
                        <input id="password" name="password" type="password" required class="appearance-none block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 sm:text-sm transition-all" placeholder="••••••••">
                    </div>
                </div>

                <div>
                    <label for="password_confirm" class="block text-sm font-medium text-gray-700 mb-1">
                        Confirm New Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-lock text-gray-400"></i>
                        </div>
                        <input id="password_confirm" name="password_confirm" type="password" required class="appearance-none block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 sm:text-sm transition-all" placeholder="••••••••">
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-gray-900 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-all transform active:scale-[0.98]">
                        Reset Password
                    </button>
                </div>
            </form>
            
            <div class="mt-8">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">
                            Secure recovery encrypted by KathaPayment
                        </span>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean(); 
$hideNavbar = true; 
include BASE_PATH . '/app/views/layouts/main.php'; 
?>
