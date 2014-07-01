<script>
$(document).ready(function(){

//show popups
	$('.add').click(function(){
		$('#popup-add').show();

		return false;
	});

	$('.edit').click(function(){
		$('#popup-edit').show();

		return false;
	});

$('.delete').click(function(){
		$('#popup-delete').show();

		return false;
	});	
//$('#id').attr('value')
});
		</script>



	<?php
		//show table informations
	include_once 'workdatabase.class.php';
	$work = new workdatabase();
	if(!empty($_POST['section']))
	$work->fetch($_POST['section']);

	$work->fetch("permission");
	//$work->getcolumns('permission');
	?>
