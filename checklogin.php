<?php
include 'config.php';

$username = $_POST['login-username'];
$pass = md5($_POST['login-password']) ;

$db->query("SELECT * FROM user WHERE(username='$username' AND password='$pass') ");
// Get an array of items:
$result = $db->get();

//print_r($result) ;


if (!empty($result)){
		// Set the session data:.
		session_start();
	echo "<div class='ok'>ورود موفقیت آمیز</div>";

	//add date 
	// require_once 'src/jdatetime.class.php';
	// $date = new jDateTime(true, true, 'Asia/Tehran');

	$user_id = $result[0]['userid'];
	$first_name = $result[0]['firstname'];
	$last_name = $result[0]['lastname'];

		$_SESSION['timeout'] = time();
		$_SESSION['user_id'] = $user_id;
		$_SESSION['first_name'] = $first_name;
		$_SESSION['last_name'] = $last_name;
		//$_SESSION['now'] = $date->date("l j F Y H:i");
		
		// Store the HTTP_USER_AGENT:
		$_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);
				
		//redirect to Home
		echo '<script> window.location="dashboard"; </script>';
		exit();	
}

else {
	echo "<div class='error'>نام کاربری یا رمز عبور اشتباه است</div>";
}
