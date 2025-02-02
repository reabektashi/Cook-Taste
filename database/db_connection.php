<?php
class DatabaseConnection {
    private $server = "127.0.0.1:3307";
    private $username = "root";
    private $password = "";
    private $database = "cook_taste"; 
    private $conn;

    public function startConnection() {
        try {
            $this->conn = new PDO("mysql:host=$this->server;dbname=$this->database", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            echo "Lidhja me bazën e të dhënave dështoi! " . $e->getMessage();
            return null;
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>