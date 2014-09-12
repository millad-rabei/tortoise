<?php

Class workdatabase
{
	public $table;
	public $count_column;
	public $id;
  public $part;
  public $partname;
  public $userid;

	public function fetch($tablename){
		include 'config.php';
		$this->table = (string) $tablename;
		$db->query("SELECT * FROM $this->table");
		// Get an array of items:
		$result = $db->get();
   		 	
   		 echo "
   		 <input rel='".$this->table."' class='add' type='image' src='../images/add.png' value='' id=''>
   		 <table class='tblresult' >
   		 <tr class='trtop'>
   		 <td></td>
   		 <td></td>
   		 <td></td>
   		 <td></td>
   		 </tr>
   		 ";
   		 
   		 foreach ($result as $v) {
   		 	//print result
     		  echo "
   		 <tr class=''>
   		 <td><input rel='".$this->table."' class='edit' type='image' src='../images/edit.png' id='".$v[0]."' value='".$v[1]."'></td>
   		 <td><input rel='".$this->table."' class='delete' type='image' src='../images/delete.png' id='".$v[0]."' value='".$v[1]."'></td>
   		 <td></td>
   		 <td><span value='".$v[0]."'>".$v[1]."</span></td>
   		 </tr>";
   		}
   		echo "</table>";
	}

//show title information
   public function fetchtitle($tablename){
      include 'config.php';
      $this->table = (string) $tablename;
      //user info
      $db->query("SELECT * FROM $this->table");
      $result = $db->get();

          echo "
          <input popsize='small' rel='".$this->table."' class='addtitle2' type='image' src='../images/add.png' value='' id=''><br>
          <table class='tblresult' >
           <tr class='trtop'>
       <td></td>
       <td></td>
       <td></td>
       <td>عنوان</td>
       <td>گروه</td>
       </tr>";
       foreach ($result as $v) {
        //print result
          echo "
       <tr class=''>
       <td><input rel='".$this->table."' class='edit' type='image' src='../images/edit.png' id='".$v[0]."' value='".$v[1]."'></td>
       <td><input rel='".$this->table."' class='delete' type='image' src='../images/delete.png' id='".$v[0]."' value='".$v[1]."'></td>
       <td></td>
       <td><span value='".$v[0]."'>".$v[1]."</span></td>
       <td>";
      $db->query("SELECT groups.groupname FROM groups INNER JOIN title ON groups.groupid=title.groupid WHERE title.titleid='$v[0]'");
      $result2 = $db->get();
        foreach ($result2 as $v2) { echo $v2[0]." "; }
       echo "</td>
       </tr>";
      }
      echo "</table>";
   }

	//show user information
	public function fetchuser($tablename){
		include 'config.php';
		$this->table = (string) $tablename;
		//user info
		$db->query("SELECT * FROM $this->table");
		$result = $db->get();

   		 echo "
   		 <input popsize='large' rel='".$this->table."' class='adduser' type='image' src='../images/add.png' value='' id=''><br>
   		 <table class='tblresult' >
   		 <tr class='trtop'>
   		 <td></td>
   		 <td></td>
   		 <td>نام کاربری</td>
   		 <td>نام</td>
   		 <td>نام خانوادگی</td>
   		 <td>کد ملی</td>
   		 <td>سمت ها</td>
   		 <td>جانشین</td>
   		 <td>تاریخ ایجاد کاربر</td>
   		 </tr>
   		 ";
   		  	//print result $v[0]
   		 foreach ($result as $v) {
        // go to popup.js
     echo "
     	 <tr class=''>
   		 <td><input rel='".$this->table."' class='edituser' type='image' src='../images/edit.png' id='".$v[0]."' value='".$v[1]."'></td>
   		 <td><input rel='".$this->table."' class='delete' type='image' src='../images/delete.png' id='".$v[0]."' value='".$v[1]."'></td>
   		 <td>".$v[1]."</td>
   		 <td>".$v[3]."</td>
   		 <td>".$v[4]."</td>
   		 <td>".$v[7]."</td>
   		 <td>";
   		    //group info per user
   			$db->query("SELECT title.title FROM title INNER JOIN usertitle ON title.titleid=usertitle.titleid WHERE usertitle.userid='$v[0]'");
			$result2 = $db->get();
   		 	foreach ($result2 as $v2) { echo $v2[0]."</br>"; }
   		echo "</td><td>";
   		 if ($v[11]=="not-select") echo "ندارد"; else{
        //fetch successor from user table
            $db->query("SELECT * FROM $this->table WHERE userid='$v[11]'");
            $result = $db->get();
            foreach ($result as $s) {
        echo $s[3]." ".$s[4];}
      }
   		 echo "</td>
   		 <td>".$v[6]."</td>
   		 </tr>";
   		}
   		echo "</table>";
	}

  //addletter part
  public function fetchletter($partname,$userid){
    include 'config.php';
    $this->part = (string) $partname;
    $this->uid = (string) $userid;
//letters//////////////////////////////
    if($this->part=="letters"){
       echo "
       <table class='tblresult' >
       <tr class='trtop'>
       <td></td>
       <td></td>
       <td>وضعیت مشاهده</td>
       <td>وضعیت ارسال</td>
       <td>سمت مرتبط</td>
       <td>شماره نامه</td>
       <td>فایل ضمیمه</td>
       <td>فرستنده</td>
       <td>جهت</td>
       <td>تاریخ ارسال نامه</td>
       </tr>";
          //letter info
    
      $loged_userid=$this->uid;
      
    $db->query("SELECT titleid FROM usertitle WHERE userid='$loged_userid' ");
    $result3 = $db->get();
    foreach ($result3 as $r) {
      $loged_usertitleid =$r[0];
          //Get letter id for this loged in user
    $db->query("SELECT * FROM receivers WHERE (receiver='$loged_usertitleid' AND archived='no' ) ");
    $result = $db->get();
    foreach ($result as $receivers) {
      $usertitle=$receivers[1];
      $letterid=$receivers[2];
      $receivertype = $receivers[3];
      $view = $receivers[4];
      $archived = $receivers[5];
      //show letters
    $db->query("SELECT * FROM letter WHERE (letterid='$letterid' AND type='داخلی' AND status='ارسال شده')");
    $result2 = $db->get();
          //print result $v[0]
       foreach ($result2 as $v) {
        // go to popup.js
     echo "
       <tr class='";
       if ($view != "no"){echo "viewed";}else{echo "";}
       echo "'>
       <td><input rel='".$this->table."' class='edituser' type='image' src='../images/edit.png' id='".$v[0]."' value='".$v[1]."'></td>
       <td><input rel='".$this->table."' class='delete' type='image' src='../images/delete.png' id='".$v[0]."' value='".$v[1]."'></td>
       <td><input rel='".$this->table."' class='view' type='image' src='../images/";
      if ($view != "no"){echo "bulb-on.png";}else{echo "bulb-off.png";}
       echo "' id='".$v[0]."' value='".$v[1]."'></td>
       <td>".$receivertype."</td>
       <td>";
    //Get title of user that recieved letter
    $db->query("SELECT title.title FROM title INNER JOIN usertitle ON title.titleid=usertitle.titleid WHERE usertitle.titleid='$usertitle'");
    $result4 = $db->get();
    foreach ($result4 as $utl) {echo $utl[0];}
       echo "</td>
       <td>".$v[4]."</td>
       <td>".$v[14]."</td>
       <td>";
    //Get user title
    $db->query("SELECT title.title FROM title INNER JOIN letter ON title.titleid=letter.usertitle WHERE letter.letterid='$v[0]'");
    $result2 = $db->get();
    foreach ($result2 as $ut) {echo $ut[0];}
       echo "</td>
       <td>".$v[15]."</td>
       <td>".$v[7]."</td>
       </tr>";
      }
      
    }
    }

    echo "</table>";
  }
//addletter//////////////////////////////  
    if($this->part=="addletter"){
    //letter info
    $db->query("SELECT * FROM letter");
    $result = $db->get();
    echo "
       <table class='tblresult' >
       <tr class='trtop'>
       <td></td>
       <td></td>
       <td>وضعیت</td>
       <td>نوع نامه</td>
       <td>شماره نامه</td>
       <td>فایل ضمیمه</td>
       <td>ایجاد کننده</td>
       <td>جهت</td>
       <td>تاریخ ایجاد نامه</td>
       </tr>";
          //print result $v[0]
       foreach ($result as $v) {
        // go to popup.js
     echo "
       <tr class=''>
       <td><input rel='".$this->table."' class='edituser' type='image' src='../images/edit.png' id='".$v[0]."' value='".$v[1]."'></td>
       <td><input rel='".$this->table."' class='delete' type='image' src='../images/delete.png' id='".$v[0]."' value='".$v[1]."'></td>
       <td>".$v[13]."</td>
       <td>".$v[10]."</td>
       <td>".$v[4]."</td>
       <td>".$v[14]."</td>
       <td>";
    //Get user title
    $db->query("SELECT title.title FROM title INNER JOIN letter ON title.titleid=letter.userid WHERE letter.letterid='$v[0]'");
    $result2 = $db->get();
    foreach ($result2 as $ut) {echo $ut[0];}
       echo "</td>
       <td>".$v[15]."</td>
       <td>".$v[7]."</td>
       </tr>";
      }
      echo "</table>";
    }
//Archive//////////////////////////////
        if($this->part=="archive"){
       echo "
       <table class='tblresult' >
       <tr class='trtop'>
       <td></td>
       <td></td>
       <td>وضعیت مشاهده</td>
       <td>وضعیت ارسال</td>
       <td>سمت مرتبط</td>
       <td>شماره نامه</td>
       <td>فایل ضمیمه</td>
       <td>فرستنده</td>
       <td>جهت</td>
       <td>تاریخ ارسال نامه</td>
       </tr>";
          //letter info
    
      $loged_userid=$this->uid;
      
    $db->query("SELECT titleid FROM usertitle WHERE userid='$loged_userid' ");
    $result3 = $db->get();
    foreach ($result3 as $r) {
      $loged_usertitleid =$r[0];
          //Get letter id for this loged in user
    $db->query("SELECT * FROM receivers WHERE (receiver='$loged_usertitleid' AND archived!='no' ) ");
    $result = $db->get();
    foreach ($result as $receivers) {
      $usertitle=$receivers[1];
      $letterid=$receivers[2];
      $receivertype = $receivers[3];
      $view = $receivers[4];
      $archived = $receivers[5];
      //show letters
    $db->query("SELECT * FROM letter WHERE (letterid='$letterid' AND type='داخلی' AND status='ارسال شده')");
    $result2 = $db->get();
          //print result $v[0]
       foreach ($result2 as $v) {
        // go to popup.js
     echo "
       <tr class='";
       if ($view != "no"){echo "viewed";}else{echo "";}
       echo "'>
       <td><input rel='".$this->table."' class='edituser' type='image' src='../images/edit.png' id='".$v[0]."' value='".$v[1]."'></td>
       <td><input rel='".$this->table."' class='delete' type='image' src='../images/delete.png' id='".$v[0]."' value='".$v[1]."'></td>
       <td><input rel='".$this->table."' class='view' type='image' src='../images/";
      if ($view != "no"){echo "bulb-on.png";}else{echo "bulb-off.png";}
       echo "' id='".$v[0]."' value='".$v[1]."'></td>
       <td>".$receivertype."</td>
       <td>";
    //Get title of user that recieved letter
    $db->query("SELECT title.title FROM title INNER JOIN usertitle ON title.titleid=usertitle.titleid WHERE usertitle.titleid='$usertitle'");
    $result4 = $db->get();
    foreach ($result4 as $utl) {echo $utl[0];}
       echo "</td>
       <td>".$v[4]."</td>
       <td>".$v[14]."</td>
       <td>";
    //Get user title
    $db->query("SELECT title.title FROM title INNER JOIN letter ON title.titleid=letter.usertitle WHERE letter.letterid='$v[0]'");
    $result2 = $db->get();
    foreach ($result2 as $ut) {echo $ut[0];}
       echo "</td>
       <td>".$v[15]."</td>
       <td>".$v[7]."</td>
       </tr>";
      }
      
    }
    }

    echo "</table>";
  }

  }


	public function getcolumns($tablename){
		include 'config.php';
		$this->table = (string) $tablename;
		//Get count of column of table
		$db->query("SELECT COUNT(*) AS columns FROM INFORMATION_SCHEMA.COLUMNS WHERE table_schema = 'tortoise' AND table_name = '$this->table'");
		$this->count_column = $db->get('columns');
		echo $this->count_column.'<br>';
	}		
	
	
}