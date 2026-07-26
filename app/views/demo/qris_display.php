<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Demo - QRIS Display</title>
    <link rel="icon" type="image/png" href="<?= base_url('favicon.png') ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- QR Code Generator -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
</head>
<body class="bg-gray-50 h-screen flex flex-col font-sans">
    
    <!-- Navbar -->
    <div class="bg-white border-b border-gray-100 px-6 py-4 flex items-center justify-between shadow-sm">
        <a href="<?= base_url() ?>" class="flex items-center gap-2">
            <img src="<?= base_url('assets/images/logo.png') ?>" alt="KathaPayment Logo" class="h-6">
        </a>
        <div class="text-sm text-gray-500 font-semibold bg-blue-50 px-3 py-1 rounded-full text-blue-600">
            Live Simulator
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col md:flex-row items-center justify-center p-4 gap-6 max-w-5xl mx-auto w-full">
        
        <!-- Left: Configuration Form -->
        <div class="w-full md:w-1/2 bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6"><i class="fa-solid fa-sliders text-blue-600 mr-2"></i> Konfigurasi Simulasi</h2>
            <form action="<?= base_url('demo/qris') ?>" method="GET" class="space-y-5">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Pilih Metode Pembayaran</label>
                    <select name="method" class="w-full border-gray-300 rounded-xl shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 bg-gray-50 p-3 text-gray-800">
                        <option value="QRIS" <?= $method == 'QRIS' ? 'selected' : '' ?>>QRIS (Gopay, Dana, Ovo, ShopeePay)</option>
                        <option value="BCA_VA" <?= $method == 'BCA_VA' ? 'selected' : '' ?>>BCA Virtual Account</option>
                        <option value="BNI_VA" <?= $method == 'BNI_VA' ? 'selected' : '' ?>>BNI Virtual Account</option>
                        <option value="MANDIRI_VA" <?= $method == 'MANDIRI_VA' ? 'selected' : '' ?>>Mandiri Virtual Account</option>
                        <option value="ALFAMART" <?= $method == 'ALFAMART' ? 'selected' : '' ?>>Alfamart / Indomaret</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nominal Tagihan (Rp)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-500 font-bold">Rp</div>
                        <input type="number" name="amount" min="10000" value="<?= htmlspecialchars($amount) ?>" class="w-full pl-10 border-gray-300 rounded-xl shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 bg-gray-50 p-3 text-gray-800" required>
                    </div>
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 px-4 rounded-xl shadow-lg transition-all active:scale-95">
                    Generate Skenario Baru
                </button>
            </form>
            
            <div class="mt-8 pt-6 border-t border-gray-100">
                <div class="flex gap-4">
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                        <i class="fa-solid fa-mobile-screen-button text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 text-sm mb-1">Cara Menguji Simulasi</h4>
                        <p class="text-xs text-gray-500 leading-relaxed">
                            Pilih metode dan ubah angka di atas, klik Generate, lalu <strong>Pindai QR Code</strong> di layar kanan menggunakan kamera Smartphone Anda. Di ponsel Anda akan terbuka halaman simulasi pembayaran interaktif yang sangat nyata.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right: Preview Display -->
        <div class="max-w-md w-full bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
            <!-- Header -->
            <div id="status-header" class="bg-[#00529C] px-6 py-8 text-center transition-colors duration-500">
                <h2 class="text-white text-xl font-bold mb-1">Pindai Untuk Simulasi</h2>
                <p class="text-blue-100 text-sm">Gunakan kamera HP Anda untuk membuka halaman simulasi E-Wallet / Mobile Banking</p>
            </div>
            
            <div class="p-8 pb-10 flex flex-col items-center">
                <!-- QR Wrapper -->
                <div id="qr-wrapper" class="p-3 bg-white rounded-2xl shadow-sm border border-gray-200 mb-6 relative transition-all duration-500">
                    <div id="qrcode"></div>
                    
                    <!-- Success Overlay (Hidden by default) -->
                    <div id="success-overlay" class="absolute inset-0 bg-white/90 backdrop-blur-sm rounded-2xl flex flex-col items-center justify-center opacity-0 pointer-events-none transition-opacity duration-500 z-10">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center text-green-500 mb-3 shadow-sm transform scale-50 transition-transform duration-500" id="success-icon">
                            <i class="fa-solid fa-check text-3xl"></i>
                        </div>
                        <p class="font-bold text-gray-800">Berhasil!</p>
                    </div>
                </div>

                <div class="text-center w-full">
                    <div class="text-gray-400 text-xs font-semibold uppercase tracking-wider mb-1">Total Pembayaran</div>
                    <div id="amount-display" class="text-3xl font-black text-gray-900 mb-6">Rp <?= number_format($amount, 0, ',', '.') ?></div>
                    
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl border border-gray-100 text-sm mb-3">
                        <span class="text-gray-500 font-medium">Metode Simulasi</span>
                        <span class="font-bold text-blue-600 bg-blue-50 px-2.5 py-1 rounded-md text-xs"><?= htmlspecialchars(str_replace('_', ' ', $method)) ?></span>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl border border-gray-100 text-sm">
                        <span class="text-gray-500 font-medium">ID Transaksi</span>
                        <span id="trx-id-display" class="font-bold text-gray-800 uppercase text-xs"><?= substr($id, -8) ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Instructions Modal / Toast -->
    <div class="fixed bottom-6 right-6 max-w-sm bg-white rounded-2xl p-5 shadow-2xl border border-blue-100 flex gap-4 animate-bounce">
        <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
            <i class="fa-solid fa-mobile-screen-button text-xl"></i>
        </div>
        <div>
            <h4 class="font-bold text-gray-900 text-sm mb-1">Langkah 1 dari 2</h4>
            <p class="text-xs text-gray-500 leading-relaxed">
                Silakan buka aplikasi kamera di Smartphone Anda, dan arahkan ke QR Code di tengah layar.
            </p>
        </div>
    </div>

    <script>
        const trxId = "<?= $id ?>";
        const scanUrl = "<?= $scan_url ?>";
        
        // Generate QR Code
        new QRCode(document.getElementById("qrcode"), {
            text: scanUrl,
            width: 200,
            height: 200,
            colorDark : "#0f172a",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });

        // Polling function
        let pollingInterval = setInterval(() => {
            let apiUrl = "<?= base_url('api/demo/status?id=') ?>" + trxId;
            if (window.location.protocol === 'https:' && apiUrl.startsWith('http:')) {
                apiUrl = apiUrl.replace('http:', 'https:');
            }

            fetch(apiUrl)
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'paid') {
                        clearInterval(pollingInterval);
                        showSuccess();
                    }
                })
                .catch(err => console.error(err));
        }, 1000); // Polling every 1 second for realtime feel

        function showSuccess() {
            // Toast notification
            const toast = document.createElement('div');
            toast.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-xl shadow-2xl font-bold flex items-center gap-3 animate-bounce z-50';
            toast.innerHTML = '<i class="fa-solid fa-check-circle text-xl"></i> Pembayaran Berhasil Diterima!';
            document.body.appendChild(toast);

            // Change header
            const header = document.getElementById('status-header');
            header.classList.remove('bg-[#00529C]');
            header.classList.add('bg-green-500');
            header.innerHTML = '<h2 class="text-white text-xl font-bold mb-1">Pembayaran Diterima</h2><p class="text-green-100 text-sm">Terima kasih atas simulasi ini!</p>';
            
            // Show overlay temporarily, then clear everything
            const overlay = document.getElementById('success-overlay');
            const icon = document.getElementById('success-icon');
            overlay.classList.remove('opacity-0', 'pointer-events-none');
            overlay.classList.add('opacity-100');
            
            setTimeout(() => {
                icon.classList.remove('scale-50');
                icon.classList.add('scale-100');
            }, 100);
            
            // Clear content after showing success for 3 seconds instead of redirecting
            setTimeout(() => {
                // Hapus QR Code
                document.getElementById('qr-wrapper').innerHTML = '<div class="flex flex-col items-center justify-center p-8 text-gray-400"><i class="fa-solid fa-check-circle text-5xl mb-4 text-green-500"></i><p class="font-bold text-gray-800">Transaksi Selesai</p><p class="text-sm mt-2 text-center">Silakan buat skenario baru melalui panel di samping.</p></div>';
                
                // Kosongkan nominal dan ID transaksi
                document.getElementById('amount-display').innerText = 'Rp 0';
                document.getElementById('trx-id-display').innerText = '-';
                
                // Kembalikan header ke warna netral
                header.classList.remove('bg-green-500');
                header.classList.add('bg-gray-800');
                header.innerHTML = '<h2 class="text-white text-xl font-bold mb-1">Simulasi Selesai</h2><p class="text-gray-400 text-sm">Silakan buat tagihan baru</p>';
                
                // Hilangkan flash (toast) jika masih ada
                if (toast.parentNode) {
                    toast.classList.add('opacity-0', 'transition-opacity');
                    setTimeout(() => toast.remove(), 500);
                }
            }, 3000);
        }
    </script>
</body>
</html>
