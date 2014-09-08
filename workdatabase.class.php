<?php

Class workdatabase
{
	public $table;
	public $count_column;
	public $id;
  public $part;

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
   		 </tr>
     		  <br>";
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
       </tr>
          <br>";
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
   		 </tr>
     		  <br>";
   		}
   		echo "</table>";
	}

  //addletter part
  public function fetchletter($partname){
    include 'config.php';
    $this->part = (string) $partname;
    echo  $this->part;
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