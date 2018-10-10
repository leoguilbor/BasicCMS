<?php
/**
 * @table=page
 */

class PageModel extends Dao 
{
    /**
     * @PK
     */
    public $id;
    public $name;
    public $description;
    
    public function getByName($name){

        return $this->list("name like \"".$name."\" limit 1")[""];
    }
	
}
	
	
	
	
