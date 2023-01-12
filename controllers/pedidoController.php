<?php

require_once 'models/pedido.php';

class pedidoController
{

    public function hacerPedido()
    {

        require_once 'views/pedidos/hacerPedidos.php';
    }

    public function addPedido()
    {

        if (isset($_SESSION['identity'])) {
            $usuario_id = $_SESSION['identity']->id;

            $provincia = isset($_POST['provincia']) ?  $_POST['provincia'] : false;
            $localidad = isset($_POST['localidad']) ?  $_POST['localidad'] : false;
            $direccion = isset($_POST['direccion']) ?  $_POST['direccion'] : false;

            if ($provincia && $localidad && $direccion) {

                $stats = utils::statsCarrito();
                $coste = $stats;

                $pedido = new Pedidos();
                $pedido->setUsuario_Id($usuario_id);
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($coste['total']);

                $save = $pedido->Save();

                $save_Lienas_Pedido = $pedido->save_Lineas_Pedidos();

                if ($save && $save_Lienas_Pedido) {
                    $_SESSION['pedido'] = 'complete';
                } else {
                    $_SESSION['pedido'] = 'failed';
                }
            } else {
                $_SESSION['pedido'] = 'failed';
            }
        } else {
            header("Location:" . BASE_URL);
        }
    }
}
