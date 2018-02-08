<?php
class Puntos extends EntidadBase{
    
    private $id;
    private $nombre;
    private $conjunto;
       
     
    public function __construct($adapter) {
        $table="puntos";
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

    public function getConjunto() {
        return $this->conjunto;
    }
 
    public function setConjunto($conjunto) {
        $this->conjunto = $conjunto;
    }
}    

    
?>