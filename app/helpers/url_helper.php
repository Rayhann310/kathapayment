<?php

if (!function_exists('base_url')) {
    function base_url($path = '')
    {
        global $appConfig; // We'll load config in index.php
        
        if (!empty($appConfig['base_url'])) {
            $base_url = rtrim($appConfig['base_url'], '/');
        } else {
            // Dynamic base URL detection
            $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
            $host = $_SERVER['HTTP_HOST'];
            
            // Detect script directory. Usually something like /kathapayment/public
            $script_name = dirname($_SERVER['SCRIPT_NAME']); 
            
            // Remove /public if it exists in the script directory to get the root path
            $base_path = str_replace('\\', '/', $script_name);
            if (strpos($base_path, '/public') !== false) {
                $base_path = str_replace('/public', '', $base_path);
            }
            
            $base_url = rtrim($protocol . '://' . $host . $base_path, '/');
        }

        return $base_url . ($path ? '/' . ltrim($path, '/') : '');
    }
}

if (!function_exists('redirect')) {
    function redirect($path)
    {
        header("Location: " . base_url($path));
        exit;
    }
}
