<?php
require_once 'Modules/Footer/Model/Footer.mdl.php';
require_once 'Modules/Footer/View/Footer.vw.php';

class FooterController extends Controller
{
    
    private $model;
    private $view;

    public function __construct($bootstrap=null)
    {
        
        $this->model = new FooterModel();
        $this->view = new FooterView();
        $this->view->bootstrap = $bootstrap;
        $this->model->getFirstActiveFooter();

    }
    
 
    public function main()
    {
        return $this->view->generateDefault($this->model);
    }
	
    

}
?>