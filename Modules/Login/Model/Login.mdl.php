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
	public $usuario;
	public $senha;


	
	
	
	public function verificarSenhaUsuario($usuario,$senha){

		$criteria = "login = '".$usuario."' and senha = '".$senha."'";
		$lista =$this->listar($criteria);
		
		if (count($lista)== 1)
		{
			return true;
		}
		else 
		{
			return false;
		} 
	}
}
	
	
	
	
