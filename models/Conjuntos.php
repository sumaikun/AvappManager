<?php
class Conjuntos extends EntidadBase{
    
    private $id;
    private $nombre;
    private $direccion;
    private $ciudad;
    private $cantidad_puntos;
       
     
    public function __construct($adapter) {
        $table="conjuntos";
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

    public function getDireccion() {
        return $this->direccion;
    }
 
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getCiudad() {
        return $this->ciudad;
    }
 
    public function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    public function getCantidad_puntos() {
        return $this->cantidad_puntos;
    }
 
    public function setCantidad_puntos($cantidad_puntos) {
        $this->cantidad_puntos = $cantidad_puntos;
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