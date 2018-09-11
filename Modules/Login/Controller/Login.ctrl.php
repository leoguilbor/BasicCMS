<?php
require_once 'Modules/Login/Model/Login.mdl.php';
require_once 'Modules/Login/View/Login.vw.php';

class LoginController extends Controller
{
    
    private $model;
    private $view;

    public function __construct()
    {

        $this->model = new LoginModel();
        $this->view = new LoginView();

    }

    public function telaLogin()
    {

        $this->view->exibirTelaLogin();
    }

    public function fazerLogin()
    {
        if ($this->model->verificarSenhaUsuario($_POST['usuario'], $_POST['senha'])) {
            $this->gravaSessao();
            $this->log("usuario ".$_POST['usuario']." logou");
            $this->view->exibirTelaLogado();
        } else {
            $this->log('usuario tentou logar mas nao conseguiu');
            $this->view->exibirTelaErro();
        }
    }
	
    public function fazerLogoff()
    {
        $this->apagaSessao();
        $this->view->exibirTelaLogin();
        
    }
    
    public function acaoPadrao()
    {

    	$this->telaLogin();
    }

    private function gravaSessao()
    {
		$_SESSION["logged_in"]=true;
		$_SESSION["logged_who"]=$_POST['usuario'];
		echo "sessao gravada";	
    }

    private function apagaSessao()
    {
		unset($_SESSION["logged_in"]);
		unset($_SESSION["logged_who"]);
		echo "sessao liberada";
    }
}
?>