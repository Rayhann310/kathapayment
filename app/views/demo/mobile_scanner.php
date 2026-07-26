<?php
$method = $trx['payment_method'] ?? 'QRIS';

// Tentukan warna dan nama sesuai bank
$theme = [
    'QRIS' => ['bg' => 'bg-blue-600', 'text' => 'text-blue-600', 'name' => 'Katha E-Wallet', 'icon' => 'fa-wallet'],
    'BCA_VA' => ['bg' => 'bg-[#005E6A]', 'text' => 'text-[#005E6A]', 'name' => 'm-BCA Simulator', 'icon' => 'fa-building-columns'],
    'BNI_VA' => ['bg' => 'bg-[#F15A23]', 'text' => 'text-[#F15A23]', 'name' => 'BNI Mobile Sim', 'icon' => 'fa-building-columns'],
    'MANDIRI_VA' => ['bg' => 'bg-[#003D79]', 'text' => 'text-[#003D79]', 'name' => 'Livin Simulator', 'icon' => 'fa-building-columns'],
    'ALFAMART' => ['bg' => 'bg-[#E31E24]', 'text' => 'text-[#E31E24]', 'name' => 'Alfamart POS Sim', 'icon' => 'fa-shop']
];

$t = $theme[$method] ?? $theme['QRIS'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Bank Simulator</title>
    <link rel="icon" type="image/png" href="<?= base_url('favicon.png') ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Loading animation */
        .loader {
            border-top-color: #3b82f6;
            -webkit-animation: spinner 1.5s linear infinite;
            animation: spinner 1.5s linear infinite;
        }
        @keyframes spinner {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen font-sans flex flex-col items-center justify-center sm:py-6">
    
    <div class="w-full max-w-md bg-white min-h-screen sm:min-h-[850px] sm:rounded-[2.5rem] shadow-2xl flex flex-col relative overflow-hidden ring-1 ring-gray-100">
        
        <!-- App Header with mesh gradient background -->
        <div class="relative <?= $t['bg'] ?> pb-16 pt-6 px-6 z-0 overflow-hidden">
            <!-- Decorative circles -->
            <div class="absolute top-0 right-0 -mr-10 -mt-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl"></div>
            <div class="absolute bottom-0 left-0 -ml-10 -mb-10 w-40 h-40 bg-black opacity-10 rounded-full blur-2xl"></div>
            
            <div class="relative z-10 flex items-center justify-between text-white mb-6">
                <i class="fa-solid fa-arrow-left text-xl cursor-pointer" onclick="window.close()"></i>
                <div class="font-bold text-lg tracking-wide"><?= $t['name'] ?></div>
                <i class="fa-regular fa-circle-question text-xl"></i>
            </div>
        </div>

        <div id="payment-content" class="flex-1 flex flex-col relative z-10 -mt-12 px-5">
            <!-- Amount Card -->
            <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] p-6 mb-6 border border-gray-50 flex flex-col items-center relative overflow-hidden">
                <div class="w-16 h-16 bg-gradient-to-tr from-gray-50 to-gray-100 rounded-2xl flex items-center justify-center <?= $t['text'] ?> text-3xl mb-4 shadow-sm border border-gray-100">
                    <i class="fa-solid <?= $t['icon'] ?>"></i>
                </div>
                
                <h2 class="text-gray-500 font-medium text-sm mb-1 uppercase tracking-widest">Total Pembayaran</h2>
                <div class="text-4xl font-black text-gray-900 mb-2">Rp <?= number_format($trx['amount'], 0, ',', '.') ?></div>
                
                <div class="bg-gray-50 text-gray-600 text-xs font-semibold px-3 py-1 rounded-full mb-2">
                    ID: <?= substr($trx['id'], -8) ?>
                </div>
            </div>

            <!-- Payment Details Card -->
            <div class="bg-white rounded-3xl shadow-[0_4px_20px_rgb(0,0,0,0.04)] p-6 mb-6 border border-gray-50">
                <div class="flex items-center gap-3 mb-5 pb-5 border-b border-gray-100">
                    <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center font-bold">
                        <i class="fa-solid fa-store"></i>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500">Merchant</div>
                        <div class="font-bold text-gray-900">Katha Store</div>
                    </div>
                </div>

                <?php if ($method !== 'QRIS'): ?>
                <div class="mb-5 pb-5 border-b border-gray-100">
                    <div class="text-xs text-gray-500 mb-1"><?= $method === 'ALFAMART' ? 'Kode Pembayaran' : 'Nomor Virtual Account' ?></div>
                    <div class="text-xl font-mono font-bold text-gray-900 tracking-wider">
                        <?= $method === 'ALFAMART' ? 'KTHA' . rand(10000000, 99999999) : '8077' . rand(100000000, 999999999) ?>
                    </div>
                </div>
                <?php endif; ?>
                
                <div class="space-y-3">
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-500">Sumber Dana</span>
                        <span class="font-bold text-gray-800 flex items-center gap-2">
                            <i class="fa-solid fa-wallet <?= $t['text'] ?>"></i> Saldo Utama
                        </span>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-500">Biaya Admin</span>
                        <span class="font-bold text-green-500 bg-green-50 px-2 py-0.5 rounded">Gratis</span>
                    </div>
                </div>
            </div>

            <!-- Info Alert -->
            <div class="bg-blue-50/50 border border-blue-100/50 rounded-2xl p-4 flex gap-3 text-blue-700 text-xs leading-relaxed mb-6">
                <i class="fa-solid fa-circle-info mt-0.5 text-lg"></i>
                <div>
                    <strong class="block mb-1">Mode Simulasi</strong>
                    Ini adalah aplikasi buatan untuk demonstrasi. Tidak ada uang asli yang dipotong.
                </div>
            </div>

            <div class="mt-auto pb-8">
                <button id="btn-pay" onclick="processPayment()" class="w-full <?= $t['bg'] ?> hover:opacity-90 text-white font-bold text-lg py-4 rounded-2xl shadow-[0_8px_20px_rgb(0,0,0,0.15)] hover:shadow-[0_8px_25px_rgb(0,0,0,0.25)] transition-all flex justify-center items-center gap-2 transform active:scale-[0.98]">
                    <span>Konfirmasi & Bayar</span>
                </button>
                <div class="text-center text-xs text-gray-400 mt-4 flex items-center justify-center gap-1">
                    <i class="fa-solid fa-lock"></i> Pembayaran Aman & Terenkripsi
                </div>
            </div>
        </div>

        <!-- Success State (Hidden initially) -->
        <div id="success-content" class="absolute inset-0 bg-white z-50 flex flex-col items-center justify-center p-6 hidden opacity-0 transition-opacity duration-500">
            <!-- Celebration particles background -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-green-400 rounded-full animate-ping"></div>
                <div class="absolute top-1/3 right-1/4 w-3 h-3 bg-blue-400 rounded-full animate-bounce"></div>
                <div class="absolute bottom-1/3 left-1/3 w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></div>
            </div>

            <div class="w-28 h-28 bg-green-50 rounded-full flex items-center justify-center mb-6 relative">
                <div class="absolute inset-0 bg-green-100 rounded-full animate-ping opacity-50"></div>
                <div class="w-20 h-20 bg-green-500 text-white rounded-full flex items-center justify-center shadow-lg shadow-green-200 z-10 scale-50 transition-transform duration-500" id="success-icon">
                    <i class="fa-solid fa-check text-4xl"></i>
                </div>
            </div>
            
            <h2 class="text-2xl font-black text-gray-900 mb-2">Pembayaran Berhasil!</h2>
            <p class="text-gray-500 text-center mb-8 text-sm">Notifikasi sukses telah dikirim ke perangkat utama secara realtime.</p>
            
            <div class="bg-gray-50 w-full rounded-3xl p-6 border border-gray-100 mb-8 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-16 h-16 bg-green-100 rounded-bl-full opacity-50"></div>
                
                <div class="flex justify-between items-center text-sm mb-4 pb-4 border-b border-gray-200">
                    <span class="text-gray-500">Tanggal Waktu</span>
                    <span class="font-bold text-gray-800"><?= date('d M Y, H:i') ?></span>
                </div>
                <div class="flex justify-between items-center text-sm mb-4 pb-4 border-b border-gray-200">
                    <span class="text-gray-500">No. Ref</span>
                    <span class="font-bold font-mono text-gray-800 uppercase"><?= substr($trx['id'], -8) ?></span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-gray-500">Total Dibayar</span>
                    <span class="font-black text-lg text-gray-900">Rp <?= number_format($trx['amount'], 0, ',', '.') ?></span>
                </div>
            </div>

            <button onclick="window.close()" class="w-full bg-gray-900 hover:bg-gray-800 text-white font-bold text-base py-4 rounded-2xl shadow-lg transition-all">
                Selesai & Tutup
            </button>
        </div>

    </div>

    <script>
        const trxId = "<?= $trx['id'] ?>";

        function processPayment() {
            const btn = document.getElementById('btn-pay');
            
            // Show loading state
            btn.disabled = true;
            btn.innerHTML = '<div class="loader w-6 h-6 border-4 border-white/30 rounded-full"></div> <span class="ml-2">Memproses...</span>';
            btn.classList.add('opacity-80');

            // Simulate slight delay for realism, then fire API
            setTimeout(() => {
                // Gunakan URL relatif yang aman dari masalah HTTPS/HTTP Mixed Content
                let apiUrl = "<?= base_url('api/demo/pay') ?>";
                // Jika halaman diload dengan HTTPS tapi apiUrl HTTP, paksa HTTPS
                if (window.location.protocol === 'https:' && apiUrl.startsWith('http:')) {
                    apiUrl = apiUrl.replace('http:', 'https:');
                }

                fetch(apiUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ id: trxId })
                })
                .then(async res => {
                    if (!res.ok) {
                        const text = await res.text();
                        throw new Error("HTTP error " + res.status + ": " + text);
                    }
                    return res.json();
                })
                .then(data => {
                    if(data.success) {
                        showSuccess();
                    } else {
                        alert("Gagal memproses pembayaran demo: " + (data.message || "Unknown error"));
                        btn.disabled = false;
                        btn.innerHTML = '<span>Bayar Sekarang</span>';
                        btn.classList.remove('opacity-80');
                    }
                })
                .catch(err => {
                    console.error("Fetch Error:", err);
                    alert("Terjadi kesalahan koneksi: " + err.message);
                    btn.disabled = false;
                    btn.innerHTML = '<span>Bayar Sekarang</span>';
                    btn.classList.remove('opacity-80');
                });
            }, 1500);
        }

        function showSuccess() {
            const content = document.getElementById('payment-content');
            const success = document.getElementById('success-content');
            const icon = document.getElementById('success-icon');
            
            content.classList.add('hidden');
            success.classList.remove('hidden');
            
            // Trigger reflow
            void success.offsetWidth;
            
            success.classList.add('opacity-100');
            setTimeout(() => {
                icon.classList.remove('scale-50');
                icon.classList.add('scale-100');
            }, 50);

            // Auto close window after 2.5 seconds
            setTimeout(() => {
                window.close();
            }, 2500);
        }
    </script>
</body>
</html>
