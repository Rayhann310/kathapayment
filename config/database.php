<?php

/**
 * Basic .env parser helper
 * Since this is a custom framework without Composer's dotenv by default,
 * we will load .env if it exists in the root directory.
 */
$envFile = dirname(__DIR__) . '/.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        list($name, $value) = explode('=', $line, 2);
        putenv(trim($name) . '=' . trim($value));
    }
}

return [
    'host'     => getenv('DB_HOST') ?: '127.0.0.1',
    'port'     => getenv('DB_PORT') ?: '3306',
    'database' => getenv('DB_NAME') ?: 'kathapayment_db', 
    'username' => getenv('DB_USER') ?: 'root',            
    'password' => getenv('DB_PASS') !== false ? getenv('DB_PASS') : '',                
    'charset'  => 'utf8mb4',
];
