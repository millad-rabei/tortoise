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
	}
	
}

class loginuser
{
	public function __construct()
	{
		echo 'This is the LOGIN !!!!'; 
	}
	
}