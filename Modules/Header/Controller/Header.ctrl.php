<?php
require_once 'Modules/Header/Model/Header.mdl.php';
require_once 'Modules/Header/View/Header.vw.php';

class HeaderController extends Controller
{
    
    private $model;
    private $view;

    public function __construct($bootstrap=null)
    {

        $this->model = new HeaderModel();

        $this->view = new HeaderView();
        $this->view->bootstrap = $bootstrap;
        $this->model->getFirstActiveHeader();



    }
 
    public function main()
    {        
        $this->view->generateDefault($this->model);
    }
	
}
?>