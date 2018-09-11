<?php

class Business
{
	private $dao;
	
	public function __construct()
	{
	    echo "2";
		
	}
	
	public function getDao(){
	    return $this->dao;
	}
	public function setDao($dao){
	    $this->dao = $dao;
	}
	
}?>