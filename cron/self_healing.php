<?php

/**
 * KathaPayment v1.0 - Cron Script for Self Healing
 * This script is meant to be run via a Cron Job (e.g., every 5 minutes).
 * Command: php /path/to/kathapayment/cron/self_healing.php
 */

define('BASE_PATH', dirname(__DIR__));

// Basic autoloader for our script
spl_autoload_register(function ($class) {
    // Convert namespace to full file path
    $prefix = 'App\\';
    $base_dir = BASE_PATH . '/app/';
    
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    
    if (file_exists($file)) {
        require $file;
    }
});

// Run Self Healing checks
$healer = new \App\Services\SelfHealingService();
$healer->runAllChecks();
