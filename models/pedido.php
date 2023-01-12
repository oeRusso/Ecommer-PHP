<?php

class Pedidos
{

    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;

    private $db;

    public function __construct()
    {
        $this->db = database::connect();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsuario_Id()
    {
        return $this->usuario_id;
    }

    public function getProvincia()
    {
        return $this->provincia;
    }

    public function getLocalidad()
    {
        return $this->localidad;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getCoste()
    {
        return $this->coste;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getHora()
    {
        return $this->hora;
    }


    public function setId($id)
    {
        $this->id = $id;
    }

    public function setUsuario_Id($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }

    public function setProvincia($provincia)
    {
        $this->provincia = $this->db->real_escape_string($provincia);
    }

    public function setLocalidad($localidad)
    {
        $this->localidad = $this->db->real_escape_string($localidad);
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    public function setCoste($coste)
    {
        $this->coste = $coste;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function setHora($hora)
    {
        $this->hora = $hora;
    }


    public function getAllProduct()
    {
        $productos = $this->db->query("SELECT*FROM pedidos ORDER BY id DESC");
        return $productos;
    }

    public function getOneProduct()
    {
        // juega este
        $id = $this->getId();
        $sql = "SELECT*FROM pedidos WHERE id = $id";
        $producto = $this->db->query($sql);

        return $producto->fetch_object();
    }


    public function Save()
    {
        $usuario_id = $this->getUsuario_Id();
        $provincia = $this->getProvincia();
        $localidad = $this->getLocalidad();
        $direccion = $this->getDireccion();
        $coste = $this->getCoste();


        $sql = "INSERT INTO pedidos VALUES('NULL',$usuario_id,'$provincia',
        '$localidad','$direccion',$coste,'CONFIRM', NOW())";

        $save = $this->db->query($sql);

        $result = false;

        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function save_Lineas_Pedidos()
    {

        $sql = "SELECT LAST_INSERT_ID() as 'Pedido'";

        $query = $this->db->query($sql);

        $pedido_id = $query->fetch_object();


        foreach ($_SESSION['carrito'] as  $elemento) {
            $producto = $elemento['producto'];

            $producto = $producto->id;
            $elemento = $elemento['unidades'];
            $insert = "INSERT INTO lineas_pedidos VALUES(NULL,$pedido_id,$producto , $elemento)";
            var_dump($insert);
            die;

            $save = $this->db->query($insert);
        }

        $result = false;

        if ($save) {
            $result = true;
        }

        return $result;
    }
}
