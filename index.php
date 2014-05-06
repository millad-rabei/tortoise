<!DOCTYPE html>


<?php
include 'route.php';
include 'src/about.php';
include 'src/home.php';
include 'src/contact.php';
include 'src/login.php';
?>

<html>
<head>
	<meta charset="utf-8" >
	<title><?php echo $pagetitle." :: اتوماسیون اداری سنگ پشت";  ?></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	
</head>
<body>


<?php

$route = new Route();


$route->add('/', 'Home');
$route->add('/about', 'About');
$route->add('/contact', 'Contact');
$route->add('/contact/add', 'add');
$route->add('/login', 'Login');
$route->add('/login/user', 'add');

// echo '<pre>';
// print_r($route);

$route->submit();

?>
</body>
</html>