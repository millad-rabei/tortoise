<?php


class Dashboard
{
	public function __construct()
	{
		session_start(); // Start the session.
		$pagetitle = "کارتابل";

		// If no session value is present, redirect the user:
		// Also validate the HTTP_USER_AGENT!
	if (!isset($_SESSION['agent']) OR ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']) )) {
	//redirect to login page
	echo '<script> window.location="login"; </script>';
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
		include 'dashboard-primary-tools.php';
		include 'dashboard-content.php';
		include 'endmain.inc.php';
		include 'footer.inc.php';
}
	}

}
}

class Letters
{
	public function __construct()
	{
		session_start(); // Start the session.
		$pagetitle = "کارتابل وارده";

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
  			  		//Update sesseion time
		$_SESSION['timeout'] = time();
		//show home
		include 'header.inc.php';
		include 'topheader.inc.php';
		include 'main.inc.php';
		include 'dashboard-primary-tools.php';
		include 'dashboard-letters.php';
		include 'endmain.inc.php';
		include 'footer.inc.php';
}
	}

}
}

class Newletter
{
	public function __construct()
	{
		session_start(); // Start the session.
		$pagetitle = "ایجاد و ارسال نامه";

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
  			  		//Update sesseion time
		$_SESSION['timeout'] = time();
		//show home
		include 'header.inc.php';
		include 'topheader.inc.php';
		include 'main.inc.php';
		include 'dashboard-primary-tools.php';
		include 'dashboard-addletter.php';
		include 'endmain.inc.php';
		include 'footer.inc.php';
}
	}

}
}


class Archive
{
	public function __construct()
	{
		session_start(); // Start the session.
		$pagetitle = "بایگانی نامه ها";

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
  			  		//Update sesseion time
		$_SESSION['timeout'] = time();
		//show home
		include 'header.inc.php';
		include 'topheader.inc.php';
		include 'main.inc.php';
		include 'dashboard-primary-tools.php';
		include 'dashboard-archive.php';
		include 'endmain.inc.php';
		include 'footer.inc.php';
}
	}

}
}