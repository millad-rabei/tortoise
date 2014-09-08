<?php
//reference : form.class.php

	//get complete current url
$url = '//'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);  
?>
<script type="text/javascript" src="<?php echo $url; ?>/js/createpopup.js"></script>
	<?php
		include 'form.class.php';

	if (isset($_POST['id'])){$id = $_POST['id'];}	
	if (isset($_POST['type'])){$type = $_POST['type'];}
	if (isset($_POST['table'])){$table = $_POST['table'];}
	if (isset($_POST['value'])){$value = $_POST['value'];}

	//add form	
	if($type=="add"){
	$addpermission = new form($type,"اضافه کردن ");
	$addpermission->add($table);
	}
	//add new title form
	if($type=="addtitle2"){
		$addtitle = new form($type,"اضافه کردن سمت جدید");
		$addtitle->addtitle($table);
	}
	//add new user form
	if($type=="adduser"){
		$adduser = new form($type,"اضافه کردن کاربر جدید");
		$adduser->adduser($table);
	}
	//edit form
	if($type=="edit"){
	$editpermission = new form($type,"ویرایش");
	$editpermission->edit($table,$id,$value);
	}
	//edit user
	if($type=="edituser"){
	$editpermission = new form($type,"ویرایش کاربر");
	$editpermission->edituser($table,$id);
	}
	//delete form
	if($type=="delete"){
	$deletepermission = new form($type,"حذف ");
	$deletepermission->delete($table,$id,$value);
	}	

	//Add Letter form
	if($type=="addletter_internal"){
	$newletter = new form($type,"نامه داخل سازمانی جدید ");
	$newletter->addletter_internal();
	}	

	//Add Letter form
	if($type=="addletter_incoming"){
	$newletter = new form($type,"ثبت نامه وارده ");
	$newletter->addletter_incoming();
	}	

	//Add Letter form
	if($type=="addletter_external"){
	$newletter = new form($type,"نامه بین سازمانی جدید");
	$newletter->addletter_external();
	}	

