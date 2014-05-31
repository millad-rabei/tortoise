<?php

if (!is_null($_SERVER['QUERY_STRING'])) {
$page= ($_SERVER['QUERY_STRING']); }

//$page = "$_SERVER[REDIRECT_QUERY_STRING]";
//print_r($_SERVER);

?>
<div class="main-wrap">
	<div class="menu-wrap">
		<div class="menu">
			<ul class="tab">
				<a href="<?php echo $url; ?>/dashboard">
				<li <?php if (strpos($page,'uri=dashboard') !== FALSE) echo ' class="active"'; ?> >کارتابل</li></a>
				<a href="<?php echo $url; ?>/user">
				<li <?php if (strpos($page,'uri=user') !== FALSE) echo ' class="active"'; ?> >مدیریت پرسنل</li></a>
				<a href="<?php echo $url; ?>/contact">
				<li <?php if (strpos($page,'uri=contact') !== FALSE) echo ' class="active"'; ?> >دفترچه تلفن</li></a>
				<a href="<?php echo $url; ?>/profile">
				<li <?php if (strpos($page,'uri=profile') !== FALSE) echo ' class="active"'; ?> >ویرایش مشخصات</li></a>
				<a href="<?php echo $url; ?>/about">
				<li <?php if (strpos($page,'uri=about') !== FALSE) echo ' class="active"'; ?> >درباره نرم افزار</li></a>
				<a href="<?php echo $url; ?>/logout">
				<li <?php if (strpos($page,'uri=logout') !== FALSE) echo ' class="active"'; ?> >خروج</li></a>
			</ul>
		</div>
	</div>


