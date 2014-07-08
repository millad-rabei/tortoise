<?php


class Logout
{
	public function __construct()
	{
		session_start(); // Start the session.
		$pagetitle = "خروج کاربر";

	if (!isset($_SESSION['agent'])) {

	//redirect to login page
	echo '<script> window.location="login"; </script>';
	exit();	

} else { // Cancel the session.

	$_SESSION = array(); // Clear the variables.
	session_destroy(); // Destroy the session itself.
	setcookie ('PHPSESSID', '', time()-3600, '/', '', 0, 0); // Destroy the cookie.

	//redirect to login page
	echo '<script> window.location="login"; </script>';
	exit();	
}

	}
	
}
