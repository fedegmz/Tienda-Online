<?php
class Categoria{
    private $id;
    private $nombre;
    private $db;

    public function __construct(){
        $this->db=Database::connect();
    }

    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }

    public function setId($id){
        return $this->id=$id;
    }

    public function setNombre($nombre){
        return $this->nombre= $this->db->real_escape_string($nombre);
    }


    public function getAllCategorias(){
        $categorias = $this->db->query("SELECT * FROM categorias ORDER BY id DESC");
        return $categorias;
    }

    public function getOneCategoria(){
        $categorias = $this->db->query("SELECT * FROM categorias WHERE id={$this->getId()} ORDER BY id DESC");
        return $categorias->fetch_object();
    }
    
    public function save(){

        $sql="INSERT INTO categorias VALUES ('NULL', '{$this->getNombre()}')";
        $save = $this->db->query($sql);
        $result=false;

        if($save){
            $result=true;
        }
        return $result;
    }
}

