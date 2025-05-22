<?php

class Conexion {
    private $host = 'localhost';
    private $db_name = 'questopia';
    private $username = 'root';
    private $password = 'SAM12345';
    private $port = 3306;
    private $charset = 'utf8mb4';

    private $pdo;

    public function __construct() {
        try {
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->db_name};charset={$this->charset}";
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            // Opciones para errores y modo de fetch
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function getConexion() {
        return $this->pdo;
    }
}
