<?php
class Controller
{
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
}
?>