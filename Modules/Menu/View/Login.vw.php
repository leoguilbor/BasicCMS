<?php
class LoginView extends View
{
    public function exibirTelaLogin()
    {

		$this->atribuirValor('nome','Viviane Jordao');
		$this->atribuirValor('titulo','Fotografia');

		if (isset($_SESSION["logged_in"]))
		{
			$this->atribuirValor('logged_in',$logged_in);
			$this->atribuirValor('name',$logged_who);
		}	

    	$this->mostrarNaTela('Template/index.html');

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