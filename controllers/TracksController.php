<?php

class TracksController {

    private $gestorControlador;

    public function __construct() {
        $this->gestorControlador = new Gestor();
    }

    public function index() {
        $productos = $this->gestorControlador->listar();
        include "views/listar.php";
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = uniqid(); 
            $nombre = $_POST['nombre'];
            $precio = $_POST['formato'];

            $producto = new Tracks($id, $nombre, $formato);
            $this->gestorControlador->agregar($productos);

            header("Location: index.php");
            exit;
        }

        include "views/crear.php";
    }

    public function editar() {
        $id = $_POST['id'] ?? null;
        $producto = $this->gestorControlador->buscar($id);

        if (!$producto) {
            echo "Producto no encontrado";
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->gestorControlador->actualizar($id, $_POST['nombre'], $_POST['formato']);
            header("Location: index.php");
            exit;
        }

        include "views/editar.php";
    }

    public function eliminar() {
        $id = $_POST['id'] ?? null;
        $this->gestorControlador->eliminar($id);
        header("Location: index.php");
        exit;
    }
}
