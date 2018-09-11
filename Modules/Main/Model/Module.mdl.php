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

	
}
	
	
	
	
