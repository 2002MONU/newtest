<?php

class Database {
    private $host = "localhost";
    private $db = "newTest";
    private $user = "root";
    private $pass = "";
    private $pdo;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        try {
            $this->pdo = new PDO(
                "mysql:host={$this->host};dbname={$this->db}",
                $this->user,
                $this->pass
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}

// Create instance and return connection
$dbInstance = new Database();
$pdo = $dbInstance->getConnection();
