<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Bank Simulator</title>
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
<body class="bg-gray-100 min-h-screen font-sans flex flex-col items-center">
    
    <div class="w-full max-w-md bg-white min-h-screen shadow-xl flex flex-col relative overflow-hidden">
        
        <!-- App Header -->
        <div class="bg-blue-600 text-white px-5 py-4 flex items-center gap-3 shadow-md z-10">
            <i class="fa-solid fa-arrow-left text-lg"></i>
            <div class="font-semibold text-lg">Konfirmasi Pembayaran</div>
        </div>

        <div id="payment-content" class="flex-1 flex flex-col">
            <!-- Merchant Info -->
            <div class="bg-blue-600 px-5 pb-8 pt-4 text-center rounded-b-3xl mb-4 relative z-0">
                <div class="w-16 h-16 bg-white rounded-full mx-auto flex items-center justify-center text-blue-600 text-2xl mb-3 shadow-lg">
                    <i class="fa-solid fa-store"></i>
                </div>
                <h2 class="text-white font-bold text-xl mb-1">KathaPayment Demo</h2>
                <p class="text-blue-100 text-sm font-medium">NMID: ID1029384756</p>
            </div>

            <div class="px-5 -mt-8 relative z-10">
                <div class="bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.12)] p-6 mb-6">
                    <div class="text-center mb-6">
                        <div class="text-gray-500 text-sm font-medium mb-1">Total Pembayaran</div>
                        <div class="text-4xl font-black text-gray-900">Rp <?= number_format($trx['amount'], 0, ',', '.') ?></div>
                    </div>
                    
                    <div class="border-t border-dashed border-gray-200 pt-4">
                        <div class="flex justify-between items-center mb-3 text-sm">
                            <span class="text-gray-500">Sumber Dana</span>
                            <span class="font-bold text-gray-800">Saldo Utama</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Biaya Admin</span>
                            <span class="font-bold text-green-600">Gratis</span>
                        </div>
                    </div>
                </div>

                <!-- Info Alert -->
                <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 flex gap-3 text-blue-700 text-sm mb-auto">
                    <i class="fa-solid fa-circle-info mt-0.5"></i>
                    <div>
                        <strong>Mode Simulasi</strong><br>
                        Ini adalah aplikasi buatan untuk mendemonstrasikan proses pembayaran QRIS. Tidak ada uang asli yang dipotong.
                    </div>
                </div>
            </div>

            <div class="mt-auto p-5 pb-8 bg-white border-t border-gray-100">
                <button id="btn-pay" onclick="processPayment()" class="w-full bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white font-bold text-lg py-4 rounded-2xl shadow-[0_8px_20px_rgba(37,99,235,0.25)] transition-all flex justify-center items-center gap-2">
                    <span>Bayar Sekarang</span>
                </button>
            </div>
        </div>

        <!-- Success State (Hidden initially) -->
        <div id="success-content" class="absolute inset-0 bg-white z-50 flex flex-col items-center justify-center p-6 hidden opacity-0 transition-opacity duration-500">
            <div class="w-24 h-24 bg-green-100 text-green-500 rounded-full flex items-center justify-center mb-6 scale-50 transition-transform duration-500" id="success-icon">
                <i class="fa-solid fa-check text-5xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Pembayaran Berhasil!</h2>
            <p class="text-gray-500 text-center mb-8">KathaPayment (Perangkat 1) seharusnya sudah menerima notifikasi sukses secara realtime saat ini juga.</p>
            
            <div class="bg-gray-50 w-full rounded-2xl p-5 border border-gray-100 mb-8">
                <div class="flex justify-between text-sm mb-3">
                    <span class="text-gray-500">Tanggal</span>
                    <span class="font-bold text-gray-800"><?= date('d M Y, H:i') ?></span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Nominal</span>
                    <span class="font-bold text-gray-800">Rp <?= number_format($trx['amount'], 0, ',', '.') ?></span>
                </div>
            </div>

            <button onclick="window.close()" class="text-blue-600 font-bold text-sm bg-blue-50 px-6 py-3 rounded-full">Tutup Simulasi</button>
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
                fetch("<?= base_url('api/demo/pay') ?>", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ id: trxId })
                })
                .then(res => res.json())
                .then(data => {
                    if(data.success) {
                        showSuccess();
                    } else {
                        alert("Gagal memproses pembayaran demo.");
                        btn.disabled = false;
                        btn.innerHTML = '<span>Bayar Sekarang</span>';
                        btn.classList.remove('opacity-80');
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert("Terjadi kesalahan koneksi.");
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
        }
    </script>
</body>
</html>
