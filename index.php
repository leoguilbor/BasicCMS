<?php

session_start();

require_once 'Smarty/libs/Smarty.class.php';
require_once 'Classes/Controller.cls.php';
require_once 'Classes/Dao.cls.php';
require_once 'Classes/View.cls.php';
require_once 'Classes/Business.cls.php';


	if (!$_REQUEST['module'])
	{
		$module = 'Main';
	}else
	{
		$module =$_REQUEST['module'];

	};
	
require_once 'Modules/'.$module.'/Controller/'.$module.'.ctrl.php';

    eval('$obj = new '.$module.'Controller();');

	if (!isset($_REQUEST['action']))
	{
		$action = 'acaoPadrao';
	}
	else
	{
		$action =$_REQUEST['action'];
	};

	eval('$obj->'.$action.'();');
?>
