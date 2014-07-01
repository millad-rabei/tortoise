<div class="content">

<?php
	//add form
	include 'form.class.php';
	$addpermission = new form("add","اضافه کردن حق دسترسی");
	$addpermission->add("permission");
	//edit form
	$editpermission = new form("edit","ویرایش حق دسترسی");
	$editpermission->edit("permission");
	//delete form
	$deletepermission = new form("delete","حذف حق دسترسی");
	$deletepermission->delete("permission");

?>

<div id="loading"><img src="../images/loading2.gif"></div>
<div class="pgt-msg"></div>
<div class="pgt-content"></div>
</div>