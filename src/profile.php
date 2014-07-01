<?php


class Profile
{
	public function __construct()
	{
		session_start(); // Start the session.
		$pagetitle = "ویرایش مشخصات";

		// If no session value is present, redirect the user:
		// Also validate the HTTP_USER_AGENT!
	if (!isset($_SESSION['agent']) OR ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']) )) {
	//redirect to login page
	echo '<script> window.location="login"; </script>';
	exit();	
}
else{

		include 'header.inc.php';
		include 'topheader.inc.php';
		include 'main.inc.php';
		include 'dashboard-primary-tools.php';
		include 'dashboard-content.php';
		include 'dashboard-secondary-tools.php';
		include 'footer.inc.php';
}
	}

}
