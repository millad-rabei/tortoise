<?php

/*	Tortoise Automation System
*	Open Source Software
*	github : https://github.com/tortoisePL/tortoise
*/

include 'route.php';
include 'src/about.php';
include 'src/home.php';
include 'src/contact.php';
include 'src/login.php';


$route = new Route();


$route->add('/', 'Home');
$route->add('/about', 'About');
$route->add('/contact', 'Contact');
$route->add('/contact/add', 'add');
$route->add('/login', 'Login');
$route->add('/login/user', 'add');

$route->submit();

?>