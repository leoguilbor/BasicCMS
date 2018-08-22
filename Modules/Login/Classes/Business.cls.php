<?php
class Business
{
	private $config;
	public function __construct($class)
	{
		if ($class){
			$config = simplexml_load_file("XML/$class.xml");
		}
	}
	public function criar($valores)
	{
		$sql ="insert into". $this->config->tabela ."(";
		for ($i;$i<sizeof($this->config->campos);$i++){
			$sql .= $this->config->campos[$i]->nome;
			if ($i!=sizeof($this->config->campos)-1)
			{
				$sql .= ',';		
			}
		}
		$sql .=")values (";
		for ($i;$i<sizeof($this->config->campos);$i++){
			if ($this->config->campos[$i]->type == 'String')
			{
				$sql .= "'".$valores[$i]."'";
			}
			else
			{
				$sql .= $valores[$i];
			}
			
			
			if ($i!=sizeof($this->config->campos)-1)
			{
				$sql .= ',';		
			}
		}
		return $this->query($sql);	
	} 
		
		

		
	
	
	public function remover($usuario)
	{
		$sql ="delete from Login where usuario = '$usuario';";
		return $this->query($sql);		
	}
	
	public function atualizar($usuario,$senha)
	{
		$sql ="update Login set (senha='$senha') where usuario='$usuario'";
		return $this->query($sql);		
	}
	
	public function listar($usuario)
	{
		$sql ="Select * from Login";
		if ($usuario != null)
		{
			$sql .= "Where usuario='$usuario'";
		}
		return $this->query($sql);				
	}
}