<?php


class Login
{
	public function __construct()
	{
		session_start(); // Start the session.
		$pagetitle = "ورود کاربر";
		include 'header.inc.php';
		include 'topheader.inc.php';
		include 'login-form.inc.php';
		include 'footer.inc.php';

			// If session value is present, redirect the home:
		// Also validate the HTTP_USER_AGENT!
	if (isset($_SESSION['agent']))
	{
	//redirect to home page
	echo '<script> window.location="dashboard"; </script>';
	exit();	
	}

	}
	
}
