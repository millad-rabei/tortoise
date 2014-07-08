<?php
	//get complete current url
$url = '//'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);  
?>
<script type="text/javascript" src="<?php echo $url; ?>/js/createpopup.js"></script>
	<?php
		include 'form.class.php';
	
	$id = $_POST['id'];
	$type = $_POST['type'];
	$table = $_POST['table'];
	$value = $_POST['value'];
	//add form	
	if($type=="add"){
	$addpermission = new form($type,"اضافه کردن ");
	$addpermission->add($table);
	}
	//add new user form
	if($type=="adduser"){
		$adduser = new form($type,"اضافه کردن کاربر جدید");
		$adduser->adduser();
	}
	//edit form
	if($type=="edit"){
	$editpermission = new form($type,"ویرایش");
	$editpermission->edit($table,$id,$value);
	}
	//delete form
	if($type=="delete"){
	$deletepermission = new form($type,"حذف ");
	$deletepermission->delete($table,$id,$value);
	}	

