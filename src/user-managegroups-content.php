<div class="content">

<?php
	//add form
	include 'form.class.php';
	$addgroup = new form("add","اضافه کردن گروه");
	$addgroup->add("groups");
?>

<div id="loading"><img src="../images/loading2.gif"></div>
<div class="pgt-content">
	<div class="firstcontent">
	<?php
	//show table informations
	include 'workdatabase.class.php';
	$work = new workdatabase();
	$work->fetch('groups');
	//$work->getcolumns('permission');
	?>
	</div>
</div>
</div>