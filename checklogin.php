<?php
include 'config.php';

$username = $_POST['login-username'];
$pass = md5($_POST['login-password']) ;

$DB->query("SELECT * FROM user WHERE(userName='$username' AND password='$pass') ");
// Get an array of items:
$result = $DB->get();

//print_r($result) ;


if (!empty($result)){
		// Set the session data:.
		session_start();
	echo "<div class='ok'>ورود موفقیت آمیز</div>";

	$user_id = $result[0]['userId'];
	$first_name = $result[0]['FirstName'];
		
		
		$_SESSION['user_id'] = $user_id;
		$_SESSION['first_name'] = $first_name;
		
		// Store the HTTP_USER_AGENT:
		$_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);

		//redirect to Home
		echo '<script> window.location="dashboard"; </script>';
		exit();	
}

else {
	echo "<div class='error'>نام کاربری یا رمز عبور اشتباه است</div>";
}
