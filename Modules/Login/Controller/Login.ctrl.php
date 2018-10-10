<?php
require_once 'Modules/Login/Model/Login.mdl.php';
require_once 'Modules/Login/Business/Login.bsn.php';
require_once 'Modules/Login/View/Login.vw.php';

class LoginController extends Controller
{
    
    private $model;
    private $view;
    private $business;

    public function __construct()
    {

        $this->model = new LoginModel();
        $this->view = new LoginView();
        
        $this->business = new LoginBusiness($this->view,$this->model);

    }

    public function main()
    {
        $this->view->generateDefault();   
    }

    public function doLogin()
    {
        return $this->business->login();
    }
	
    public function doLogout()
    {
        return $this->business->logout();   
    }
}
?>