<?php
include 'config.php';

$pgt = $_POST['pgt'];
$section = $_POST['section'];
//check is not duplicate
if ($section=='permission')
$db->query("SELECT * FROM permission WHERE(permissionname='$pgt')");
if ($section=='groups')
$db->query("SELECT * FROM groups WHERE(groupname='$pgt')");
if ($section=='title')
$db->query("SELECT * FROM title WHERE(title='$pgt')");

$result = $db->get();
if (!empty($result)){
	//Error message
echo "<div id='error'>حق دسترسی تکراری می باشد</div>";
}
else{
	//save into table
	if ($section=='permission')
	$db->query("INSERT INTO permission (permissionname) VALUES ('$pgt') ");
	if ($section=='groups')
	$db->query("INSERT INTO groups (groupname) VALUES ('$pgt') ");
	if ($section=='title')
	$db->query("INSERT INTO title (title) VALUES ('$pgt') ");

	echo "<div id='ok'>حق دسترسی جدید اضافه شد</div>";
}