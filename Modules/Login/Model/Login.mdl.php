<?php
class Login extends Dao
{
    /*
     * @PK
     */
	public $id;
	
    public $login;
	public $senha;
	
	public function criar($usuario,$senha)
	{
		$sql ="insert into logins (login,senha) values ('$usuario','$senha')";
		return $this->query($sql);
	}
	
	public function remover($usuario)
	{
		$sql ="delete from logins where login = '$usuario';";
		return $this->query($sql);		
	}
	
	public function atualizar($usuario,$senha)
	{
		$sql ="update logins set (senha='$senha') where login='$usuario'";
		return $this->query($sql);		
	}
	
	public function listar($criteria=null)
	{
		$sql ="Select * from logins ";
		if ($criteria != null)
		{
			$sql .= "Where $criteria";
		}
		return $this->query($sql);				
	}
	
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
	
	
	
	
