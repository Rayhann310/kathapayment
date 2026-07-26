<?php ob_start(); ?>

<div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <h2 class="text-2xl font-extrabold text-gray-900 tracking-tight flex items-center gap-2">
            <i class="fa-solid fa-key text-blue-600"></i> API Keys
        </h2>
        <p class="text-sm text-gray-500 mt-1">Kelola *Secret* dan *Public* keys Anda untuk mengautentikasi *request* ke server KathaPayment.</p>
    </div>
    
    <form action="<?= base_url('apikeys/roll') ?>" method="POST" onsubmit="return confirm('⚠️ PERINGATAN KRITIS:\n\nApakah Anda yakin ingin melakukan ROLL (Generate ulang) pada API Keys Anda?\n\nKunci lama Anda akan LANGSUNG TIDAK BERFUNGSI dan aplikasi Anda mungkin akan down sampai Anda menggantinya dengan kunci baru di server Anda.');">
        <button type="submit" class="bg-white border border-red-200 text-red-600 hover:bg-red-50 font-bold py-2 px-4 rounded-xl shadow-sm text-sm transition-all flex items-center gap-2">
            <i class="fa-solid fa-rotate"></i> Roll API Keys
        </button>
    </form>
</div>

<?php if (isset($_SESSION['flash_success'])): ?>
<div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl flex gap-3 shadow-sm animate-fade-in">
    <i class="fa-solid fa-circle-check mt-1"></i>
    <div>
        <p class="font-bold text-sm">Success!</p>
        <p class="text-sm"><?= $_SESSION['flash_success'] ?></p>
    </div>
    <?php unset($_SESSION['flash_success']); ?>
</div>
<?php endif; ?>

<!-- Main Card -->
<div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden mb-8 relative">
    <div class="absolute top-0 right-0 p-6 pointer-events-none opacity-5">
        <i class="fa-solid fa-fingerprint text-9xl"></i>
    </div>
    
    <div class="p-6 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div>
            <h3 class="text-lg font-bold text-gray-900">Standard API Keys</h3>
            <p class="text-sm text-gray-500 mt-1">Gunakan keys ini untuk mengintegrasikan *backend* dan *frontend* Anda.</p>
        </div>
        
        <?php if (isset($merchant['is_sandbox']) && $merchant['is_sandbox']): ?>
            <div class="bg-yellow-50 text-yellow-700 border border-yellow-200 text-xs font-bold px-3 py-1.5 rounded-full flex items-center gap-2 shadow-sm">
                <span class="w-2 h-2 rounded-full bg-yellow-500 animate-pulse"></span>
                Sandbox Mode Active
            </div>
        <?php else: ?>
            <div class="bg-green-50 text-green-700 border border-green-200 text-xs font-bold px-3 py-1.5 rounded-full flex items-center gap-2 shadow-sm">
                <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                Live Mode Active
            </div>
        <?php endif; ?>
    </div>
    
    <div class="p-6 md:p-8 space-y-8 relative z-10">
        <!-- Publishable Key -->
        <div>
            <div class="flex items-center gap-2 mb-2">
                <label class="block text-sm font-bold text-gray-900">Publishable Key</label>
                <span class="bg-blue-50 text-blue-600 text-[10px] font-bold px-2 py-0.5 rounded border border-blue-100">CLIENT SIDE</span>
            </div>
            <p class="text-xs text-gray-500 mb-3">Kunci ini aman digunakan di *frontend* (misal: React, Vue, Android) untuk tokenisasi kartu.</p>
            
            <div class="flex shadow-sm rounded-xl overflow-hidden border border-gray-200 focus-within:border-blue-500 focus-within:ring-1 focus-within:ring-blue-500 transition-all">
                <div class="bg-gray-50 px-4 py-3 border-r border-gray-200 flex items-center justify-center text-gray-500">
                    <i class="fa-solid fa-code"></i>
                </div>
                <input type="text" readonly value="<?= htmlspecialchars($merchant['public_key'] ?? '') ?>" class="bg-white text-gray-900 text-sm font-mono block w-full p-3 focus:outline-none cursor-text">
                <button onclick="navigator.clipboard.writeText('<?= htmlspecialchars($merchant['public_key'] ?? '') ?>'); alert('Publishable Key disalin!')" class="bg-gray-50 hover:bg-gray-100 text-gray-600 px-5 border-l border-gray-200 font-semibold text-sm transition-colors flex items-center gap-2">
                    <i class="fa-regular fa-copy"></i> Copy
                </button>
            </div>
        </div>
        
        <!-- Secret Key -->
        <div x-data="{ showSecret: false }">
            <div class="flex items-center gap-2 mb-2">
                <label class="block text-sm font-bold text-gray-900">Secret Key</label>
                <span class="bg-red-50 text-red-600 text-[10px] font-bold px-2 py-0.5 rounded border border-red-100">SERVER SIDE ONLY</span>
            </div>
            <p class="text-xs text-red-500 mb-3 font-medium flex items-center gap-1.5">
                <i class="fa-solid fa-triangle-exclamation"></i> Kunci ini bersifat SANGAT RAHASIA. Jangan pernah dibagikan atau di-*commit* ke GitHub/Frontend!
            </p>
            
            <div class="flex shadow-sm rounded-xl overflow-hidden border border-gray-200 focus-within:border-blue-500 focus-within:ring-1 focus-within:ring-blue-500 transition-all">
                <div class="bg-gray-50 px-4 py-3 border-r border-gray-200 flex items-center justify-center text-gray-500">
                    <i class="fa-solid fa-lock"></i>
                </div>
                <input :type="showSecret ? 'text' : 'password'" readonly value="<?= htmlspecialchars($merchant['secret_key'] ?? '') ?>" class="bg-white text-gray-900 text-sm font-mono block w-full p-3 focus:outline-none cursor-text">
                <button @click="showSecret = !showSecret" class="bg-gray-50 hover:bg-gray-100 text-gray-600 px-4 border-l border-gray-200 transition-colors flex items-center justify-center" title="Toggle visibility">
                    <i class="fa-solid" :class="showSecret ? 'fa-eye-slash' : 'fa-eye'"></i>
                </button>
                <button onclick="navigator.clipboard.writeText('<?= htmlspecialchars($merchant['secret_key'] ?? '') ?>'); alert('Secret Key disalin!')" class="bg-gray-50 hover:bg-gray-100 text-gray-600 px-5 border-l border-gray-200 font-semibold text-sm transition-colors flex items-center gap-2">
                    <i class="fa-regular fa-copy"></i> Copy
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Integration Guide Block -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-gray-900 rounded-2xl p-6 text-white shadow-xl relative overflow-hidden group">
        <div class="absolute right-0 bottom-0 opacity-10 text-9xl translate-x-1/4 translate-y-1/4 group-hover:scale-110 transition-transform duration-700">
            <i class="fa-brands fa-php"></i>
        </div>
        <h3 class="font-bold text-lg mb-2 relative z-10">PHP Integration</h3>
        <p class="text-gray-400 text-sm mb-4 relative z-10">Contoh penggunaan Secret Key pada Backend PHP (cURL).</p>
        <div class="bg-gray-950 rounded-xl p-4 border border-gray-800 relative z-10">
            <pre class="text-xs text-blue-300 font-mono overflow-x-auto"><code>$ch = curl_init('https://api.kathapayment.com/v1/charge');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Basic ' . base64_encode('<?= substr($merchant['secret_key'] ?? 'sk_test_...', 0, 15) ?>...:'),
    'Content-Type: application/json'
]);</code></pre>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm relative overflow-hidden group hover:border-blue-200 transition-colors">
        <div class="absolute right-0 bottom-0 opacity-5 text-blue-600 text-9xl translate-x-1/4 translate-y-1/4 group-hover:scale-110 transition-transform duration-700">
            <i class="fa-brands fa-js"></i>
        </div>
        <h3 class="font-bold text-gray-900 text-lg mb-2 relative z-10">JavaScript (Frontend)</h3>
        <p class="text-gray-500 text-sm mb-4 relative z-10">Contoh penggunaan Publishable Key di sisi Client.</p>
        <div class="bg-gray-50 rounded-xl p-4 border border-gray-200 relative z-10">
            <pre class="text-xs text-gray-700 font-mono overflow-x-auto"><code>const katha = new KathaPayment('<?= substr($merchant['public_key'] ?? 'pk_test_...', 0, 15) ?>...');

katha.createToken(cardElement).then(function(result) {
    // Kirim token ke backend Anda
});</code></pre>
        </div>
    </div>
</div>

<style>
@keyframes fade-in {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
    animation: fade-in 0.3s ease-out forwards;
}
</style>

<?php 
$content = ob_get_clean(); 
require BASE_PATH . '/app/views/layouts/main.php'; 
?>
