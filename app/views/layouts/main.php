<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'KathaPayment Dashboard' ?></title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS (CDN for rapid prototyping as requested) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: {"50":"#eff6ff","100":"#dbeafe","200":"#bfdbfe","300":"#93c5fd","400":"#60a5fa","500":"#3b82f6","600":"#2563eb","700":"#1d4ed8","800":"#1e40af","900":"#1e3a8a","950":"#172554"}
                    }
                }
            }
        }
    </script>
    
    <!-- Flowbite -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-white" x-data="{ sidebarOpen: true, navHeight: 64 }">

    <!-- Navbar -->
    <?php if (!isset($hideNavbar) || !$hideNavbar): ?>
        <?php include BASE_PATH . '/app/views/layouts/navbar.php'; ?>
    <?php endif; ?>

    <div class="flex overflow-hidden bg-gray-50 dark:bg-gray-900 min-h-screen" 
         <?php if (!isset($hideNavbar) || !$hideNavbar): ?>
         :style="'padding-top: ' + navHeight + 'px'"
         <?php endif; ?>
         >
        
        <!-- Sidebar -->
        <?php if (!isset($hideNavbar) || !$hideNavbar): ?>
            <?php include BASE_PATH . '/app/views/layouts/sidebar.php'; ?>
        <?php endif; ?>

        <!-- Main Content -->
        <div id="main-content" 
             <?php if (!isset($hideNavbar) || !$hideNavbar): ?>
             :class="{'lg:ml-64': sidebarOpen, 'lg:ml-0': !sidebarOpen}"
             <?php endif; ?>
             class="relative w-full h-full overflow-y-auto bg-gray-50 transition-all duration-300 dark:bg-gray-900 <?= (!isset($hideNavbar) || !$hideNavbar) ? '' : '' ?>">
            
            <main class="<?= (!isset($hideNavbar) || !$hideNavbar) ? 'px-4 lg:px-8 pt-6 pb-20 max-w-[1600px] mx-auto' : '' ?>">
                
                <?= $content ?? '' ?>
                
            </main>
        </div>
    </div>

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- ApexCharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</body>
</html>
