<?php

class PuntoController extends ControladorBase{
     
    public $conectar;
    public $adapter;

    public function __construct() {

        parent::__construct();
        
        require 'libraries/FlashMessages.php';  
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
        $this->message = new FlashMessages();
        
    }
     
    public function index(){         
        $punto = new Puntos($this->adapter);
        $puntos = $punto->getBy("conjunto",$_POST['id']);
        $conjunto = new conjuntos($this->adapter);
        $conjuntos = $conjunto->lists('nombre'); 
        //print_r($conjuntos);
        //Cargamos la vista index y le pasamos valores
        echo $this->view("Punto",array("puntos"=>$puntos,"conjuntos"=>$conjuntos));
    }

    public function create(){
        $punto = new Puntos($this->adapter);
        $id = $punto->last_table_id();
        $punto->setId($id);
        $punto->setNombre($_POST['referencia']);
        $punto->setConjunto($_POST['conjunto_id']);
        $punto->save($punto);        
        $this->message->success('Punto guardado');
        $this->redirect('Conjunto');
    }

    public function edit(){
       
    }

    public function delete(){
        $puntos = new Puntos($this->adapter);
        $puntos->deleteById($_GET['id']);
        $this->message->success('punto eliminado');
        $this->redirect('Conjunto'); 
    }

    public function update(){
        $punto = new Puntos($this->adapter);        
        $punto->setId($_POST['id']);
        $punto->setNombre($_POST['ereferencia']);
        $punto->setConjunto($_POST['conjunto_id']);
        $punto->update($punto);        
        $this->message->success('Punto actualizado');
        $this->redirect('Conjunto');       
    }

    public function get_by_conjunto()
    {
        $puntos = new Puntos($this->adapter);
        $punto = $puntos->getBy("conjunto",$_POST['id']);
        echo json_encode($punto);
    }
}