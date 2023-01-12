<?php

class Usuario
{

    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;
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

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return password_hash($this->db->real_escape_string($this->pass),  PASSWORD_DEFAULT);
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function getImagen()
    {
        return $this->imagen;
    }



    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }

    public function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);
    }

    public function setPassword($password)
    {
        $this->pass = $password;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function Save()
    {
        $sql = "INSERT INTO usuarios VALUES(NULL,'{$this->getNombre()}','{$this->getApellidos()}','{$this->getEmail()}','{$this->getPassword()}','user',NULL)";

        $save = $this->db->query($sql);

        $result = false;

        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function login_usuario()
    {
        $result = false;

        $email = $this->email;
        $password = $this->pass;

        $sql = "SELECT * FROM usuarios WHERE email='$email'";
        $login_usuario = $this->db->query($sql);


        if ($login_usuario && $login_usuario->num_rows == 1) {
            $usuario = $login_usuario->fetch_object();

            $verify = password_verify($password, $usuario->pass);


            if ($verify) {
                $result = $usuario;
            }
        }
        return $result;
    }
}
