	<?php
	if(isset($_SESSION['agent']))
	{
		$user= $_SESSION['user_id'];
	}
	?>

	<div class="contact-content" align="left">
		
			<form action="src/contact-insert.php" method="post" id="form-co">
				<div class="contact-left" align="left"> 
				<label>فامیل : </label><input type="text" name="lname"><br>
				
				<label>ایمیل : </label><input type="text" name="email" id="e"><br>
				
				<label>آدرس : <input type="text" name="address"></label><br>
				<label>اشتراک : <input type="checkbox" checked="checked" value="1" name="shared"></label>
				<input type="submit" value="save">
			</div>
			<div class="contact-left-r" align="left">
				<label>کد کاربر : </label><input type="text" name="userid" value="<?php echo $user; ?>"><br>
				<label>نام : </label><input type="text" name="fname"><br>
				<label>همراه : </label><input type="text" name="cellphone"><br>
				<label>تلفن ثابت : </label><input type="text" name="tel"><br>
				<label>گروه : <input type="text" name="groups"></label>
				
			</div>
			</form>
		<div class="contact-seprate">
		</div>
		<div class="contact-right" align="right">
		
				<?php 
				include 'config.php';
				$db->query("SELECT contactid,firstname,lastname FROM contact");
				$result=$db->get();
   				foreach ($result as $v2) {
				echo '<a href= type="hidden" name="contactid" href="'.$v2[0].'">';
     		  		echo $v2[1]." ".$v2[2].'<br>';
   				} 
		
			 ?>
		
			

		</div>
	</div>
