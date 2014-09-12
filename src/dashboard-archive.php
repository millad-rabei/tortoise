	<div class="content">


	<div draggable="true" id="popup-wrap"></div>
	
	<form id="secform" method="post">
		<!-- value : permission , groups , title , user ,addletter |||||||||>>> getpgt.php--> 
		<input type="hidden" value="archive" name="firstsection">
		<input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="user_id">
	</form>

	<div class="pgt-content"></div>
	<div class="letters">	</div>
	</div>