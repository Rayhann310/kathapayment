<?php ob_start(); ?>

<div class="pt-32 pb-24 bg-gray-50/50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header & Search -->
        <div class="text-center mb-16">
            <h1 class="text-4xl font-extrabold text-[#0B1120] mb-4">FAQ</h1>
            <p class="text-lg text-gray-500 mb-10">Punya pertanyaan? Cari jawabannya di sini.</p>
            
            <div class="relative max-w-2xl mx-auto">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="fa-solid fa-search text-gray-400 text-lg"></i>
                </div>
                <input type="text" class="block w-full pl-12 pr-4 py-4 text-gray-900 bg-white border border-gray-200 rounded-2xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-shadow text-lg" placeholder="Ketik kata kunci pertanyaan...">
                <div class="absolute inset-y-0 right-2 flex items-center">
                    <button class="bg-blue-600 text-white px-6 py-2 rounded-xl font-semibold hover:bg-blue-700 transition-colors">Cari</button>
                </div>
            </div>
        </div>

        <!-- Categories -->
        <div class="flex flex-wrap justify-center gap-3 mb-12">
            <button class="px-5 py-2.5 bg-blue-600 text-white font-semibold rounded-xl text-sm shadow-sm transition-colors">Umum</button>
            <button class="px-5 py-2.5 bg-white text-gray-600 border border-gray-200 font-semibold rounded-xl text-sm hover:bg-gray-50 transition-colors">Akun & Merchant</button>
            <button class="px-5 py-2.5 bg-white text-gray-600 border border-gray-200 font-semibold rounded-xl text-sm hover:bg-gray-50 transition-colors">Pembayaran</button>
            <button class="px-5 py-2.5 bg-white text-gray-600 border border-gray-200 font-semibold rounded-xl text-sm hover:bg-gray-50 transition-colors">Settlement & Pencairan</button>
            <button class="px-5 py-2.5 bg-white text-gray-600 border border-gray-200 font-semibold rounded-xl text-sm hover:bg-gray-50 transition-colors">Keamanan</button>
        </div>

        <!-- Accordions -->
        <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden mb-16">
            
            <!-- Item 1 -->
            <div class="border-b border-gray-100 p-6">
                <button class="w-full text-left flex justify-between items-center group">
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition-colors">Apa itu KathaPayment?</h3>
                    <i class="fa-solid fa-minus text-blue-600"></i>
                </button>
                <div class="mt-4 text-gray-600 leading-relaxed pr-8">
                    KathaPayment adalah payment gateway modern yang membantu bisnis di Indonesia menerima pembayaran online secara mudah, aman, dan cepat. Kami menyediakan berbagai metode pembayaran mulai dari QRIS, Virtual Account, hingga E-Wallet dalam satu integrasi.
                </div>
            </div>

            <!-- Item 2 -->
            <div class="border-b border-gray-100 p-6">
                <button class="w-full text-left flex justify-between items-center group">
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition-colors">Bagaimana cara mendaftar akun?</h3>
                    <i class="fa-solid fa-plus text-gray-400 group-hover:text-blue-600 transition-colors"></i>
                </button>
            </div>

            <!-- Item 3 -->
            <div class="border-b border-gray-100 p-6">
                <button class="w-full text-left flex justify-between items-center group">
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition-colors">Apakah KathaPayment mengenakan biaya bulanan?</h3>
                    <i class="fa-solid fa-plus text-gray-400 group-hover:text-blue-600 transition-colors"></i>
                </button>
            </div>

            <!-- Item 4 -->
            <div class="border-b border-gray-100 p-6">
                <button class="w-full text-left flex justify-between items-center group">
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition-colors">Berapa lama proses settlement dana?</h3>
                    <i class="fa-solid fa-plus text-gray-400 group-hover:text-blue-600 transition-colors"></i>
                </button>
            </div>

            <!-- Item 5 -->
            <div class="p-6">
                <button class="w-full text-left flex justify-between items-center group">
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition-colors">Apa saja syarat dokumen untuk aktivasi merchant?</h3>
                    <i class="fa-solid fa-plus text-gray-400 group-hover:text-blue-600 transition-colors"></i>
                </button>
            </div>

        </div>

        <!-- Help Box -->
        <div class="bg-blue-600 rounded-3xl p-8 sm:p-12 text-center text-white relative overflow-hidden shadow-lg">
            <div class="relative z-10">
                <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl">
                    <i class="fa-regular fa-life-ring"></i>
                </div>
                <h3 class="text-2xl font-bold mb-3">Masih punya pertanyaan?</h3>
                <p class="text-blue-100 mb-8 max-w-lg mx-auto">Jika Anda tidak menemukan jawaban yang Anda cari, jangan ragu untuk menghubungi tim support kami yang selalu siap membantu Anda.</p>
                <div class="flex justify-center gap-4">
                    <a href="#" class="px-6 py-3 bg-white text-blue-600 font-bold rounded-xl hover:bg-gray-50 transition-colors">
                        Hubungi Tim Support
                    </a>
                </div>
            </div>
            
            <!-- Decoration -->
            <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-blue-500 rounded-full opacity-50 blur-2xl"></div>
            <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-40 h-40 bg-blue-700 rounded-full opacity-50 blur-2xl"></div>
        </div>

    </div>
</div>

<script>
    // Simple script to toggle accordions for demonstration
    document.querySelectorAll('.group').forEach(button => {
        button.addEventListener('click', () => {
            const icon = button.querySelector('i');
            const content = button.nextElementSibling;
            
            if (icon.classList.contains('fa-plus')) {
                icon.classList.remove('fa-plus', 'text-gray-400');
                icon.classList.add('fa-minus', 'text-blue-600');
                if(content && content.tagName === 'DIV') content.classList.remove('hidden');
            } else {
                icon.classList.remove('fa-minus', 'text-blue-600');
                icon.classList.add('fa-plus', 'text-gray-400');
                if(content && content.tagName === 'DIV') content.classList.add('hidden');
            }
        });
    });
</script>

<?php 
$content = ob_get_clean(); 
include BASE_PATH . '/app/views/layouts/public.php'; 
?>
