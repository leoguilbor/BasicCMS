<?php
class MenuView extends View
{
    public function generateDefault($dao){
        
        $this->assignValue("menuItens", $dao->getMenuItens());
        
        $this->assignValue("display", $dao->display);
        $this->generateHtml('Modules/Menu/Template/index.html');
    }
 
}