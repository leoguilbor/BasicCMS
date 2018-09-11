<?php
require_once 'Modules/Footer/Model/Footer.mdl.php';
require_once 'Modules/Footer/View/Footer.vw.php';

class FooterController extends Controller
{
    
    private $model;
    private $view;

    public function __construct()
    {
        
        $this->model = new FooterModel();
        $this->view = new FooterView();

        $this->model->getFirstActiveFooter();

    }
    
    public function __construct($bootstrap)
    {
        
        $this->model = new FooterModel();
        $this->view = new FooterView();
        $this->view->bootstrap = $bootstrap;
        $this->model->getFirstActiveFooter();
        
    }
    public function main()
    {
        return $this->view->exibirTelaPadrao($this->model);
    }
	
    
    public function acaoPadrao()
    {
        return $this->main();
    }

}
?>