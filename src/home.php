<?php


class Home
{
	public function __construct()
	{
		$pagetitle = "میز کار";
		include 'header.inc.php';
		include 'topheader.inc.php';
		include 'footer.inc.php';


		session_start(); // Start the session.

		// If no session value is present, redirect the user:
		// Also validate the HTTP_USER_AGENT!
	if (!isset($_SESSION['agent']) OR ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']) )) {
	//redirect to login page
	echo '<script> window.location="login"; </script>';
	exit();	
}
else{
	//show home
	echo 'This is the home page'; 
}
	}
	
	protected function _other()
	{
		echo ' This is the other function, lolz.';
	}
}
