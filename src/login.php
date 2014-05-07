<?php


class login
{
	public function __construct()
	{
		$pagetitle = "ورود کاربر";
		include 'header.inc.php';
		include 'topheader.inc.php';
		include 'login-form.inc.php';
		include 'footer.inc.php';

	
	session_start(); // Start the session.

		// If session value is present, redirect the home:
		// Also validate the HTTP_USER_AGENT!
	if (isset($_SESSION['agent']) OR ($_SESSION['agent'] == md5($_SERVER['HTTP_USER_AGENT']) ))
	{
	//redirect to home page
	echo '<script> window.location="home"; </script>';
	exit();	
	}

	}
	
}

class loginuser
{
	public function __construct()
	{
		echo 'This is the LOGIN !!!!'; 
	}
	
}