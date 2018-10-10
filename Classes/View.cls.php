<?php
class View
{

	private $smarty;
	public static $modules = "";
	public $bootstrap = "";
	
	public function __construct()
	{
		$this->smarty = new Smarty();
	}

	public function show($template)
	{
	   $this->assignValue('url', ConfigLoad::getConfig()->URL);
	   
	   $this->smarty->display($template);
	}
	
	public function generateHtml($template)
	{
	    $this->assignValue('url', ConfigLoad::getConfig()->URL);
	    
	    self::$modules .= $this->smarty->fetch($template);
	        	    
	}

	public function assignValue($var, $value)
	{
	    $this->smarty->assign($var, $value);
	}
	
	public function setCss($value)
	{
	    $this->smarty->assign("css", $value);
	}
	
	public function setJs($value)
	{
	    $this->smarty->assign("js", $value);
	}
	
	public function setdata($value)
	{
	    $this->smarty->assign("modules", $value);
	}
	public static function cleanModules(){
	
	    self::$modules = "";
	}
}
?>

