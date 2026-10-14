<?php
require_once "modelo/libro.php";
require_once "modelo/librodao.php";

class LibroController
{
    private $dao;

    public function __construct($dao)
    {
        $this->dao = $dao;
    }

    public function index()
    {
        $libros = $this->dao->listar();
        require "vista/productos/index.php";
    }

    public function nuevo()
    {
        $libro = new Libro();
        require "vista/productos/formulario.php";
    }

    public function guardar()
    {
        $libro = new Libro();
        $libro->setTitulo($_POST["titulo"]);
        $libro->setGenero($_POST["genero"]);
        $libro->setAutor($_POST["autor"]);
        $libro->setEditorial($_POST["editorial"]);
        $libro->setFotoportada($_POST["fotoportada"]);
        $this->dao->insertar($libro);
        header("Location: index.php");
        exit;
    }

    public function editar()
    {
        $id = $_GET["id"];
        $libro = $this->dao->buscarPorId($id);
        require "vista/productos/formulario.php";
    }

    public function actualizar()
    {
        $libro = new Libro();
        $libro->setIdLibro($_POST["id_libro"]); // <-- Línea 49. Ya no dará error.
        $libro->setTitulo($_POST["titulo"]);
        $libro->setGenero($_POST["genero"]);
        $libro->setAutor($_POST["autor"]);
        $libro->setEditorial($_POST["editorial"]);
        $libro->setFotoportada($_POST["fotoportada"]);
        $this->dao->actualizar($libro);
        header("Location: index.php");
        exit;
    }

    public function eliminar()
    {
        $id = $_GET["id"];
        $this->dao->eliminar($id);
        header("Location: index.php");
        exit;
    }
}
?>