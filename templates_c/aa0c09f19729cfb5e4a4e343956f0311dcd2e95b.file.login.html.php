<?php /* Smarty version Smarty-3.0.7, created on 2018-08-28 19:19:43
         compiled from "Template/login.html" */ ?>
<?php /*%%SmartyHeaderCode:20603565765b85ca7f48e505-81034603%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa0c09f19729cfb5e4a4e343956f0311dcd2e95b' => 
    array (
      0 => 'Template/login.html',
      1 => 1535494782,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20603565765b85ca7f48e505-81034603',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div>
<form name="login" method="post" action="index.php?module=Login&action=fazerLogin">
	<span>Usuario</span><input type="text" name="usuario"></input>
	<span>Senha</span><input type="password" name="senha"></input>
	<input type="submit" value="Logar"></input><input type="reset">
</form>
</div>