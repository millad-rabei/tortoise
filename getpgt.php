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
		if($_POST['section']=='title'){
			$work->fetchtitle($_POST['section']);
			exit();
		}
		if($_POST['section']=='user'){
			$work->fetchuser($_POST['section']);
			exit();
		}
		if($_POST['section']=='addletter'){
			$work->fetchletter("addletter");
			exit();
		}
		if($_POST['section']=='letters'){
			$work->fetchletter("letters");
			exit();
		}
		if($_POST['section']=='archive'){
			$work->fetchletter("archive");
			exit();
		}
		else{
		$work->fetch($_POST['section']);
		}
	}
	else{
	if($_POST['firstsection']=="permission")
	$work->fetch("permission");

	if($_POST['firstsection']=="groups")
	$work->fetch("groups");

	if($_POST['firstsection']=="title")
	$work->fetchtitle("title");


	if($_POST['firstsection']=="user")
	$work->fetchuser("user");

	if($_POST['firstsection']=="addletter")
	$work->fetchletter("addletter");
	
	if($_POST['firstsection']=="letters")
	$work->fetchletter("letters");

	if($_POST['firstsection']=="archive")
	$work->fetchletter("archive");

	}


	?>
