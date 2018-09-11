<?php
class View
{

	private $smarty;
	public static $modules = "";
	public $bootstrap = "";
	
	public function __construct()
	{
		$this->smarty = new Smarty();
	}

	public function mostrarNaTela($template)
	{
	   $this->smarty->display($template);
	}
	
	public function gerarHtml($template)
	{
	    self::$modules .= $this->smarty->fetch($template);

	    
	}

	public function atribuirValor($var, $valor)
	{
		$this->smarty->assign($var, $valor);
	}
}
?>

