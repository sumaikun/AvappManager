<?php

class ClientesController extends ControladorBase{
     
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
        $cliente = new Clientes($this->adapter);
        $clientes = $cliente->getAll();
        $conjunto = new conjuntos($this->adapter);
        $conjuntos = $conjunto->lists('nombre'); 
        $servicio = new Puntos($this->adapter);
        $servicios = $servicio->lists('nombre');        
        //Cargamos la vista index y le pasamos valores
        $this->view("Clientes",array("clientes"=>$clientes,"conjuntos"=>$conjuntos,"servicios"=>$servicios));
    }

    public function create()
    {
        //print_r($_POST);
        $cliente = new Clientes($this->adapter);
        $id = $cliente->last_table_id();
        $cliente->setId($id);
        $cliente->setNombre($_POST['nombre']);
        $cliente->setCedula($_POST['cedula']);
        $cliente->setConjunto($_POST['conjunto_id']);
        $cliente->setServicio($_POST['punto_id']); 
        //echo  $conjunto->getCantidad_puntos();        
        $cliente->save($cliente);        
        $this->message->success('Cliente guardado');
        $this->redirect('Clientes');
    }

    public function edit()
    {
        $clientem = new Clientes($this->adapter);
        $cliente = $clientem->getById($_POST['id']);
        echo json_encode($cliente);
    }

    public function update()
    {
        //echo "update";
        //exit;
        //print_r($_POST);
        //exit;
        $cliente = new Clientes($this->adapter);        
        $cliente->setId($_POST['id']);
        $cliente->setNombre($_POST['enombre']);
        $cliente->setCedula($_POST['ecedula']);
        $cliente->setConjunto($_POST['econjunto_id']);
        $cliente->setServicio($_POST['epunto_id']);               
        $cliente->update($cliente);        
        $this->message->success('Cliente actualizado');
        $this->redirect('Clientes');
    }

    public function delete()
    {
        $clientem = new Clientes($this->adapter);
        $clientem->deleteById($_GET['id']);
        $this->message->success('Cliente eliminado');
        $this->redirect('Clientes');  
    }
}