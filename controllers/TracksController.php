<?php

class TracksController {

    private $gestor;

    public function __construct() {
        $this->gestor = new Gestor();
    }

    public function index() {
        $productos = $this->gestor->listar();
        include "views/listar.php";
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $formato = $_POST['formato'];
            $producto = new Tracks($id, $nombre, $formato);
            $this->gestor->agregar($producto);  
            header("Location: index.php");
            exit;
        }

        include "views/crear.php";
    }

    public function editar() {
        $id = $_POST['id'] ?? null;
        $producto = $this->gestor->buscar($id);

        if (!$producto) {
            echo "Producto no encontrado";
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->gestor->actualizar($id, $_POST['nombre'], $_POST['formato']);
            header("Location: index.php");
            exit;
        }

        include "views/editar.php";
    }

    public function eliminar() {
        $id = $_POST['id'] ?? null;
        $this->gestor->eliminar($id);
        header("Location: index.php");
        exit;
    }
}
