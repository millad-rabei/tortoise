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
	$addpermission = new form($type,"اضافه کردن حق دسترسی");
	$addpermission->add($table);
	}
	//edit form
	if($type=="edit"){
	$editpermission = new form($type,"ویرایش حق دسترسی");
	$editpermission->edit($table,$id,$value);
	}
	//delete form
	if($type=="delete"){
	$deletepermission = new form($type,"حذف حق دسترسی");
	$deletepermission->delete($table,$id,$value);
	}	

