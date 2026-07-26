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
    <div class="flex-1 flex flex-col lg:flex-row items-center lg:items-start justify-center p-4 gap-6 max-w-6xl mx-auto w-full mt-2 md:mt-6">
        
        <!-- Left: Configuration Form -->
        <div class="w-full lg:w-1/3 bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 p-8 z-10">
            <h2 class="text-2xl font-bold text-gray-900 mb-6"><i class="fa-solid fa-sliders text-blue-600 mr-2"></i> Konfigurasi Simulasi</h2>
            <form action="<?= base_url('demo/qris') ?>" method="GET" class="space-y-5">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Metode Pembayaran</label>
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
                    Generate Skenario
                </button>
            </form>
            
            <div class="mt-8 pt-6 border-t border-gray-100">
                <div class="flex gap-4">
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                        <i class="fa-solid fa-mobile-screen-button text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 text-sm mb-1">Cara Menguji</h4>
                        <p class="text-xs text-gray-500 leading-relaxed">
                            Simulasi ini mendukung pembayaran via HP. Jika memilih QRIS, <strong>Pindai QR Code</strong> di layar. Jika VA, klik tombol <strong>Buka Simulator</strong>.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right: Premium Checkout UI -->
        <div class="w-full lg:w-2/3 flex flex-col md:flex-row bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100 relative min-h-[550px]">
            <!-- Background mesh effect -->
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 rounded-full bg-blue-100 blur-3xl opacity-50 z-0 pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-64 h-64 rounded-full bg-indigo-100 blur-3xl opacity-50 z-0 pointer-events-none"></div>

            <!-- Order Summary Section (Left of the right panel) -->
            <div class="w-full md:w-5/12 bg-gray-50/80 backdrop-blur border-r border-gray-100 p-8 relative z-10 flex flex-col">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white font-bold shadow-md">
                        <i class="fa-solid fa-store"></i>
                    </div>
                    <div>
                        <div class="text-sm text-gray-500 font-medium">Merchant</div>
                        <div class="font-bold text-gray-900">Katha Store</div>
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Detail Pesanan</h3>
                    
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex gap-3">
                            <div class="w-12 h-12 bg-gray-200 rounded-lg overflow-hidden shrink-0 shadow-sm border border-gray-100">
                                <img src="https://ui-avatars.com/api/?name=Katha+Product&background=00529C&color=fff&size=100" alt="Product" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <div class="font-semibold text-gray-800 text-sm">Paket Simulasi API</div>
                                <div class="text-xs text-gray-500 mt-1">Metode: <?= htmlspecialchars(str_replace('_', ' ', $method)) ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-auto border-t border-dashed border-gray-200 pt-5">
                    <div class="flex justify-between items-center text-sm mb-3 text-gray-500">
                        <span>Subtotal</span>
                        <span class="font-medium text-gray-700">Rp <?= number_format($amount, 0, ',', '.') ?></span>
                    </div>
                    <div class="flex justify-between items-center text-sm mb-5 text-gray-500">
                        <span>Biaya Admin</span>
                        <span class="text-green-600 font-bold bg-green-50 px-2 py-0.5 rounded">Gratis</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-gray-800">Total Tagihan</span>
                        <span class="text-2xl font-black text-blue-600" id="amount-display">Rp <?= number_format($amount, 0, ',', '.') ?></span>
                    </div>
                </div>
            </div>

            <!-- Payment Action Section (Right of the right panel) -->
            <div class="w-full md:w-7/12 p-8 relative z-10 flex flex-col">
                <!-- Countdown Banner -->
                <div id="countdown-banner" class="absolute top-0 left-0 right-0 bg-red-50/80 backdrop-blur-sm text-red-600 text-center py-2 text-sm font-bold flex items-center justify-center gap-2 border-b border-red-100 z-20">
                    <i class="fa-regular fa-clock"></i>
                    <span>Selesaikan dalam <span id="timer-display">05:00</span></span>
                </div>

                <!-- Trust Badges -->
                <div class="flex justify-end gap-2 mt-6 mb-6">
                    <span class="inline-flex items-center gap-1 text-[10px] uppercase font-bold tracking-wider text-gray-400 bg-gray-50 px-2 py-1 rounded border border-gray-100">
                        <i class="fa-solid fa-lock text-gray-400"></i> SSL Secure
                    </span>
                    <span class="inline-flex items-center gap-1 text-[10px] uppercase font-bold tracking-wider text-gray-400 bg-gray-50 px-2 py-1 rounded border border-gray-100">
                        <i class="fa-solid fa-shield-halved text-gray-400"></i> Verified
                    </span>
                </div>

                <!-- Header / Method Logo -->
                <div id="status-header" class="text-center mb-6 transition-colors duration-500">
                    <h2 class="text-gray-900 text-xl font-bold mb-1">
                        <?= $method === 'QRIS' ? 'Pindai QRIS' : 'Instruksi Pembayaran' ?>
                    </h2>
                    <p class="text-gray-500 text-sm">
                        <?= $method === 'QRIS' ? 'Buka aplikasi e-wallet atau m-banking Anda' : 'Gunakan Simulator HP untuk menyalin kode' ?>
                    </p>
                </div>
                
                <div class="flex flex-col items-center flex-1 justify-center w-full">
                    <!-- Visuals based on method -->
                    <?php if ($method === 'QRIS'): ?>
                        <div id="qr-wrapper" class="relative group transition-all duration-500">
                            <!-- Standard QRIS Frame Styling -->
                            <div class="bg-red-600 text-white font-black text-center py-2 rounded-t-xl text-lg tracking-widest shadow-sm">
                                QRIS
                            </div>
                            <div class="p-4 bg-white shadow-md border-x border-gray-200 flex justify-center">
                                <div id="qrcode"></div>
                            </div>
                            <div class="bg-[#00529C] text-white text-center py-2 rounded-b-xl text-xs font-semibold shadow-sm flex items-center justify-center gap-2">
                                <i class="fa-solid fa-building-columns"></i> GPN / NNS
                            </div>
                            
                            <!-- Success Overlay -->
                            <div id="success-overlay" class="absolute inset-0 bg-white/95 backdrop-blur-sm rounded-xl flex flex-col items-center justify-center opacity-0 pointer-events-none transition-opacity duration-500 z-10 border border-green-100 shadow-xl">
                                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center text-green-500 mb-4 shadow-sm transform scale-50 transition-transform duration-500" id="success-icon">
                                    <i class="fa-solid fa-check text-3xl"></i>
                                </div>
                                <p class="font-bold text-gray-800 text-lg">Berhasil!</p>
                            </div>
                        </div>
                    <?php else: ?>
                        <div id="qr-wrapper" class="w-full max-w-sm relative transition-all duration-500">
                            <div class="p-6 bg-white rounded-2xl shadow-sm border border-gray-200 text-center relative z-0">
                                <div class="w-16 h-16 bg-blue-50 rounded-full mx-auto flex items-center justify-center text-blue-600 text-2xl mb-4 shadow-inner">
                                    <i class="fa-solid <?= $method === 'ALFAMART' ? 'fa-shop' : 'fa-building-columns' ?>"></i>
                                </div>
                                <div class="text-gray-500 text-sm font-semibold mb-2">
                                    <?= $method === 'ALFAMART' ? 'Kode Pembayaran' : 'Nomor Virtual Account' ?>
                                </div>
                                <div class="text-2xl font-mono font-bold text-gray-900 tracking-wider bg-gray-50 py-3 rounded-xl border border-gray-100 mb-6">
                                    <?= $method === 'ALFAMART' ? 'KTHA' . rand(1000, 9999) : '8077' . rand(10000, 99999) ?>
                                </div>
                                <div class="flex flex-col gap-3">
                                    <a href="<?= $scan_url ?>" target="_blank" class="w-full inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 px-4 rounded-xl shadow-md transition-all active:scale-95">
                                        <i class="fa-solid fa-mobile-screen-button"></i> Buka Simulator
                                    </a>
                                    <button onclick="copySimulationLink()" class="w-full inline-flex items-center justify-center gap-2 bg-white hover:bg-gray-50 text-gray-700 border border-gray-300 font-bold py-3 px-4 rounded-xl shadow-sm transition-all active:scale-95">
                                        <i class="fa-solid fa-copy"></i> Salin Link Simulator
                                    </button>
                                </div>
                            </div>

                            <!-- Success Overlay -->
                            <div id="success-overlay" class="absolute inset-0 bg-white/95 backdrop-blur-sm rounded-2xl flex flex-col items-center justify-center opacity-0 pointer-events-none transition-opacity duration-500 z-10 border border-green-100 shadow-xl">
                                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center text-green-500 mb-4 shadow-sm transform scale-50 transition-transform duration-500" id="success-icon">
                                    <i class="fa-solid fa-check text-3xl"></i>
                                </div>
                                <p class="font-bold text-gray-800 text-lg">Berhasil!</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                
                <!-- Footer Info -->
                <div class="mt-8 text-center text-xs text-gray-400 font-medium">
                    ID Trx: <span id="trx-id-display" class="font-mono"><?= substr($id, -8) ?></span><br>
                    Powered by <strong>KathaPayment</strong>
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
        let isExpired = false;
        
        // Countdown Logic (5 minutes = 300 seconds)
        let timeLeft = 300;
        const timerDisplay = document.getElementById('timer-display');
        const countdownBanner = document.getElementById('countdown-banner');
        
        const countdownInterval = setInterval(() => {
            if (isExpired) {
                clearInterval(countdownInterval);
                return;
            }
            
            timeLeft--;
            let m = Math.floor(timeLeft / 60).toString().padStart(2, '0');
            let s = (timeLeft % 60).toString().padStart(2, '0');
            timerDisplay.innerText = m + ':' + s;
            
            if (timeLeft <= 0) {
                clearInterval(countdownInterval);
                showExpired();
            }
        }, 1000);
        
        function showExpired() {
            isExpired = true;
            clearInterval(pollingInterval);
            
            // Toast notification kedaluwarsa
            const toast = document.createElement('div');
            toast.className = 'fixed top-4 right-4 bg-red-600 text-white px-6 py-3 rounded-xl shadow-2xl font-bold flex items-center gap-3 animate-pulse z-50';
            toast.innerHTML = '<i class="fa-solid fa-circle-xmark text-xl"></i> Waktu Habis, Simulasi Dibatalkan!';
            document.body.appendChild(toast);
            
            // Hapus toast setelah 4 detik
            setTimeout(() => {
                toast.classList.add('opacity-0', 'transition-opacity');
                setTimeout(() => toast.remove(), 500);
            }, 4000);
            
            // Ubah banner
            countdownBanner.className = 'bg-red-600 text-white text-center py-2 text-sm font-bold transition-colors';
            countdownBanner.innerHTML = '<i class="fa-solid fa-circle-xmark mr-1"></i> Simulasi Kedaluwarsa';
            
            // Hapus QR / VA
            document.getElementById('qr-wrapper').innerHTML = `
                <div class="flex flex-col items-center justify-center p-8 text-gray-400">
                    <i class="fa-solid fa-clock text-5xl mb-4 text-red-500 animate-pulse"></i>
                    <p class="font-bold text-gray-800 text-lg">Waktu Habis</p>
                    <p class="text-sm mt-2 text-center text-gray-500">Skenario pembayaran ini telah dibatalkan otomatis.</p>
                </div>
            `;
            
            // Ubah header
            const header = document.getElementById('status-header');
            header.className = 'bg-gray-800 px-6 py-8 text-center transition-colors duration-500';
            header.innerHTML = '<h2 class="text-white text-xl font-bold mb-1">Dibatalkan</h2><p class="text-gray-400 text-sm">Silakan buat skenario baru</p>';
        }
    </script>

    <script>
        function copySimulationLink() {
            navigator.clipboard.writeText(scanUrl).then(() => {
                const toast = document.createElement('div');
                toast.className = 'fixed bottom-4 right-4 bg-gray-800 text-white px-4 py-2 rounded-lg shadow-lg text-sm z-50 transition-opacity duration-300';
                toast.innerHTML = '<i class="fa-solid fa-check mr-2"></i> Link tersalin!';
                document.body.appendChild(toast);
                setTimeout(() => {
                    toast.classList.add('opacity-0');
                    setTimeout(() => toast.remove(), 300);
                }, 2000);
            }).catch(err => {
                console.error('Failed to copy: ', err);
            });
        }
    </script>

    <?php if ($method === 'QRIS'): ?>
    <script>
        // Setup QR Code only if QRIS
        new QRCode(document.getElementById("qrcode"), {
            text: "<?= $scan_url ?>",
            width: 250,
            height: 250,
            colorDark: "#00529C",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
    </script>
    <?php endif; ?>

    <script>
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
            isExpired = true; // Hentikan countdown
            clearInterval(countdownInterval);
            
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
