<?php

/*	Sangposht Automation System
*	Open Source Software
*	Aria Web Studio _ AriaDev
*	www.ariadev.ir
*	github : https://github.com/ariadev/sangposht
*/

include 'route.php';
include 'src/about.php';
include 'src/dashboard.php';
include 'src/contact.php';
include 'src/login.php';
include 'src/logout.php';
include 'src/user.php';
include 'src/profile.php';
include 'src/options.php';



$route = new Route();

$route->add('/', 'Dashboard');
$route->add('/dashboard', 'Dashboard');
$route->add('/dashboard/letters', 'Letters');
$route->add('/dashboard/newletter', 'Newletter');
$route->add('/dashboard/archive', 'Archive');
$route->add('/about', 'About');
$route->add('/contact', 'Contact');
$route->add('/user', 'User');
$route->add('/user/manageuser', 'Manageuser');
$route->add('/user/managetitle', 'Managetitle');
$route->add('/user/managegroup', 'Managegroup');
$route->add('/user/managepermission', 'Managepermission');
$route->add('/user/applypermissions', 'Applypermissions');
$route->add('/login', 'Login');
$route->add('/logout', 'Logout');
$route->add('/profile', 'Profile');
$route->add('/contact/add', 'add');
$route->add('/options', 'Options');


$route->submit();

?>

