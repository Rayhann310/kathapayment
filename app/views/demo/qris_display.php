<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Demo - QRIS Display</title>
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
    <div class="flex-1 flex items-center justify-center p-4">
        <div class="max-w-md w-full bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
            <!-- Header -->
            <div id="status-header" class="bg-[#00529C] px-6 py-8 text-center transition-colors duration-500">
                <h2 class="text-white text-xl font-bold mb-1">Pindai QRIS untuk Bayar</h2>
                <p class="text-blue-100 text-sm">Gunakan kamera HP Anda untuk memindai</p>
            </div>
            
            <div class="p-8 pb-10 flex flex-col items-center">
                <!-- QR Wrapper -->
                <div id="qr-wrapper" class="p-3 bg-white rounded-2xl shadow-sm border border-gray-200 mb-6 relative transition-all duration-500">
                    <div id="qrcode"></div>
                    
                    <!-- Success Overlay (Hidden by default) -->
                    <div id="success-overlay" class="absolute inset-0 bg-white/90 backdrop-blur-sm rounded-2xl flex flex-col items-center justify-center opacity-0 pointer-events-none transition-opacity duration-500">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center text-green-500 mb-3 shadow-sm transform scale-50 transition-transform duration-500" id="success-icon">
                            <i class="fa-solid fa-check text-3xl"></i>
                        </div>
                        <p class="font-bold text-gray-800">Berhasil!</p>
                    </div>
                </div>

                <div class="text-center w-full">
                    <div class="text-gray-400 text-xs font-semibold uppercase tracking-wider mb-1">Total Pembayaran</div>
                    <div class="text-3xl font-black text-gray-900 mb-6">Rp <?= number_format($amount, 0, ',', '.') ?></div>
                    
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl border border-gray-100 text-sm mb-4">
                        <span class="text-gray-500 font-medium">Merchant</span>
                        <span class="font-bold text-gray-800">Demo Store</span>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl border border-gray-100 text-sm">
                        <span class="text-gray-500 font-medium">ID Transaksi</span>
                        <span class="font-bold text-gray-800 uppercase text-xs"><?= substr($id, -8) ?></span>
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
            fetch("<?= base_url('api/demo/status?id=') ?>" + trxId)
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'paid') {
                        clearInterval(pollingInterval);
                        showSuccess();
                    }
                })
                .catch(err => console.error(err));
        }, 2000);

        function showSuccess() {
            // Change header
            const header = document.getElementById('status-header');
            header.classList.remove('bg-[#00529C]');
            header.classList.add('bg-green-500');
            header.innerHTML = '<h2 class="text-white text-xl font-bold mb-1">Pembayaran Diterima</h2><p class="text-green-100 text-sm">Terima kasih atas simulasi ini!</p>';
            
            // Show overlay
            const overlay = document.getElementById('success-overlay');
            const icon = document.getElementById('success-icon');
            overlay.classList.remove('opacity-0', 'pointer-events-none');
            overlay.classList.add('opacity-100');
            
            setTimeout(() => {
                icon.classList.remove('scale-50');
                icon.classList.add('scale-100');
            }, 100);
            
            // Redirect after 5s
            setTimeout(() => {
                window.location.href = "<?= base_url() ?>";
            }, 5000);
        }
    </script>
</body>
</html>
