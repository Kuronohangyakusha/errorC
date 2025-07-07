<?php 
namespace Vendor\Challenge3\database;

class Database {
    private static ?Database $instance = null;
    private ?\PDO $pdo = null;
    
    private string $host;
    private string $db_name;
    private string $username;
    private string $password;

    private function __construct() {
        $this->host = $_ENV['DB_HOST'] ?? 'localhost';
        $this->db_name = $_ENV['DB_NAME'] ?? 'Auchan';
        $this->username = $_ENV['DB_USERNAME'] ?? 'ciara';
        $this->password = $_ENV['DB_PASSWORD'] ?? 'ciara222';
        
        $this->connect();
    }

    private function connect(): void {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4";
            $options = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES => false,
            ];
            
            $this->pdo = new \PDO($dsn, $this->username, $this->password, $options);
        } catch(\PDOException $exception) {
            error_log("Database connection error: " . $exception->getMessage());
            throw new \Exception("Database connection failed: " . $exception->getMessage());
        }
    }

    public static function getInstance(): Database {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function getConnection(): \PDO {
        return self::getInstance()->pdo;
    }

     
    private function __clone() {}

    
    public function __wakeup() {
        throw new \Exception("impossible");
    }
}