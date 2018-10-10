<?php

require_once 'Modules/Menu/Model/Menu.mdl.php';
require_once 'Modules/Menu/Model/MenuItens.mdl.php';
require_once 'Modules/Menu/Business/Menu.bsn.php';
require_once 'Modules/Menu/View/Menu.vw.php';

class MenuController extends Controller
{
    
    private $model;
    private $menuItens;
    private $view;
    private $business;
    public function __construct()
    {

        $this->model = new MenuModel();
        $this->view = new MenuView();
        $this->business = new MenuBusiness($this->view, $this->model);
        

    }

    public function main()
    {
        $this->model->getById($this->parameters->idMenu);
        
        $this->view->generateDefault($this->model);
        
    }

}
?>