<?php

class Home
{
	public function __construct()
	{
		echo 'This is the home page'; 

		//$host  = $_SERVER['HTTP_HOST'];
		//header("Location: login");
		//$this->_other();

		session_start(); // Start the session.

		// If no session value is present, redirect the user:
		// Also validate the HTTP_USER_AGENT!
	if (!isset($_SESSION['agent']) OR ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']) )) {
	header("Location: login");
	exit();	
}
	}
	
	protected function _other()
	{
		echo ' This is the other function, lolz.';
	}
}