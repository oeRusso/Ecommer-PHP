<?php

class Categorias
{

    private $id;
    private $nombre;
    private $db;

    public function __construct()
    {
        $this->db = database::connect();
    }


    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function getAll()
    {
        $categorias = $this->db->query("SELECT*FROM categorias ORDER BY id DESC");
        return $categorias;

    }

    public function getOneCategories()
    {
        $id=$this->getId();
        $categoria = $this->db->query("SELECT*FROM categorias WHERE id=$id");
        return $categoria->fetch_object();

    }


    public function Save()
    {
        $sql = "INSERT INTO categorias VALUES(NULL,'{$this->getNombre()}')";

        $save = $this->db->query($sql);

        $result = false;

        if ($save) {
            $result = true;
        }

        return $result;
    }

}
