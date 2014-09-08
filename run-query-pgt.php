<?php
include 'config.php';

$pgt = $_POST['pgt'];
$section = $_POST['section'];
$whatwork = $_POST['whatwork'];
$id = $_POST['id'];

//check is not duplicate
if ($section=='permission')
$db->query("SELECT * FROM permission WHERE(permissionname='$pgt')");
if ($section=='groups')
$db->query("SELECT * FROM groups WHERE(groupname='$pgt')");
if ($section=='title')
$db->query("SELECT * FROM title WHERE(title='$pgt')");
if ($section=='user')
$db->query("SELECT * FROM user WHERE(username='$pgt')");

$result = $db->get();

	if ($whatwork=="add"){
		if (!empty($result)){
	//Error message
	echo "<div class='error'>مقدار تکراری می باشد</div>";
	}
	else{
	//save into table
	if ($section=='permission')
	$db->query("INSERT INTO permission (permissionname) VALUES ('$pgt') ");
	if ($section=='groups')
	$db->query("INSERT INTO groups (groupname) VALUES ('$pgt') ");
	if ($section=='title')
	$db->query("INSERT INTO title (title) VALUES ('$pgt') ");

	echo "<script>$('#popup-wrap').hide();</script><div class='ok'>رکورد مورد نظر با موفقیت اضافه شد</div>";
	}
	}
	//Edit table record
	if ($whatwork=="edit"){
		if (!empty($result)){
	//Error message
	echo "<div class='error'>لطفا مقدار را تغییر دهید</div>";
	}
	else{
			//edit table record
	if ($section=='permission')
	$db->query("UPDATE permission SET permissionname='$pgt' WHERE permissionid='$id'");
	if ($section=='groups')
	$db->query("UPDATE groups SET groupname='$pgt' WHERE groupid='$id'");
	if ($section=='title')
	$db->query("UPDATE title SET title='$pgt' WHERE titleid='$id'");

	echo "<script>$('#popup-wrap').hide();</script><div class='ok'>رکورد مورد نظر با موفقیت ویرایش شد</div>";
	}
	}
	//delete table record
	if ($whatwork=="delete"){
					//edit table record
	if ($section=='permission')
	$db->query("DELETE FROM permission WHERE permissionid='$id'");
	if ($section=='groups')
	$db->query("DELETE FROM groups WHERE groupid='$id'");
	if ($section=='title')
	$db->query("DELETE FROM title WHERE titleid='$id'");
	if ($section=='user')
	$db->query("DELETE FROM user WHERE userid='$id'");

	echo "<script>$('#popup-wrap').hide();</script><div class='ok'>رکورد مورد نظر با موفقیت حذف شد</div>";
	}


//save title
	if ($whatwork=="addtitle"){
	$grid = $_POST['grname'];
	$db->query("INSERT INTO title (title,groupid) VALUES ('$pgt','$grid') ");
	echo "<script>$('#popup-wrap').hide();</script><div class='ok'>رکورد مورد نظر با موفقیت ذخیره شد</div>";
}

