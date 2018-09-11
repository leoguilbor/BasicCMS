<?php
class MenuView extends View
{
    public function exibirTelaLogin()
    {

        $this->gerarHtml('Modules/Menu/Template/index.html');

    }
    
    public function exibirTelaErro()
    {
        $this->atribuirValor('nome','Leoguilbor');
        $this->atribuirValor('titulo','Aplicacao teste');
        $this->atribuirValor('erro', 'Login Invalido');
        $this->mostrarNaTela('Template/index.html');

    }

    public function exibirTelaLogado()
    {

        $this->atribuirValor('nome','Leoguilbor');
		$this->atribuirValor('titulo','Aplicacao teste');
		if (isset($_SESSION["logged_in"]))
		{
			$this->atribuirValor('logged_in',$_SESSION["logged_in"]);
			$this->atribuirValor('name',$_SESSION["logged_who"]);
		}	
        $this->mostrarNaTela('Template/index.html');
    }
	
}