<div class="content">

<?php
	//add form
	include 'form.class.php';
	$addtitle = new form("add","اضافه کردن سمت");
	$addtitle->add("title");
?>

<div id="loading"><img src="../images/loading2.gif"></div>
<div class="pgt-content">
	<div class="firstcontent">
	<?php
	//show table informations
	include 'workdatabase.class.php';
	$work = new workdatabase();
	$work->fetch('title');
	//$work->getcolumns('permission');
	?>
	</div>
</div>
</div>