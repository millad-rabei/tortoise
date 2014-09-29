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
		include 'header.inc.php';
		include 'topheader.inc.php';
		include 'main.inc.php';
		//Check has permission
		include 'haspermission.function.php';
		$permname="دسترسی به مدیریت پرسنل";
		$userid= $_SESSION['user_id'];
		if( hasPermission($permname,$userid) ){
		include 'user-primary-tools.php';
		include 'user-content.php';}else{include 'nopermission.php';}
		include 'endmain.inc.php';
		include 'footer.inc.php';
}
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
		include 'header.inc.php';
		include 'topheader.inc.php';
		include 'main.inc.php';
		//Check has permission
		include 'haspermission.function.php';
		$permname="دسترسی به مدیریت پرسنل";
		$userid= $_SESSION['user_id'];
		if( hasPermission($permname,$userid) ){
		include 'user-primary-tools.php';
		//sec is database table name
		$sec="user";
		include 'user-manage-content.php';}else{include 'nopermission.php';}
		include 'endmain.inc.php';
		include 'footer.inc.php';
}
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
		include 'header.inc.php';
		include 'topheader.inc.php';
		include 'main.inc.php';
		//Check has permission
		include 'haspermission.function.php';
		$permname="دسترسی به مدیریت پرسنل";
		$userid= $_SESSION['user_id'];
		if( hasPermission($permname,$userid) ){
		include 'user-primary-tools.php';
		$sec="title";
		include 'user-manage-content.php';}else{include 'nopermission.php';}
		include 'endmain.inc.php';
		include 'footer.inc.php';
}
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
		include 'header.inc.php';
		include 'topheader.inc.php';
		include 'main.inc.php';
		//Check has permission
		include 'haspermission.function.php';
		$permname="دسترسی به مدیریت پرسنل";
		$userid= $_SESSION['user_id'];
		if( hasPermission($permname,$userid) ){
		include 'user-primary-tools.php';
		$sec="groups";
		include 'user-manage-content.php';}else{include 'nopermission.php';}
		include 'endmain.inc.php';
		include 'footer.inc.php';
}
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
		include 'header.inc.php';
		include 'topheader.inc.php';
		include 'main.inc.php';
		//Check has permission
		include 'haspermission.function.php';
		$permname="دسترسی به مدیریت پرسنل";
		$userid= $_SESSION['user_id'];
		if( hasPermission($permname,$userid) ){
		include 'user-primary-tools.php';
		$sec="permission";
		include 'user-manage-content.php';}else{include 'nopermission.php';}
		include 'endmain.inc.php';
		include 'footer.inc.php';
}
	}

}
}
class Applypermissions
{
	public function __construct()
	{
		session_start(); // Start the session.
		$pagetitle = "مجوزها";

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
		include 'header.inc.php';
		include 'topheader.inc.php';
		include 'main.inc.php';
		//Check has permission
		include 'haspermission.function.php';
		$permname="دسترسی به مدیریت پرسنل";
		$userid= $_SESSION['user_id'];
		if( hasPermission($permname,$userid) ){
		include 'user-primary-tools.php';
		include 'user-applypermissions.php';}else{include 'nopermission.php';}
		include 'endmain.inc.php';
		include 'footer.inc.php';
}
	}

}
}