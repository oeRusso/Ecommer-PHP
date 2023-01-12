<?php

require_once 'models/categorias.php';
require_once 'models/productos.php';

class categoriaController
{

    public function index()
    {

        utils::isAdmin();
        $categoria = new Categorias();
        $categorias = $categoria->getAll();


        require_once 'views/categorias/index.php';
    }

    public function verCategorias()
    {

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $categoria = new Categorias();
            $categoria->setId($id);
            $categoria = $categoria->getOneCategories();

            $producto = new Productos();
            $producto->setCategoria_Id($id);
            $productos = $producto->getAllCategory();
        }

        require_once 'views/categorias/verCategorias.php';
    }

    public function crear()
    {

        utils::isAdmin();
        require_once 'views/categorias/crear.php';
    }

    public function save()
    {
        utils::isAdmin();

        if (isset($_POST) && isset($_POST['nombre'])) {
            $categoria = new Categorias();
            $categoria->setNombre($_POST['nombre']);
            $categoria->Save();
        }

        header("Location:" . BASE_URL . "categoria/index");
    }
}
