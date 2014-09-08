<?php 
include 'config.php';

//Get info form form
	$org_name = $_POST['orgname'];
	$header = $_POST['currentheader'];
	$deadline_archive =  $_POST['deadline_archive'];
	//upload letter header //////////////////////////////////////////
	if($_FILES["letterheader"]["size"]>0){
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["letterheader"]["name"]);
	$extension = end($temp);

	if ((($_FILES["letterheader"]["type"] == "image/gif")
	|| ($_FILES["letterheader"]["type"] == "image/jpeg")
	|| ($_FILES["letterheader"]["type"] == "image/jpg")
	|| ($_FILES["letterheader"]["type"] == "image/pjpeg")
	|| ($_FILES["letterheader"]["type"] == "image/x-png")
	|| ($_FILES["letterheader"]["type"] == "image/png"))
	&& ($_FILES["letterheader"]["size"] < 400000)
	&& in_array($extension, $allowedExts)) {
	  if ($_FILES["letterheader"]["error"] > 0) {
	    echo "Return Code: " . $_FILES["letterheader"]["error"] . "<br>";
	  } else {
	    //echo "Upload: " . $_FILES["letterheader"]["name"] . "<br>";
	    //echo "Type: " . $_FILES["letterheader"]["type"] . "<br>";
	    //echo "Size: " . ($_FILES["letterheader"]["size"] / 1024) . " kB<br>";
	    //echo "Temp file: " . $_FILES["letterheader"]["tmp_name"] . "<br>";
	    if (file_exists("images/header/" . $_FILES["letterheader"]["name"])) {
	      echo "<div class='error'>فایل سربرگ تکرای می باشد. لطفا یک فایل دیگر انتخاب کنید</div>"; exit();
	    } else {
	      move_uploaded_file($_FILES["letterheader"]["tmp_name"],
	      "images/header/" ."header-". $_FILES["letterheader"]["name"]);
	     	
	     	//save Letter header file address to save in DB
	     	$header = "images/header/" ."header-". $_FILES["letterheader"]["name"];
	    	//echo "Stored in: " . $header;
	      
	    }
	  }
	} else {
	  echo "<div class='error'>فایل سربرگ معتبر نیست. حداکثر سایز 300 کیلوبایت می باشد</div>";
	}
}
	///////////////////////////////////////////////////////////////////////////////////////////

	$db->query("UPDATE options SET option_value='$org_name' WHERE option_name='organization_name'");
	$db->query("UPDATE options SET option_value='$header' WHERE option_name='letter_header'");
	$db->query("UPDATE options SET option_value='$deadline_archive' WHERE option_name='deadline_archive'");
	//print msg
	echo "<script>$('#popup-wrap').hide();</script><div class='ok'>رکورد مورد نظر با موفقیت به روز رسانی شد</div>";


