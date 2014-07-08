<?php

include '../config.php';

// if(isset($_SESSION['agent']))
// 	{
// 		$user= $_SESSION['user_id'];
// 	}
$user=$_POST['userid'];	
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$cellphone=$_POST['cellphone'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$address=$_POST['address'];
$groups=$_POST['groups'];
$share=$_POST['shared'];

$db->query("INSERT INTO contact (userid,firstname,lastname,cellphone,email,tel,address,groups,shared) VALUES('$user','$fname','$lname','$cellphone','$email','$tel','$address','$groups','$share')");

?>