<?php ob_start(); ?>

<div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <h2 class="text-2xl font-extrabold text-gray-900 tracking-tight flex items-center gap-2">
            <i class="fa-solid fa-satellite-dish text-blue-600"></i> Webhooks
        </h2>
        <p class="text-sm text-gray-500 mt-1">Terima notifikasi instan ke server Anda ketika ada kejadian (events) seperti pembayaran berhasil.</p>
    </div>
    
    <button type="button" class="bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 font-bold py-2 px-4 rounded-xl shadow-sm text-sm transition-all flex items-center gap-2">
        <i class="fa-solid fa-flask"></i> Send Test Event
    </button>
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

<?php if (isset($_SESSION['flash_error'])): ?>
<div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl flex gap-3 shadow-sm animate-fade-in">
    <i class="fa-solid fa-circle-exclamation mt-1"></i>
    <div>
        <p class="font-bold text-sm">Error!</p>
        <p class="text-sm"><?= $_SESSION['flash_error'] ?></p>
    </div>
    <?php unset($_SESSION['flash_error']); ?>
</div>
<?php endif; ?>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Configuration Form -->
    <div class="col-span-1 lg:col-span-2">
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden mb-8 relative">
            <div class="absolute top-0 right-0 p-6 pointer-events-none opacity-5">
                <i class="fa-solid fa-tower-cell text-9xl"></i>
            </div>
            
            <div class="p-6 border-b border-gray-100 flex items-center gap-3 relative z-10">
                <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center text-lg">
                    <i class="fa-solid fa-link"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900">Endpoint Configuration</h3>
                    <p class="text-sm text-gray-500 mt-0.5">Atur ke mana kami harus mengirimkan HTTP POST request.</p>
                </div>
            </div>
            
            <form action="<?= base_url('webhooks/update') ?>" method="POST" class="p-6 md:p-8 space-y-6 relative z-10">
                <?= csrf_field() ?>
                
                <div>
                    <label class="block text-sm font-bold text-gray-900 mb-2">Webhook URL</label>
                    <div class="flex shadow-sm rounded-xl overflow-hidden border border-gray-200 focus-within:border-blue-500 focus-within:ring-1 focus-within:ring-blue-500 transition-all">
                        <div class="bg-gray-50 px-4 py-3 border-r border-gray-200 flex items-center justify-center text-gray-500">
                            <i class="fa-solid fa-globe"></i>
                        </div>
                        <input type="url" name="webhook_url" value="<?= htmlspecialchars($merchant['webhook_url'] ?? '') ?>" placeholder="https://api.yourdomain.com/webhooks/katha" class="bg-white text-gray-900 text-sm block w-full p-3 focus:outline-none placeholder-gray-400">
                    </div>
                    <p class="mt-2 text-xs text-gray-500 flex items-center gap-1.5"><i class="fa-solid fa-lock text-green-600"></i> Endpoint tujuan WAJIB menggunakan HTTPS yang valid.</p>
                </div>
                
                <div x-data="{ showSecret: false }">
                    <label class="block text-sm font-bold text-gray-900 mb-2">Webhook Secret</label>
                    <div class="flex shadow-sm rounded-xl overflow-hidden border border-gray-200 focus-within:border-blue-500 focus-within:ring-1 focus-within:ring-blue-500 transition-all">
                        <div class="bg-gray-50 px-4 py-3 border-r border-gray-200 flex items-center justify-center text-gray-500">
                            <i class="fa-solid fa-key"></i>
                        </div>
                        <input :type="showSecret ? 'text' : 'password'" name="webhook_secret" value="<?= htmlspecialchars($merchant['webhook_secret'] ?? '') ?>" placeholder="Masukkan string acak rahasia Anda" class="bg-white text-gray-900 text-sm block w-full p-3 focus:outline-none placeholder-gray-400 font-mono">
                        <button type="button" @click="showSecret = !showSecret" class="bg-gray-50 hover:bg-gray-100 text-gray-600 px-4 border-l border-gray-200 transition-colors flex items-center justify-center" title="Toggle visibility">
                            <i class="fa-solid" :class="showSecret ? 'fa-eye-slash' : 'fa-eye'"></i>
                        </button>
                    </div>
                    <p class="mt-2 text-xs text-gray-500 leading-relaxed">
                        Secret ini digunakan untuk menandatangani (sign) payload dari KathaPayment. 
                        Gunakan ini di backend Anda untuk memvalidasi header <code class="bg-gray-100 px-1 py-0.5 rounded text-pink-600 font-mono">X-Signature</code> agar terhindar dari pemalsuan *request*.
                    </p>
                </div>
                
                <div class="pt-4 flex justify-end">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl shadow-sm shadow-blue-600/20 text-sm transition-all flex items-center gap-2">
                        <i class="fa-solid fa-floppy-disk"></i> Save Webhook
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Integration Guide -->
    <div class="col-span-1">
        <div class="bg-gray-900 rounded-2xl p-6 text-white shadow-xl relative overflow-hidden h-full">
            <div class="absolute right-0 bottom-0 opacity-10 text-9xl translate-x-1/4 translate-y-1/4">
                <i class="fa-solid fa-code"></i>
            </div>
            
            <h3 class="font-bold text-lg mb-4 flex items-center gap-2 relative z-10">
                <i class="fa-solid fa-book-open text-blue-400"></i> Panduan Validasi
            </h3>
            
            <p class="text-gray-400 text-sm mb-6 relative z-10 leading-relaxed">
                Setiap *request* yang dikirimkan KathaPayment ke *endpoint* Anda akan memuat header <code class="bg-gray-800 text-pink-400 px-1 py-0.5 rounded text-xs font-mono">X-Signature</code>.
            </p>
            
            <div class="relative z-10 space-y-4">
                <div>
                    <h4 class="text-sm font-bold text-gray-200 mb-2">1. Cara Kalkulasi:</h4>
                    <div class="bg-gray-950 rounded-lg p-3 border border-gray-800">
                        <code class="text-xs text-green-400 font-mono break-all">
                            HMAC_SHA256(RawBody, WebhookSecret)
                        </code>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-sm font-bold text-gray-200 mb-2">2. Contoh Node.js:</h4>
                    <div class="bg-gray-950 rounded-lg p-3 border border-gray-800 overflow-x-auto">
<pre class="text-xs text-blue-300 font-mono"><code>const crypto = require('crypto');

const signature = crypto
  .createHmac('sha256', secret)
  .update(req.rawBody)
  .digest('hex');
  
if (req.headers['x-signature'] !== signature) {
  return res.status(401).send('Invalid');
}</code></pre>
                    </div>
                </div>
            </div>
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
