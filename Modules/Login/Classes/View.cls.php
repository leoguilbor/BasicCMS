<?php
class View
{

	private $smarty;

	public function __construct()
	{
		$this->smarty = new Smarty();
	}

	public function mostrarNaTela($template)
	{
		$this->smarty->display($template);
	}

	public function atribuirValor($var, $valor)
	{
		$this->smarty->assign($var, $valor);
	}
}
?>

