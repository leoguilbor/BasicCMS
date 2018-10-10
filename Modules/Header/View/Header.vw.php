<?php
class HeaderView extends View
{
    public function generateDefault($dao)
    {
        $this->assignValue('bootstrap',$this->bootstrap);
		$this->assignValue('header',$dao);
		
		$this->generateHtml('Modules/Header/Template/index.html');
	
    }
	
}