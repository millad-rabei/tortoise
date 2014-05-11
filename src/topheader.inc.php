<div class="topheader"></div>
<div class="header-wrap">
<div class="header">
	<div class="header-bg">
	<div class="title">اتوماسیون اداری سنگ پشت</div>
	</div>
	<div class="header-right">
	<?php
	//add date 
	require_once 'jdatetime.class.php';
	$date = new jDateTime(true, true, 'Asia/Tehran');

	if(isset($_SESSION['agent'])){
	echo $_SESSION['first_name']; 	
	}
	else{
		echo $date->date("l j F Y"); // Outputs: پنجشنبه ۱۵ اردیبهشت ۱۳۹۰ ۰۰:۰۰

	}
	?>
	</div>
</div>
</div>