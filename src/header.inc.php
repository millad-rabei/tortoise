<!DOCTYPE html>
<?php 
//get complete current url
$url = '//'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);  
?>
<html>
<head>
	<meta charset="utf-8" >
	<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/css/style.css">
	<link rel="icon" type="image/png" href="<?php echo $url; ?>/favicon.ico">
	<script type="text/javascript" src="<?php echo $url; ?>/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo $url; ?>/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $url; ?>/js/main.js"></script>
<title><?php //echo $pagetitle." :: اتوماسیون اداری سنگ پشت"; ?>
<?php
	echo $pagetitle;
	//find org name
	include 'config.php';
	$db->query("SELECT * FROM options WHERE(option_name='organization_name')");
	$result = $db->get();
	foreach ($result as $v) {
		$org_name = $v[2];
		echo " :: ".$org_name;
	}
?>
</title>
</head>
<body>

