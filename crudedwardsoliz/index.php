<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "config/database.php";
require_once "modelo/librodao.php";
require_once "controlador/librocontroller.php";

$database = new Database();
$conexion = $database->conectar();

$dao = new LibroDao($conexion);
$controller = new LibroController($dao);

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'nuevo': $controller->nuevo(); break;
    case 'guardar': $controller->guardar(); break;
    case 'editar': $controller->editar(); break;
    case 'actualizar': $controller->actualizar(); break;
    case 'eliminar': $controller->eliminar(); break;
    default: $controller->index(); break;
}
?>