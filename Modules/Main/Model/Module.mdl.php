<?php
/**
 * @table=module
 */

class ModuleModel extends Dao 
{
    /**
     * @PK
     */
    public $id;
    /**
     * @column=name
     * 
     */
	public $nome;
	/**
	 * @column=description
	 *
	 */
	public $descricao;

	public function getById($id){
	    return $this->list("id =".$id)[""];
	}
}
	
	
	
	
