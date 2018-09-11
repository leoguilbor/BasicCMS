<?php
/*require_once 'Modules/Main/Model/Layout.mdl.php';
require_once 'Modules/Main/Model/Page.mdl.php';
require_once 'Modules/Main/Model/ModulesPerPage.mdl.php';*/
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

    public function __construct()
    {  
        $this->business = new MainBusiness();
        $this->model = new MainModel();
        $this->view = new MainView();
        $this->modules = $this->business->getModules();

    }

    public function main()
    {
        $this->view->exibirTelaPrincipal($this->modules);
    }

    public function acaoPadrao()
    {
        $this->carregaModulos();
        $this->main();

    }
    
    public function carregaModulos(){
 
        
        foreach ($this->modules as $module){
            
            require_once "Modules/".$module["name"].'/Controller/'.$module["name"].'.ctrl.php';
            $class = $module["name"].'Controller';
            $controller = new $class();
            
            $dados .= $controller->acaoPadrao();
               
        }

        $this->view->atribuirValor('dados', $dados);
    }

}
?>