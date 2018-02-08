<?php
class EntidadBase{
    private $table;
    private $db;
    private $conectar;
 
    public function __construct($table, $adapter, $model) {
        $this->table=(string) $table;
        $this->model = $model; 
        /*
        require_once 'Conectar.php';
        $this->conectar=new Conectar();
        $this->db=$this->conectar->conexion();
         */
        $this->conectar = null;
        $this->db = $adapter;
    }
     
    public function getConetar(){
        return $this->conectar;
    }
     
    public function db(){
        return $this->db;
    }
     
    public function getAll(){
        $resultSet = null;
        
        $query=$this->db->query("SELECT * FROM $this->table ORDER BY id DESC");
          
        //Devolvemos el resultset en forma de array de objetos
        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
         
        return $resultSet;
    }
     
    public function getById($id){
        $resultSet = null;
        $query=$this->db->query("SELECT * FROM $this->table WHERE id=$id");
 
        if($row = $query->fetch_object()) {
           $resultSet=$row;
        }
         
        return $resultSet;
    }
     
    public function getBy($column,$value){
        $resultSet = null;
        $query=$this->db->query("SELECT * FROM $this->table WHERE $column='$value'");
 
        while($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
         
        return $resultSet;
    }
     
    public function deleteById($id){
        $query=$this->db->query("DELETE FROM $this->table WHERE id=$id"); 
        return $query;
    }
     
    public function deleteBy($column,$value){
        $query=$this->db->query("DELETE FROM $this->table WHERE $column='$value'"); 
        return $query;
    }
     
 
    /*
     * Aquí podemos montarnos un montón de métodos que nos ayuden
     * a hacer operaciones con la base de datos de la entidad
     */

    public function executeSql($query){
        $query=$this->db()->query($query);
        if($query==true){
            if($query->num_rows>1){
                while($row = $query->fetch_object()) {
                   $resultSet[]=$row;
                }
            }elseif($query->num_rows==1){
                if($row = $query->fetch_object()) {
                    $resultSet=$row;
                }
            }else{
                $resultSet=null;
            }
        }else{
            $resultSet=false;
        }
         
        return $resultSet;
    }

    public function lists($column)
    {
        $resultSet = [];
        $query=$this->db()->query("SELECT id, $column from $this->table ");
        if($query==true){
            if($row = $query->fetch_object()) {
               $resultSet[$row->id] = $row->$column;
            }
        }
        return $resultSet;
    }

    public function last_table_id()
    {
       //echo "SELECT  max(id) as max from $this->table";
        $query = $this->executeSql("SELECT  max(id) as max from $this->table");
        //print_r($query);
         if($query->max == null)
        {
            $id=1;
        }
        else{
            $id = 1+$query->max;
        }
        return $id;
    }

    public function save($object)
    {
  
        $sql = "INSERT into $this->table ";
        $sql .= "(";
        foreach($this->model as $key => $temp)
        {
            $sql .= " ".$key.",";
        }
        $sql = substr_replace($sql, "", -1);
        $sql .= ") VALUES ( ";
        foreach($this->model as $key => $temp)
        {
            $sql .= " '".$object->{'get'.ucfirst($key)}()."',";
        }
        $sql = substr_replace($sql, "", -1);
        $sql .= ")";
        $query=$this->db()->query($sql);        
        //echo $sql;
        //var_dump(get_object_vars($this->model));
    }

    public function update($object)
    {
  
        $sql = "UPDATE $this->table ";
        $sql .= "SET";
        foreach($this->model as $key => $temp)
        {
            $sql .= " ".$key."='".$object->{'get'.ucfirst($key)}()."',";
        }
        $sql = substr_replace($sql, "", -1);
        $sql .= " WHERE id = ".$object->getId();
        $query=$this->db()->query($sql);        
        echo $sql;
        //var_dump(get_object_vars($this->model));
    }
     
}
?>