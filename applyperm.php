<?php
include 'config.php';

	//delete old info
	$db->query("TRUNCATE TABLE grouppermission");

	//save new info
	//all checked
	if (isset($_POST['perm'])) {
	  	$optionArray = $_POST['perm'];
	    for ($j=0; $j<count($optionArray); $j++) {
			$pieces = explode("@", $optionArray[$j]);
			$groupid = $pieces[0];
			$permissionid = $pieces[1];
	        $db->query("INSERT INTO grouppermission (groupid,permissionid) VALUES ('$groupid','$permissionid') ");
	    }
	}

	
	echo "<div class='ok'>مجوزها با موفقیت به روزرسانی شد</div>";
	
	//echo '<script>$("#specialty").fadeOut();</script>';
	exit();
