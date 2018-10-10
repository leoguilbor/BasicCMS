<?php
//require_once 'Modules/Contacts/Model/Contacts.mdl.php';
require_once 'Modules/Contacts/View/Contacts.vw.php';

class ContactsController extends Controller
{
    
    private $model;
    private $view;

    public function __construct($bootstrap=null)
    {
        $this->view = new ContactsView();
        $this->view->bootstrap = $bootstrap;

    }
 
    public function main()
    {

        $this->view->generateDefault($this->model);
    }
	

}
?>