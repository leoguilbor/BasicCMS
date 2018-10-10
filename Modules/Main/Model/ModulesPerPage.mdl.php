<?php
/**
 * @table=modulesPerPage
 */

class ModulesPerPageModel extends Dao 
{
    /**
     * @PK
     */
    public $id;
    /* would be great load the object like JPA*/
	public $idModule;	
	public $idPage;
	public $orderInPage;
	public $css;
	
	public function getByIdPage($Idpage){
	    return $this->list("idPage =".$page['id']);
	}
	public function getByPage($page){  
	    return $this->query("select m.id as id,m.name as name,m.description as description, mpp.css as css, mpp.action as action, mpp.parameters as parameters from module m inner join modulesPerPage mpp on mpp.idModule = m.id where idPage =".$page['id']);
	}
}
	
	
	
	
