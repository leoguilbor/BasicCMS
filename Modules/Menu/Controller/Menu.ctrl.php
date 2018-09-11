<?php

require_once 'Modules/Menu/Model/Menu.mdl.php';
require_once 'Modules/Menu/View/Menu.vw.php';

class MenuController extends Controller
{
    
    private $model;
    private $view;

    public function __construct()
    {

        $this->model = new MenuModel();
        $this->view = new MenuView();

    }

    public function telaLogin()
    {
        $this->view->exibirTelaLogin();
    }

    public function acaoPadrao()
    {
    	$this->telaLogin();
    }
}
?>