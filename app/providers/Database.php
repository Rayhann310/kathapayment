<?php

namespace App\Providers;

use PDO;
use PDOException;

class Database
{
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        $config = require BASE_PATH . '/config/database.php';
        
        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['database']};charset={$config['charset']}";
        
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->connection = new PDO($dsn, $config['username'], $config['password'], $options);
        } catch (PDOException $e) {
            // Error 1049 is "Unknown database"
            if ($e->getCode() == 1049) {
                if (\App\Services\SelfHealingService::autoCreateDatabase($config)) {
                    // Retry connection after creation
                    $this->connection = new PDO($dsn, $config['username'], $config['password'], $options);
                } else {
                    die("Database connection failed and auto-creation failed.");
                }
            } else {
                // For production, log this instead of displaying
                die("Database connection failed: " . $e->getMessage());
            }
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
