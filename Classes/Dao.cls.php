<?php
class Dao
{
    
    public function __construct()
    {
        $this->connect();
        $reflection = ReflectionClass(get_class($this));
        $doc = $reflection->getDocComent();
        
        $tags = array();
        $pattern = '/@[w]+[ ]{0,1}=[ ]{0,1}[w]+/';
        $pk= array();
        
        if (preg_match_all( $doc, $comment, $tags )==1){
            //ainda por terminar esquema de annotation para pegar nome da tabela
        }
        
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
                        
                        while($row = mysqli_fetch_array($rs,MYSQL_ASSOC))
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
    public function values(){
        return json_encode(get_object_vars($this));
    }
    
    public function getPkFields(){
        $reflection = ReflectionClass(get_class($this));
       
        foreach (get_class_vars($this) as $field){
            $prop = ReflectionProperty($reflection,$field);
            $comment = $prop->getDocComment();
            

            $tags = array();
            $pattern = '/@PK/';
            $pk= array();
            if (preg_match_all( $pattern, $comment, $tags )==1){
                switch ($this->dbConfig->tipoDB){
                    case 'postgres':{
                        $pk[]=$field;
                        break;
                    }
                    case 'mysql':{
                        $pk[]=$field;
                        break;
                    }
                }
            }
        }

        return $pk;
    }
    
    public function create($model)
    {
        $sql ="insert into ".get_class($this)." (".get_class_vars($this)." ) values (".array_values(json_decode($model->values,true)).")";
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
            $value = eval('$this->'.$field);
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
            $sql.= $array_fields ." = '".eval('$this->'.$field);
            if (current($array_pk)!= false){
                $sql.= " and ";
            }
        }
        
        return $this->query($sql);
    }
    
    public function listar($criteria=null)
    {
        $sql ="Select * from ".get_class($this)." ";
        if ($criteria != null)
        {
            $sql .= "Where ";
            if (get_class($this) == (get_class($ids))){
                
                foreach($array_pk as $field){
                    $sql.= $array_fields ." = '".eval('$this->'.$field);
                    if (current($array_pk)!= false){
                        $sql.= " and ";
                    }
                }
            }else{
                $sql.=$criteria;
            }
        }

        return $this->query($sql);
    }
    
}

?>
