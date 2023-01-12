<?php

class Productos
{

    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;

    private $db;

    public function __construct()
    {
        $this->db = database::connect();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCategoria_Id()
    {
        return $this->categoria_id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function getOferta()
    {
        return $this->oferta;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getImagen()
    {
        return $this->imagen;
    }


    public function setId($id)
    {
        $this->id = $id;
    }

    public function setCategoria_Id($categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    public function setPrecio($precio)
    {
        $this->precio = $this->db->real_escape_string($precio);
    }

    public function setStock($stock)
    {
        $this->stock = $this->db->real_escape_string($stock);
    }

    public function setOferta($oferta)
    {
        $this->oferta = $this->db->real_escape_string($oferta);
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function getAllCategory()
    {
        $id = $this->getCategoria_id();
        $sql = "SELECT p.*, c.nombre AS 'catnombre' FROM productos p INNER JOIN categorias c ON c.id=p.categoria_id WHERE p.categoria_id=$id ORDER BY id DESC";
        $productos = $this->db->query($sql);
        return $productos;
    }

    public function getAllProduct()
    {
        $productos = $this->db->query("SELECT*FROM productos ORDER BY id DESC");
        return $productos;
    }


    public function getRandomProduct($limit)
    {
        $productos = $this->db->query("SELECT*FROM productos ORDER BY RAND() LIMIT $limit ");
        return $productos;
    }

    public function getOneProduct()
    {
        // juega este
        $id = $this->getId();
        $sql = "SELECT*FROM productos WHERE id = $id";
        $producto = $this->db->query($sql);

        

        return $producto->fetch_object();
    }


    public function Save()
    {
        $sql = "INSERT INTO productos VALUES(NULL,{$this->getCategoria_Id()},'{$this->getNombre()}',
        '{$this->getDescripcion()}',{$this->getPrecio()},{$this->getStock()},NULL, CURDATE(),'{$this->getImagen()}')";

        $save = $this->db->query($sql);

        $result = false;

        if ($save) {
            $result = true;
        }

        return $result;
    }
    // juega este tambien 
    public function Update()
    {
        $categoria = $this->getCategoria_Id();
        $nombre = $this->getNombre();
        $descripcion = $this->getDescripcion();
        $precio = $this->getPrecio();
        $stock = $this->getStock();
        $imagen = $this->getImagen();
        $id = $this->getId();

        $sql = "UPDATE productos SET categoria_id='$categoria',nombre= '$nombre', descripcion='$descripcion',precio=$precio ,stock='$stock',imagen='$imagen' WHERE id= $id";


        $save = $this->db->query($sql);


        $result = false;

        if ($save) {

            $result = true;
        }

        return $result;
        var_dump($result);
        die;
    }


    public function delete()
    {
        $sql = "DELETE FROM productos WHERE id = {$this->id} ";
        $delete = $this->db->query($sql);

        $result = false;

        if ($delete) {
            $result = true;
        }

        return $result;
    }
}
