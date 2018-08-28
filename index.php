<?php

session_start();

require_once 'Smarty/libs/Smarty.class.php';
require_once 'Classes/Controller.cls.php';
require_once 'Classes/Dao.cls.php';
require_once 'Classes/View.cls.php';

	if (!$_REQUEST['module'])
	{
		$module = 'Login';
	}else
	{
		$module =$_REQUEST['module'];

	};
	
require_once 'Modules/'.$module.'/Controller/'.$module.'.ctrl.php';
require_once 'Modules/'.$module.'/Model/'.$module.'.mdl.php';
require_once 'Modules/'.$module.'/View/'.$module.'.vw.php';

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
