<div class="topheader"></div>
<div class="header-wrap">
<div class="header">
	<div class="header-bg">
	<div class="title">اتوماسیون اداری سنگ پشت</div>
	</div>
	<div class="header-right">
	<?php

	if(isset($_SESSION['agent'])){
	echo $_SESSION['first_name']; 	
	}
	else{
		echo 'لطفا وارد شوید';
	}
	?>
	</div>
</div>
</div>