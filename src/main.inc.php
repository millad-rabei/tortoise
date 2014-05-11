<?php

$url = '//'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); 

$page =  "$_SERVER[REDIRECT_QUERY_STRING]";
//print_r($_SERVER);

?>
<div class="main-wrap">
	<div class="menu-wrap">
		<div class="menu">
			<ul class="tab">
				<a href="<?php echo $url; ?>/dashboard">
				<li <?php if ($page == "uri=dashboard") echo ' class="active"'; ?> >کارتابل</li></a>
				<a href="<?php echo $url; ?>/user">
				<li <?php if ($page == "uri=user") echo ' class="active"'; ?> >مدیریت پرسنل</li></a>
				<a href="<?php echo $url; ?>/contact">
				<li <?php if ($page == "uri=contact") echo ' class="active"'; ?> >دفترچه تلفن</li></a>
				<a href="<?php echo $url; ?>/profile">
				<li <?php if ($page == "uri=profile") echo ' class="active"'; ?> >ویرایش مشخصلات</li></a>
				<a href="<?php echo $url; ?>/about">
				<li <?php if ($page == "uri=about") echo ' class="active"'; ?> >درباره نرم افزار</li></a>
				<a href="<?php echo $url; ?>/logout">
				<li <?php if ($page == "uri=logout") echo ' class="active"'; ?> >خروج</li></a>
			</ul>
		</div>
	</div>


