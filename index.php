<?php
session_start();
require_once 'Smarty/libs/Smarty.class.php';
require_once 'Classes/Controller.cls.php';
require_once 'Classes/Model.cls.php';
require_once 'Classes/View.cls.php';
require_once 'Model/Login.mdl.php';
require_once 'View/Login.vw.php';
require_once 'Controller/Login.ctrl.php';

	if (!$_REQUEST['module'])
	{
		$module = 'Login';
	}else
	{
		$module =$_REQUEST['module'];
	};
	
	eval('$obj = new '.$module.'Controller();');
	if (!$_REQUEST['action'])
	{
		$action = 'acaoPadrao';
	}
	else
	{
		$action =$_REQUEST['action'];
	};
	eval('$obj->'.$action.'();');
?>
