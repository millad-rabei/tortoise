<?php


class Contact
{
	public function __construct()
	{
		session_start(); // Start the session.
		$pagetitle = "دفترچه تلفن";

		// If no session value is present, redirect the user:
		// Also validate the HTTP_USER_AGENT!
	if (!isset($_SESSION['agent']) OR ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']) )) {
	//redirect to login page
	echo '<script> window.location="../login"; </script>';
	exit();	
}
else{
		if ($_SESSION['timeout'] + 10 * 60 < time()) {
     	// session timed out
		include 'header.inc.php';
		include 'topheader.inc.php';
		include 'main.inc.php';
		include 'timeout.php';
		include 'endmain.inc.php';
		include 'footer.inc.php';
  		} else {
		//show home
  			  		//Update sesseion time
		$_SESSION['timeout'] = time();
		include 'header.inc.php';
		include 'topheader.inc.php';
		include 'main.inc.php';
		//include 'dashboard-primary-tools.php';
		include 'contact-content.php';
		include 'endmain.inc.php';
		include 'footer.inc.php';
}
}
	}

}