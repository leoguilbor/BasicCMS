<?php
/**
 * @table=footer
 */
class FooterModel extends Dao 
{
    /**
     * @PK
     */
    public $id;
	public $name;
	public $title;
	public $active;
	public $html;
	
	public function getFirstActiveFooter(){
	    $x = $this->list("active=1 limit 1");
	    
	    $this->setThis($x['']);


	}

	
	public function getFooter($id){
	    $this->setThis($this->list("id=$id")[0]);
	    
	}

}
	
	
	
	
