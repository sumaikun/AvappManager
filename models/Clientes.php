<?php
class Clientes extends EntidadBase{
    
    private $id;
    private $nombre;
    private $cedula;
    private $conjunto;
    private $servicio;
       
     
    public function __construct($adapter) {
        $table="clientes";
        parent::__construct($table, $adapter,get_class_vars(get_class($this)));
    }
     
    public function getId() {
        return $this->id;
    }
 
    public function setId($id) {
        $this->id = $id;
    }
     
    public function getNombre() {
        return $this->nombre;
    }
 
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getCedula() {
        return $this->cedula;
    }
 
    public function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    public function getConjunto() {
        return $this->conjunto;
    }
 
    public function setConjunto($conjunto) {
        $this->conjunto = $conjunto;
    }

    public function getServicio() {
        return $this->servicio;
    }
 
    public function setServicio($servicio) {
        $this->servicio = $servicio;
    }
 
    /*public function save(){
        
        $query="INSERT INTO conjuntos (id,nombre,direccion,ciudad,cantidad_puntos)
                VALUES(".$this->id.",
                       '".$this->nombre."',
                       '".$this->direccion."',
                       '".$this->ciudad."',
                       '".$this->cantidad_puntos."'
                       );";
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }

    public function update(){
        
        $query="UPDATE carreras SET nombre = '".$this->nombre."' , nombre = '".$this->direccion."' , nombre = '".$this->ciudad."' , nombre = '".$this->cantidad_puntos."'  WHERE id = ".$this->id." ";
        //echo $query;
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }*/

    
 
}
?>