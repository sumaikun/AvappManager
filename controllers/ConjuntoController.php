<?php

class ConjuntoController extends ControladorBase{
     
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
        $conjunto = new Conjuntos($this->adapter);
        $conjuntos = $conjunto->getAll();
        //Cargamos la vista index y le pasamos valores
        $this->view("Conjunto",array("conjuntos"=>$conjuntos));
    }

    public function create(){
        //print_r($_POST);
        $conjunto = new Conjuntos($this->adapter);
        $id = $conjunto->last_table_id();
        $conjunto->setId($id);
        $conjunto->setNombre($_POST['nombre']);
        $conjunto->setDireccion($_POST['direccion']);
        $conjunto->setCiudad($_POST['ciudad']);
        $conjunto->setCantidad_puntos($_POST['cantidad']); 
        //echo  $conjunto->getCantidad_puntos();        
        $conjunto->save($conjunto);        
        $this->message->success('Conjunto guardado');
        $this->redirect('Conjunto');        

    }

    public function edit(){
        $conjuntom = new Conjuntos($this->adapter);
        $conjunto = $conjuntom->getById($_POST['id']);
        echo json_encode($conjunto);
    }

    public function delete(){
        $conjuntom = new Conjuntos($this->adapter);
        $conjuntom->deleteById($_GET['id']);
        $this->message->success('Conjunto eliminado');
        $this->redirect('Conjunto');        
    }

    public function update(){
        $conjunto = new Conjuntos($this->adapter);        
        $conjunto->setId($_POST['id']);
        $conjunto->setNombre($_POST['enombre']);
        $conjunto->setDireccion($_POST['edireccion']);
        $conjunto->setCiudad($_POST['eciudad']);
        $conjunto->setCantidad_puntos($_POST['ecantidad']);               
        $conjunto->update($conjunto);        
        $this->message->success('Conjunto actualizado');
        $this->redirect('Conjunto');
    }
}