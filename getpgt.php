<?php 
//get complete current url
$url = '//'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);  
?>
<script type="text/javascript" src="<?php echo $url; ?>/js/popup.js"></script>

	<?php
		//show table informations
	include_once 'workdatabase.class.php';
	$work = new workdatabase();
	//fetch table info
	if(!empty($_POST['section']))
	{
	$work->fetch($_POST['section']);
	}
	else{
	if($_POST['firstsection']=="permission")
	$work->fetch("permission");

	if($_POST['firstsection']=="groups")
	$work->fetch("groups");

	if($_POST['firstsection']=="title")
	$work->fetch("title");
	}


	?>
