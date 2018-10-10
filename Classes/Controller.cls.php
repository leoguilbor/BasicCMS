<?php
class Controller
{
    public $parameters;
    
	public function redirect($url)
	{
		header('Location: ' . $url);
	}

	public function error($error)
	{
		$this->log($error);
	}

	public function log($mensagem)
	{

	}
	
	public function default($parameters=null)
	{
	    
	    if ($parameters!=null){
	        $this->parameters = json_decode($parameters);
	    }

	    $this->main();
	    
	}
}
?>