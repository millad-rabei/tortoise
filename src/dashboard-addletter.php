	<div class="content">
	<div class="addbutton">
	<a href=""><img userid="<?php echo $_SESSION['user_id']; ?>" class="addletter_internal" src="../images/add.png"></a>
	<a href=""><img userid="<?php echo $_SESSION['user_id']; ?>" class="addletter_incoming" src="../images/add.png"></a>
	<a href=""><img userid="<?php echo $_SESSION['user_id']; ?>" class="addletter_external" src="../images/add.png"></a>
	</div>

	<div draggable="true" id="popup-wrap"></div>
	
	<form id="secform" method="post">
		<!-- value : permission , groups , title , user ,addletter |||||||||>>> getpgt.php--> 
		<input type="hidden" value="addletter" name="firstsection">
		<input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="user_id">
	</form>

	<div class="pgt-content"></div>
	<div class="letters"></div>
	</div>