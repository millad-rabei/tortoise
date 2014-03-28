<?php

class Home
{
	public function __construct()
	{
		echo 'This is the home page'; 

		//$host  = $_SERVER['HTTP_HOST'];
		header("Location: login");
		
		//$this->_other();
	}
	
	protected function _other()
	{
		echo ' This is the other function, lolz.';
	}
}