<?php

/**
 * KathaPayment v1.0 - Enterprise Payment Gateway
 * Single Entry Point (Front Controller)
 */

// Define absolute path to project root
// CSRF Protection Helpers
function csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function csrf_field() {
    return '<input type="hidden" name="csrf_token" value="' . csrf_token() . '">';
}

define('BASE_PATH', dirname(__DIR__));

// Enable error reporting for development (disable in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start session
session_start();

// Load Configuration
$appConfig = require BASE_PATH . '/config/app.php';

// Load Helpers
require_once BASE_PATH . '/app/helpers/url_helper.php';

// Very basic autoloader for Core, Controllers, Models, etc.
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = BASE_PATH . '/app/';
    $len = strlen($prefix);
    
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    
    $relative_class = substr($class, $len);
    
    // Convert relative class to array
    $parts = explode('\\', $relative_class);
    
    // Lowercase all folder names, keep the class name as is
    for ($i = 0; $i < count($parts) - 1; $i++) {
        $parts[$i] = strtolower($parts[$i]);
    }
    
    $file = $base_dir . implode('/', $parts) . '.php';
    
    if (file_exists($file)) {
        require $file;
    }
});

// Initialize Router
$router = new \App\Core\Router();

// Load routes
require_once BASE_PATH . '/routes/web.php';
require_once BASE_PATH . '/routes/api.php';

// Dispatch Router
$router->dispatch();
