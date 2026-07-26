<?php

namespace App\Core;

class Controller
{
    /**
     * Load a view file and pass data to it.
     */
    protected function view($view, $data = [])
    {
        // Extract data to variables
        extract($data);
        
        $viewFile = BASE_PATH . '/app/views/' . $view . '.php';
        
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            die("View does not exist: " . $view);
        }
    }

    /**
     * Return JSON response
     */
    protected function jsonResponse($data, $statusCode = 200)
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    protected function verifyCsrf()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $_POST['csrf_token'] ?? '';
            if (empty($token) || !hash_equals($_SESSION['csrf_token'] ?? '', $token)) {
                header("HTTP/1.1 403 Forbidden");
                die("403 Forbidden - CSRF token validation failed. Please refresh the page and try again.");
            }
        }
    }
}
