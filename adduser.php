<?php
include 'config.php';

//save new user
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$signature = "null";
	$melicode = $_POST['melicode'];
	$cellphone = $_POST['cellphone'];
	$birthdate = $_POST['birthdate'];
	$address = $_POST['address'];
	$successor = $_POST['successor'];
	$title1 = $_POST['title1'];
	$title2 = $_POST['title2'];

		//check not duplicate
		$db->query("SELECT * FROM user WHERE(username='$username' OR melicode='$melicode')");
		$result = $db->get();
		if (!empty($result)){
	//Error message
	echo "<div class='error'>کاربر با این مشخصات در سیستم موجود می باشد</div>";
	}
	else{

	//upload image of signature //////////////////////////////////////////
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["signature"]["name"]);
	$extension = end($temp);

	if ((($_FILES["signature"]["type"] == "image/gif")
	|| ($_FILES["signature"]["type"] == "image/jpeg")
	|| ($_FILES["signature"]["type"] == "image/jpg")
	|| ($_FILES["signature"]["type"] == "image/pjpeg")
	|| ($_FILES["signature"]["type"] == "image/x-png")
	|| ($_FILES["signature"]["type"] == "image/png"))
	&& ($_FILES["signature"]["size"] < 200000)
	&& in_array($extension, $allowedExts)) {
	  if ($_FILES["signature"]["error"] > 0) {
	    echo "Return Code: " . $_FILES["signature"]["error"] . "<br>";
	  } else {
	    //echo "Upload: " . $_FILES["signature"]["name"] . "<br>";
	    //echo "Type: " . $_FILES["signature"]["type"] . "<br>";
	    //echo "Size: " . ($_FILES["signature"]["size"] / 1024) . " kB<br>";
	    //echo "Temp file: " . $_FILES["signature"]["tmp_name"] . "<br>";
	    if (file_exists("images/signature/" . $_FILES["signature"]["name"])) {
	      echo " فایل امضا تکرای می باشد. لطفا یک فایل دیگر انتخاب کنید "; exit();
	    } else {
	      move_uploaded_file($_FILES["signature"]["tmp_name"],
	      "images/signature/" . $_FILES["signature"]["name"]);
	     	
	     	//save signature file address to save in DB
	     	$signature = "images/signature/" . $_FILES["signature"]["name"];
	    	//echo "Stored in: " . $signature;
	      
	    }
	  }
	} else {
	  echo "فایل امضا معتبر نیست. حداکثر سایز 200 کیلوبایت می باشد.";
	}
	///////////////////////////////////////////////////////////////////////

	$db->query("INSERT INTO user (username,password,firstname,lastname,signature,createdate,melicode,cellphone,birthdate,address,successor) VALUES ('$username','$password','$firstname','$lastname','$signature',NOW(),'$melicode','$cellphone','$birthdate','$address','$successor') ");

	//find user id that saved now
	$db->query("SELECT * FROM user WHERE(username='$username')");
	$result = $db->get();
	foreach ($result as $v) {$userid =  $v[0];}

	//save title 1 and title 2
	if ($title2=='not-select'){
		$db->query("INSERT INTO usertitle (userid,titleid) VALUES ('$userid','$title1') ");
	}
	else{
		$db->query("INSERT INTO usertitle (userid,titleid) VALUES ('$userid','$title1') ");
		$db->query("INSERT INTO usertitle (userid,titleid) VALUES ('$userid','$title2') ");
	}

	//print msg and close popup
	echo "<script>$('#popup-wrap').hide();</script><div class='ok'>رکورد مورد نظر با موفقیت ذخیره شد</div>";


	


	
}
