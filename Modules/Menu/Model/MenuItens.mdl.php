<?php
/**
 * @table=menuItens
 */

class MenuItensModel extends Dao 
{
    /**
     * @PK
     */
    public $id;
	public $idMenu;
	public $name;
	public $hint;
	public $link;
    
	public function getMenuItens($idMenu){
	    return $this->list("idMenu =".$idMenu);
	}
}
	
	
	
	
