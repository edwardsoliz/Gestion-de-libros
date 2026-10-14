<?php

class Database
{
    private $host = "localhost";
    private $port = "3306"; // <--- Puerto de MySQL Workbench
    private $db_name = "libreria"; // <--- Tu base de datos
    private $username = "root";
    private $password = "200615838984Ed"; // Si le pusiste contraseña a root, escríbela aquí

    public function conectar()
    {
        try {
            $conexion = new PDO(
                "mysql:host={$this->host};port={$this->port};dbname={$this->db_name};charset=utf8mb4",
                $this->username,
                $this->password
            );
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $conexion;

        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}