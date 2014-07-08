<?php


class User
{
	public function __construct()
	{
		session_start(); // Start the session.
		$pagetitle = "مدیریت پرسنل";

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
		include 'user-primary-tools.php';
		include 'user-content.php';
		include 'user-secondary-tools.php';
		include 'footer.inc.php';
}
	}

}

class manageuser
{
	public function __construct()
	{
		session_start(); // Start the session.
		$pagetitle = "مدیریت کاربران";

		// If no session value is present, redirect the user:
		// Also validate the HTTP_USER_AGENT!
	if (!isset($_SESSION['agent']) OR ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']) )) {
	//redirect to login page
	echo '<script> window.location="../login"; </script>';
	exit();	
}
else{
		include 'header.inc.php';
		include 'topheader.inc.php';
		include 'main.inc.php';
		include 'user-primary-tools.php';
		//sec is database table name
		$sec="user";
		include 'user-manage-content.php';
		include 'user-secondary-tools.php';

		include 'footer.inc.php';
}
	}

}

class managetitle
{
	public function __construct()
	{
		session_start(); // Start the session.
		$pagetitle = "مدیریت سمت ها";

		// If no session value is present, redirect the user:
		// Also validate the HTTP_USER_AGENT!
	if (!isset($_SESSION['agent']) OR ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']) )) {
	//redirect to login page
	echo '<script> window.location="../login"; </script>';
	exit();	
}
else{
		include 'header.inc.php';
		include 'topheader.inc.php';
		include 'main.inc.php';
		include 'user-primary-tools.php';
		$sec="title";
		include 'user-manage-content.php';
		include 'user-secondary-tools.php';

		include 'footer.inc.php';
}
	}

}

class managegroup
{
	public function __construct()
	{
		session_start(); // Start the session.
		$pagetitle = "مدیریت گروه ها";

		// If no session value is present, redirect the user:
		// Also validate the HTTP_USER_AGENT!
	if (!isset($_SESSION['agent']) OR ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']) )) {
	//redirect to login page
	echo '<script> window.location="../login"; </script>';
	exit();	
}
else{
		include 'header.inc.php';
		include 'topheader.inc.php';
		include 'main.inc.php';
		include 'user-primary-tools.php';
		$sec="groups";
		include 'user-manage-content.php';
		include 'user-secondary-tools.php';

		include 'footer.inc.php';
}
	}

}

class managepermission
{
	public function __construct()
	{
		session_start(); // Start the session.
		$pagetitle = "مدیریت حق دسترسی ها";

		// If no session value is present, redirect the user:
		// Also validate the HTTP_USER_AGENT!
	if (!isset($_SESSION['agent']) OR ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']) )) {
	//redirect to login page
	echo '<script> window.location="../login"; </script>';
	exit();	
}
else{
		include 'header.inc.php';
		include 'topheader.inc.php';
		include 'main.inc.php';
		include 'user-primary-tools.php';
		$sec="permission";
		include 'user-manage-content.php';
		include 'user-secondary-tools.php';

		include 'footer.inc.php';
}
	}

}