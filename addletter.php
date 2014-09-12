<?php
include 'config.php';
//set defaults 
$title ="";
$docnumber = "";
$sender = "";
$touser = "";
$docdate = "";
$letter_subject = "";
$letter_maintext = "";
$letter_action = "";
$user_id = $_POST['user_id'];
$receivertype = "مستقیم";
$view = "no";
$archived = "no";

if (isset($_POST['letter_type'])){
	switch ($_POST['letter_type']) {
		case 'internal':
			$letter_type = "داخلی";
			break;
		case 'incoming':
			$letter_type = "وارده";
			break;
		case 'external':
			$letter_type = "صادره";
			break;
		default:
			# code...
			break;
	}
}
if (isset($_GET["status"])){
	switch ($_GET["status"]) {
		case 'send':
			$letter_status = "ارسال شده";
			break;
		case 'draft':
			$letter_status = "پیش نویس";
			break;
		case 'incoming':
			$letter_status = "ثبت سیستم";
			break;		
		case 'external':
			$letter_status = "چاپ شده";
			break;		
		default:
			# code...
			break;
	}
} //draft , send
if (isset($_POST['letter_number'])){$letter_number= $_POST['letter_number'];}
if (isset($_POST['letter_subject'])){$letter_subject= $_POST['letter_subject'];}
if (isset($_POST['title'])){$title= $_POST['title'];}
if (isset($_POST['letter_action'])){$letter_action= $_POST['letter_action'];}
if (isset($_POST['letter_maintext'])){$letter_maintext= $_POST['letter_maintext'];}
if (isset($_POST['sender'])){$sender= $_POST['sender'];}
if (isset($_POST['to'])){$touser= $_POST['to'];}
if (isset($_POST['docnumber'])){$docnumber= $_POST['docnumber'];}
if (isset($_POST['docdate'])){$docdate = $_POST['docdate'];}


if (isset($_POST['attach_check'])) {
	$hasattachment="دارد";
}else
{$hasattachment="ندارد";}

//create Letter
$db->query("INSERT INTO letter (usertitle,userid,letternumber,docnumber,docdate,date,sender,touser,type,subject,mainText,status,hasattachment,eghdam) 
						VALUES ('$title','$user_id','$letter_number','$docnumber','$docdate',NOW(),'$sender','$touser','$letter_type','$letter_subject','$letter_maintext','$letter_status','$hasattachment','$letter_action') ");


//get letter id (latest letter)
$db->query("SELECT letterid FROM letter ORDER BY letterid DESC LIMIT 1");
    	$result = $db->get();
    	foreach ($result as $v) {
    		$letterid=$v[0];
    	}
//all recievers
	if (isset($_POST['receivers'])) {
	  	$receiversArray = $_POST['receivers'];
	    for ($i=0; $i<count($receiversArray); $i++) {
	    	$receiver=$receiversArray[$i];
	        $db->query("INSERT INTO receivers (receiver,letterid,receivertype,view,archived) VALUES ('$receiver','$letterid','$receivertype','$view','$archived') ");
	    }
	}

//all attachments
	if (isset($_POST['attach_check'])) {
	  	$attach_checkArray = $_POST['attach_check'];
	    for ($j=0; $j<count($attach_checkArray); $j++) {
			$address="attachments/".$attach_checkArray[$j];
	        $db->query("INSERT INTO attachment (letterid,address) VALUES ('$letterid','$address') ");
	    }
	}

//print msg and close popup
	echo "<script>$('#popup-wrap').hide();</script><div class='ok'>رکورد مورد نظر با موفقیت ذخیره شد</div>";