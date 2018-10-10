<?php

class MainView extends View
{
    public function showMainScreen($modules)
    {      
        
        $this->setCss($modules["css"]);
		$this->setJs($modules["js"]);
		$this->setData(self::$modules);
		
		$this->assignValue('url', ConfigLoad::getConfig()->URL);
    	$this->show('Modules/Main/Template/index.html');
    }
    	
}