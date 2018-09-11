<?php
/**
 * @table=header
 */
class HeaderModel extends Dao 
{
    /**
     * @PK
     */
    public $id;
	public $name;
	public $title;
	public $active;
	public $html;
	
	public function getFirstActiveHeader(){
	    $x = $this->list("active=1 limit 1");
	    
	    $this->setThis($x['']);


	}

	
	public function getHeader($id){
	    $this->setThis($this->list("id=$id")[0]);
	    
	}

}
	
	
	
	
