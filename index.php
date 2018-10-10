<?php

    session_start();
    
    require_once 'Smarty/libs/Smarty.class.php';
    require_once 'Classes/Controller.cls.php';
    require_once 'Classes/Dao.cls.php';
    require_once 'Classes/View.cls.php';
    require_once 'Classes/Business.cls.php';
    require_once 'Modules/Main/Controller/Main.ctrl.php';
    require_once 'Classes/Config.cls.php';
    
    ConfigLoad::setConfig();
    
    $requestParts = explode('/',$_REQUEST['request']);
    $page = $requestParts[0];
    $module = $requestParts[1];
    $action = $requestParts[2];
    
    if (!isset($page)||$page=='')
    {
        $page = 'Main';
    }
	
	$main = new MainController($page);
	
	$main->default();
	  
	
?>
