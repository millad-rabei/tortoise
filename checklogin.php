<?php
include 'config.php';

$username = $_POST['login-username'];
$pass = md5($_POST['login-password']) ;

$DB->query("SELECT count(*) FROM user WHERE(userName='$username' AND password='$pass') ");
// Get an array of items:
$result = $DB->get('count(*)');

//print_r($result) ;

if ($result > 0)
	echo "<div class='ok'>ورود موفقیت آمیز</div>";


else
	echo "<div class='error'>نام کاربری یا رمز عبور اشتباه است</div>";