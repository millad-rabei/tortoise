<?php 
include 'config.php';

//header("Content-Type: text/html; charset=utf-8");
//Generate name with time
function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}
	//upload letter header //////////////////////////////////////////
	if($_FILES["letter_attachment"]["size"]>0){
	$allowedExts = array("gif", "jpeg", "jpg", "png", "txt" , "pdf" ,"doc", "docx", "xls", "xlsx", "ppt" , "pptx" ,"pdf", "rar", "zip");
	$temp = explode(".", $_FILES["letter_attachment"]["name"]);
	$extension = end($temp);

	if ((($_FILES["letter_attachment"]["type"] == "image/gif")
	|| ($_FILES["letter_attachment"]["type"] == "image/jpeg")
	|| ($_FILES["letter_attachment"]["type"] == "image/jpg")
	|| ($_FILES["letter_attachment"]["type"] == "image/pjpeg")
	|| ($_FILES["letter_attachment"]["type"] == "image/x-png")
	|| ($_FILES["letter_attachment"]["type"] == "image/png")
	|| ($_FILES["letter_attachment"]["type"] == "text/plain") //.txt
	|| ($_FILES["letter_attachment"]["type"] == "application/msword") //.doc
	|| ($_FILES["letter_attachment"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") //.docx
	|| ($_FILES["letter_attachment"]["type"] == "application/vnd.ms-excel") //.xls
	|| ($_FILES["letter_attachment"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") //.xlsx
	|| ($_FILES["letter_attachment"]["type"] == "application/vnd.ms-powerpoint") //.ppt
	|| ($_FILES["letter_attachment"]["type"] == "application/vnd.openxmlformats-officedocument.presentationml.presentation") //.pptx
	|| ($_FILES["letter_attachment"]["type"] == "application/pdf") //.pdf
	|| ($_FILES["letter_attachment"]["type"] == "application/x-rar-compressed") //.rar
	|| ($_FILES["letter_attachment"]["type"] == "application/octet-stream") //.rar
	|| ($_FILES["letter_attachment"]["type"] == "application/zip") //.zip
	|| ($_FILES["letter_attachment"]["type"] == "application/octet-stream")) //.zip
	&& ($_FILES["letter_attachment"]["size"] < 10000000) //10MB max file size
	&& in_array($extension, $allowedExts)) {
	  if ($_FILES["letter_attachment"]["error"] > 0) {
	    echo "Return Code: " . $_FILES["letter_attachment"]["error"] . "<br>";
	  } else {
	    //echo "Upload: " . $_FILES["letter_attachment"]["name"] . "<br>";
	    //echo "Type: " . $_FILES["letter_attachment"]["type"] . "<br>";
	    //echo "Size: " . ($_FILES["letter_attachment"]["size"] / 1024) . " kB<br>";
	    //echo "Temp file: " . $_FILES["letter_attachment"]["tmp_name"] . "<br>";

	    if (file_exists("attachments/" . $_FILES["letter_attachment"]["name"])) {
	      echo "<div class='error'>فایل ضمیمه تکرای می باشد. لطفا یک فایل دیگر انتخاب کنید</div>"; exit();
	    } else {
	    	$filename = $_FILES["letter_attachment"]["name"];
	    	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	    	$attachment_name = microtime_float().".". $ext;
	    	//$filename=iconv("UTF-8", "cp1256//IGNORE", $filename); ;
	    	//$filename=iconv("UTF-8", "UTF-8", $filename); 
	    	move_uploaded_file($_FILES["letter_attachment"]["tmp_name"],
	    	"attachments/" .$attachment_name);
	     	
	     	//save Letter header file address to save in DB
	     	$attachment_url = "attachments/" ."attachments-". $_FILES["letter_attachment"]["name"];
	     	
	    	
	//save to db
	//$db->query("UPDATE options SET option_value='$org_name' WHERE option_name='organization_name'");
	
	//print msg
	//echo '<div class="uploadedfiles">'.$_FILES["letter_attachment"]["name"].'&nbsp&nbsp&nbsp&nbsp&nbsp['.round($_FILES["letter_attachment"]["size"] / 1024).' KB]</div>';
	echo '<li><a><input class="attach_checkbox" type="checkbox" name="attach_check[]" id="'.$attachment_name.'" value="'.$attachment_name.'" checked><label for="'.$attachment_name.'">'.$filename.'</a> ['.round($_FILES["letter_attachment"]["size"] / 1024).' KB]</label></li>';
	    }
	  }
	} else {
	  echo "<script>alert('فایل معتبر نیست. لطف از پسوندهای مجاز استفاده نمایید. حداکثر سایز فایل 10مگابایت می باشد.')</script>";
	}
}
	

