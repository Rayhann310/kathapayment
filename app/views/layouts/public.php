<!DOCTYPE html>
<html lang="<?= $current_lang ?? 'en' ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'KathaPayment - Enterprise Payment Gateway' ?></title>
    <link rel="icon" type="image/png" href="<?= base_url('favicon.png') ?>">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {"50":"#eff6ff","100":"#dbeafe","200":"#bfdbfe","300":"#93c5fd","400":"#60a5fa","500":"#0d6efd","600":"#0056b3","700":"#1d4ed8","800":"#1e40af","900":"#1e3a8a","950":"#172554"} // Blue from mockup
                    },
                    fontFamily: {
                        'sans': ['Inter', 'ui-sans-serif', 'system-ui', '-apple-system', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Flowbite -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <style>
        .text-gradient {
            background: linear-gradient(90deg, #0d6efd 0%, #00d2ff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body class="bg-white text-gray-900 font-sans antialiased selection:bg-primary-500 selection:text-white">

    <?php include 'public_navbar.php'; ?>

    <!-- Main Content -->
    <main class="pt-20 min-h-screen">
        <?= $content ?? '' ?>
    </main>

    <?php include 'public_footer.php'; ?>

    <!-- Flowbite Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
</html>
