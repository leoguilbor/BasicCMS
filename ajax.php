<?php

    session_start();
    
    require_once 'Smarty/libs/Smarty.class.php';
    require_once 'Classes/Controller.cls.php';
    require_once 'Classes/Dao.cls.php';
    require_once 'Classes/View.cls.php';
    require_once 'Classes/Business.cls.php';
    require_once 'Classes/Config.cls.php';
     
    ConfigLoad::setConfig();
    
    $requestParts = explode('/',$_REQUEST['request']);
    $module = $requestParts[0];
    $action = $requestParts[1]; 
    
    $rt = false;
   
    if (isset($module)&&isset($action))
	{
	    
	    require_once 'Modules/'.$module.'/Controller/'.$module.'.ctrl.php';
	    $cont = $module.'Controller';
	    $controller = new $cont();
		$rt = $controller->$action();
		
	}
	
	echo $rt;
	
?>
