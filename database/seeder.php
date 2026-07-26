<?php

/**
 * KathaPayment v1.0 - Database Seeder
 */

define('BASE_PATH', dirname(__DIR__));

spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = BASE_PATH . '/app/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) return;
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) require $file;
});

use App\Models\UserModel;

$userModel = new UserModel();

$data = [
    'name' => 'Administrator',
    'email' => 'admin@katha.com',
    'password' => 'password123',
    'role' => 'super_admin'
];

echo "Seeding Admin user...\n";

// Check if exists
if ($userModel->findByEmail($data['email'])) {
    echo "Admin user already exists.\n";
} else {
    if ($userModel->create($data)) {
        echo "Admin user created successfully!\n";
        echo "Email: admin@katha.com\n";
        echo "Password: password123\n";
    } else {
        echo "Failed to create Admin user.\n";
    }
}

// Seed a dummy merchant for testing API
$db = \App\Providers\Database::getInstance()->getConnection();
$merchantId = '123-dummy-merchant-id';
$stmt = $db->prepare("SELECT id FROM merchants WHERE id = ?");
$stmt->execute([$merchantId]);
if (!$stmt->fetch()) {
    $db->prepare("
        INSERT INTO merchants (id, user_id, merchant_id, name, public_key, secret_key, webhook_secret, status) 
        VALUES (?, ?, 'M-12345', 'Dummy Store', 'pk_test_dummy', 'sk_test_dummy', 'whsec_dummy', 'active')
    ")->execute([$merchantId, $userModel->findByEmail('admin@katha.com')['id'] ?? '']);
    
    // Seed wallet
    $walletModel = new \App\Models\WalletModel();
    $walletModel->createOrGetWallet('merchant', $merchantId);
    
    echo "Dummy Merchant & Wallet created successfully!\n";
} else {
    echo "Dummy Merchant already exists.\n";
}
