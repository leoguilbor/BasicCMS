<?php
class ContactsView extends View
{
    public function generateDefault($dao=null)
    {
        $this->assignValue('bootstrap',$this->bootstrap);
		$this->assignValue('header',$dao);

		$this->generateHtml('Modules/Contacts/Template/index.html');

    }
    	
}