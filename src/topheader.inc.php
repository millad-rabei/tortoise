<div class="topheader"></div>
<div class="header-wrap">
<div class="header">
	<div class="header-bg">
		<div class="title">
		<table class="orgname">
			<tr>
				<td></td>
				<td><?php echo $org_name; ?></td>
				<td></td>
			</tr>
		</table>
		</div>
	</div>

	<div class="header-right">
	<?php
		//add date 
	require_once 'jdatetime.class.php';
	$date = new jDateTime(true, true, 'Asia/Tehran');

	if(isset($_SESSION['agent'])){
	echo $date->date("l j F Y")."<br>"; // Outputs: پنجشنبه ۱۵ اردیبهشت ۱۳۹۰ ۰۰:۰۰
	echo "<b>".$_SESSION['first_name']." ".$_SESSION['last_name']."</b><br>"; 	
	}
	else{
		echo $date->date("l j F Y"); // Outputs: پنجشنبه ۱۵ اردیبهشت ۱۳۹۰ ۰۰:۰۰
	}
	?>
	</div>
</div>
</div>