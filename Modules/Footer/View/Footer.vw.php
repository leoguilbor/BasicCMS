<?php
class FooterView extends View
{
    public function generateDefault($dao)
    {
        $this->assignValue('bootstrap',$this->bootstrap);
		$this->assignValue('footer',$dao);
		$this->generateHtml('Modules/Footer/Template/index.html');

    }
}