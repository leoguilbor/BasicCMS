<?php
/*require_once 'Modules/Main/Model/Layout.mdl.php';*/
require_once 'Modules/Main/Model/Page.mdl.php';
require_once 'Modules/Main/Model/ModulesPerPage.mdl.php';
require_once 'Modules/Main/Model/Module.mdl.php';
require_once 'Modules/Main/Model/Main.mdl.php';
require_once 'Modules/Main/Business/Main.bsn.php';
require_once 'Modules/Main/View/Main.vw.php';

class MainController extends Controller
{
    private $business;
    private $model;
    private $view;
    public $modules;

    public function __construct($page=null)
    {  
        
        $this->business = new MainBusiness();
        $this->model = new MainModel();
        $this->view = new MainView();
        $this->modules = $this->business->getModulesPerPage($page);
               

    }

    public function main()
    {   
        $this->modules = $this->business->loadModules();   
        $this->view->showMainScreen($this->modules);
    }
    
}
?>