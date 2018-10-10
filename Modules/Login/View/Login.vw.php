<?php
class LoginView extends View
{
    public function generateDefault()
    {
        $this->assignValue('bootstrap',$this->bootstrap);
    
		if (isset($_SESSION["logged_in"]))
		{
		    $this->assignValue('logged_in',$_SESSION["logged_in"]);
		    $this->assignValue('name',$_SESSION["logged_who"]);
		}	
		
    	$this->generateHtml('Modules/Login/Template/index.html');

    }
	
}