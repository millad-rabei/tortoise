<?php

$pagetitle = "ورود کاربر";

class login
{
	public function __construct()
	{
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