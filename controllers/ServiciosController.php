<?php

class ServiciosController extends ControladorBase{
     
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
         
       
        //Cargamos la vista index y le pasamos valores
        $this->view("Servicios");
    }
}