<?php

class utils
{


    public static function deleteSession($name)
    {
        if (isset($_SESSION['$name'])) {
            $_SESSION['$name'] = null;
            unset($_SESSION[$name]);
        }

        return $name;
    }

    public static function isAdmin()
    {
        if (!isset($_SESSION['admin'])) {
            header("Location:" . BASE_URL);
        } else {
            return true;
        }
    }

    public static function showCategorias()
    {
        require_once 'models/categorias.php';
        $categoria = new Categorias();
        $categorias = $categoria->getAll();

        return $categorias;
    }

    public static function statsCarrito()
    {
        $stats = array(
            'count' => 0,
            'total' => 0
        );
        if (isset($_SESSION['carrito'])) {
            $stats['count'] = count($_SESSION['carrito']);
            if (isset($_SESSION['carrito'])) {
                foreach ($_SESSION['carrito'] as $producto) {

                    $stats['total'] += $producto['precio'] * $producto['unidades'];
                }
            }else{
                echo "Total: 0";
            }
            return $stats;
        } else {
            echo $notice = "SIN PRODUCTOS";
        }
    }
}
