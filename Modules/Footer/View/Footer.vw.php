<?php
class FooterView extends View
{
    public function exibirTelaPadrao($dao)
    {
        $this->atribuirValor('bootstrap','col-md-3');
		$this->atribuirValor('header',$dao);
		$this->gerarHtml('Modules/Footer/Template/index.html');

    }
    
    public function exibirTelaErro()
    {
        $this->atribuirValor('nome','Leoguilbor');
        $this->atribuirValor('titulo','Aplicacao teste');
        $this->atribuirValor('erro', 'Login Invalido');
        $this->mostrarNoContainer('Module/Login/Template/erro.html');

    }

    public function exibirTelaLogado()
    {

        
        $this->atribuirValor('nome','Viviane Jordao');
        $this->atribuirValor('titulo','Fotografia');
        
        if (isset($_SESSION["logged_in"]))
        {
            $this->atribuirValor('logged_in',$logged_in);
            $this->atribuirValor('name',$logged_who);
        }
        
        $this->mostrarNaTela('Modules/Login/Template/logado.html');
    }
	
}