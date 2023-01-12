<?php

require_once 'models/productos.php';

class carritoController
{


    public function index()
    {

        if (isset($_SESSION['carrito'])) {
            $carrito = $_SESSION['carrito'];
            require_once 'views/carrito/index.php';

        } else {

            echo  "<strong class='alert-red'>FALTA ASIGNARLE UN PRODUCTO</strong>";
        }
    }

    public function add()
    {
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        } else {
            header("Location:" . BASE_URL);
        }

        if (isset($_SESSION['carrito'][$producto_id])) {

            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {

                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $counter++;
                }
            }
        }
        if (!isset($counter) || $counter == 0) {

            $producto = new Productos();
            $producto->setId($producto_id);
            $producto = $producto->getOneProduct();

            if (is_object($producto)) {
                $_SESSION['carrito'][$producto_id]  = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto

                );
            }
        }
        header("Location:" . BASE_URL . "carrito/index");
    }

    public function remove()
    {
    }

    public function deleteAll()
    {

        unset($_SESSION['carrito']);
        header("Location:" . BASE_URL . "carrito/index");
    }
}
