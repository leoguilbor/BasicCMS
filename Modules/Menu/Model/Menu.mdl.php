<?php
/**
 * @table=menu
 */


class MenuModel extends Dao 
{
    /**
     * @PK
     */
    public $id;
	public $name;
	public $description;
    public $display; 
    

	public function getMenuItens($idMenu=null){
	   $itens = new MenuItensModel();
	   if ($idMenu=null){
	       return $itens->list($this->id);
	   }
	   return $itens->list($idMenu);
	}
}
	
	
	
	
