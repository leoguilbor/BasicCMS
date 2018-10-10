<?php
class Dao
{
    private  $__TABLENAME;
    private $__PK = array();
    private $__COLUMNS = array();
    
    public function __construct()
    {       
      
        $this->connect();
        $reflection = new ReflectionClass(get_class($this));
        $doc = $reflection->getDocComment();
        $tags = array();
        $pattern = '/@[table]+[ ]{0,1}=[ ]{0,1}[A-Za-z]+/';
        //get the table name
        if (preg_match_all($pattern, $doc , $tags )!=0){
            $this->setTableName(preg_replace('/@[table]+[ ]{0,1}=[ ]{0,1}/', '', $tags[0][0]));
        }

        // get the PK and the name of the columns 
        foreach ($reflection->getProperties() as $column){   
            $comment =  $column->getDocComment();
            $pattern = '/@[PK]+|@[column]+[ ]{0,1}=[ ]{0,1}[A-Za-z]+/';
            $hasColumnTag =false;

            if (preg_match_all( $pattern, $comment, $tags )>=1){         
                foreach ($tags as $tag){

                    if ($tag[0] == '@PK'){

                        $this->__PK[$column->name] = $column->name;

                    }
                    else {

                        $hasColumnTag =true;

                        $this->__COLUMNS[$column->name]= preg_replace('/@[column]+[ ]{0,1}=[ ]{0,1}/', '', $tag[0]);
          
                        if (isset($__PK[$column->name])){

                            $this->__PK[$column->name] = $this->__COLUMNS[$column->name];

                        }
                        
                    }
                }
                
            }
            if (!$hasColumnTag){
      
                $this->__COLUMNS[$column->name] = $column->name;
                          
            }
            $hasColumnTag = false;
            
        }

    }
    public function getTableName(){
        return $this->__TABLENAME;
    }
    public function getPk(){
        return $this->__PK;
    }
    public function getColumns(){
        return $this->__COLUMNS;
    }
    public function getColumnsAsString(){
        
        $string ='';
        foreach( $this->__COLUMNS as $column){
            
            $string .=$column;
            if ($column!= array_values($this->getColumns())[count($this->getColumns())-1]){
                $string.=',';
            }
            
        }
        return $string;
        
    }
    
    public function setTableName($value){
        
        $this->__TABLENAME = $value;
    }
    public function setPk($key=null,$value){
        $this->__PK[$key] = $value;
    }
    public function setColumns($key=null,$value){
        $this->__COLUMNS[$key] = $value;
    }
    public function setThis($value){
  
        foreach( $this->getColumns() as $column){
            
            eval ('$this->'.$column.' = $value[\''.$column.'\'];');
            
        }
        
    }
    
    
    public function getValues(){
        $string ='';
        $value='';
        foreach( $this->getColumns() as $column){
            
            eval ('isset($this->'.$column.')?$value = $this->'.$column.': $value= \'NULL\';');
            
            if(is_string($value) && $value != 'NULL') {
                $value = "'$value'";
            }
            $string .=$value;
            if ($column!= array_values($this->getColumns())[count($this->getColumns())-1]){
                $string.=',';
            }
        }
        return $string;
        
    } 
    
    public function getConn()
    {
        return $this->conn;
    }
    public function getDbConfig()
    {
        return $this->configDb;
    }
    public function setDbConfig()
    {
        $this->dbConfig = simplexml_load_file("Config/dbConfig.xml");
    }
    
    public function connect()
    {
        $this->setDbConfig();
        
        switch ($this->dbConfig->driver){
            case 'postgres':{
                $this->conn = pg_connect("host=$this->dbConfig->host user=$this->dbConfig->user password=$this->dbConfig->password db=$this->dbConfig->dbname");
                break;
            }
            case 'mysql':{
                $this->conn = mysqli_connect($this->dbConfig->host,$this->dbConfig->user,$this->dbConfig->password,$this->dbConfig->db) or die ("morreu");

                break;
            }
        }
        $this->selecionarBanco();
    }
    public function selecionarBanco(){
        switch ($this->dbConfig->tipoDB){
            case 'postgres':{
                break;
            }
            case 'mysql':{
                mysqli_select_db($this->dbConfig->db,$this->conn) or die ("sem conexao com o banco");
                break;
            }
        }
    }
    public function query($query){

        switch ($this->dbConfig->driver){
            case 'postgres':
                {
                    if ($rs=pg_query($query,$this->conn))
                    {
                        while($row = pg_fetch_array($rs,PGSQL_ASSOC))
                        {
                            $lista[$i]=$row;
                            $i= $i +1;
                        }
                    }else
                    {
                        echo pg_errormessage();
                    }
                    return $lista;
                    break;
                }
            case 'mysql':
                {

                    if ($rs=mysqli_query($this->conn,$query))
                    {

                        while ($row = mysqli_fetch_assoc($rs))
                        {
                            
                            $lista[$i]=$row;
                            $i= $i +1;
                        }

                    }else
                    {

                        echo mysqli_error($link);
                    }

                    return $lista;
                    break;
                }
        }
    }
    
    public function create($model)
    {
        $sql ="insert into ". $this->getTableName() ." (".$this->getColumnsAsString()." ) values (".$this->getValues().");";
        return $this->query($sql);
    }
    
    public function delete($id)
    {

        
        $sql ="delete from ".get_class($this)." where ";
        $array_pk = $this->getPkFields();
        
        if (get_class($this) == (get_class($ids))){
        
            foreach($array_pk as $field){
                $sql.= $array_fields ." = '".eval('$this->'.$field);
                if (current($array_pk)!= false){
                    $sql.= " and ";
                }
            }
        }else{
            foreach($array_pk as $field){
                $array_pk.= current($pk) ." = '".current($id)."'";
                if (current($array_pk)!= false){
                    $sql.= " and ";
                    each($id);
                }
            }            
        }
        
        return $this->query($sql);
    }
    
    public function update($model)
    {
        $sql ="update ".get_class($this)." set (";
        $array_fields = get_class_vars($this);
        
        foreach($array_fields as $field){     
            $value = $this->$field;
            
            if (is_string($value)){
                $value = "'$value'";                
            }
            $sql.= $array_fields ." = $value";
            if (current($array_fields)!= false){
                $sql.= " , ";
            }
        }
        $sql .= " ) where ";
        $array_pk = $this->getPkFields();
        foreach($array_pk as $field){
            $sql.= $field ." = '".$this->$field."'";
            if (current($array_pk)!= false){
                $sql.= " and ";
            }
        }
        
        return $this->query($sql);
    }
    
    public function getById($id){
        $response =    $this-> list("id =".$id);
        
        foreach($_COLUMNS as $column){
            $this->$column = $response[$column];
        }
        
        return $response;
    }
    
    public function list($criteria=null)
    {
        
        $sql ="Select ". $this->getColumnsAsString() ." from ". $this->getTableName();
        if ($criteria != null)
        {
            $sql .= " Where ";
            if (get_class($this) == (get_class($ids))){
                
                foreach($array_pk as $field){
                    $sql.= $array_fields ." = '".$this->$field."'";
                    if (current($array_pk)!= false){
                        $sql.= " and ";
                    }
                }
            }else{
                $sql.=$criteria;
            }
        }
//echo $sql."</br>";
        
        return $this->query($sql);
    }

}

?>