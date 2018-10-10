<?php
/**
 * @table=login
 */

class LoginModel extends Dao 
{
    /**
     * @PK
     */
    public $id;
    /**
     * 
     * @column=login
     */
	public $usuario;
	public $senha;


	
	
	
	public function authentication($usuario,$senha){

		$criteria = " login = '".$usuario."' and senha = '".$senha."'";
		
		$lista =$this->list($criteria);
		
		if (count($lista)== 1)
		{
			return true;
		}
		return false;		
		
	}
}
	
	
	
	
