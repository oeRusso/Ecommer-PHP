<?php
require_once 'models/productos.php';
class productoController
{

    public function index()
    {
        $producto = new Productos();
        $productos = $producto->getRandomProduct(6);


        require_once 'views/productos/destacados.php';
    }

    public function verProduct()
    {
        
        // juega este
        if (isset($_GET['id'])) {

            $id = $_GET['id'];


            $producto = new Productos();

            $producto->setId($id);

            $product = $producto->getOneProduct();
        }


        require_once 'views/productos/verProduct.php';
    }

    public function gestion()
    {
        utils::isAdmin();
        $producto = new Productos();
        $productos = $producto->getAllProduct();

        require_once 'views/productos/gestion.php';
    }

    public function crearProduct()
    {
        utils::isAdmin();
        require_once 'views/productos/crearProduct.php';
    }

    public function saveProduct()
    {

        if (isset($_POST)) {

            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            // $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

            if ($categoria && $nombre && $descripcion && $precio && $stock) {
                $producto = new Productos();

                $producto->setCategoria_Id($categoria);
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                if (isset($_FILES['imagen'])) {
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];

                    if ($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {


                        if (!is_dir('uploads/images')) {
                            mkdir('uploads/images', 0777, true);
                        }

                        $producto->setImagen($filename);
                        move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
                    }
                }
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $producto->setId($id);
                    $save = $producto->Update();
                } else {
                    $save = $producto->Save();
                }

                if ($save) {
                    $_SESSION['producto'] = "Complete";
                } else {
                    $_SESSION['producto'] = "failed";
                }
            } else {
                $_SESSION['producto'] = "failed";
            }
        } else {
            $_SESSION['producto'] = "failed";
        }
        header("Location:" . BASE_URL . 'producto/gestion');
    }
    // juega este
    public function editar()
    {
        utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $edit = true;

            $producto = new Productos();

            $producto->setId($id);

            $pro = $producto->getOneProduct();

            require_once 'views/productos/crearProduct.php';
        } else {
            header("Location:" . BASE_URL . 'producto/gestion');
        }
    }

    public function eliminar()
    {

        utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new Productos();
            $producto->setId($id);

            $delete = $producto->delete();

            if ($delete) {
                $_SESSION['delete'] = 'complete';
            } else {
                $_SESSION['delete'] = 'failed';
            }
        } else {
            $_SESSION['delete'] = 'failed';
        }
        header("Location:" . BASE_URL . 'producto/gestion');
    }
}
