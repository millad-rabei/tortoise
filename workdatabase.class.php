<?php

Class workdatabase
{
	public $table;
	public $count_column;
	public $id;

	public function fetch($tablename){
		include 'config.php';
		$this->table = (string) $tablename;
		$db->query("SELECT * FROM $this->table");
		// Get an array of items:
		$result = $db->get();
   		 	
   		 echo "
   		 <input rel='".$this->table."' class='add' type='image' src='../images/logo-min.png' value='' id=''><br>";
   		 foreach ($result as $v) {
   		 	//print result
     		  echo "<span value='".$v[0]."'>".$v[1]."</span>
     		  		<input rel='".$this->table."' class='edit' type='image' src='../images/edit.png' id='".$v[0]."' value='".$v[1]."'>
     		  		<input rel='".$this->table."' class='delete' type='image' src='../images/delete.png' id='".$v[0]."' value='".$v[1]."'>
     		  <br>";
   		}
	}
	//show user information
	public function fetchuser($tablename){
		include 'config.php';
		$this->table = (string) $tablename;
		//user info
		$db->query("SELECT * FROM $this->table");
		$result = $db->get();

   		 echo "
   		 <input popsize='large' rel='".$this->table."' class='adduser' type='image' src='../images/logo-min.png' value='' id=''><br>
   		 <table class='tblresult' >
   		 <tr class='trtop'>
   		 <td></td>
   		 <td></td>
   		 <td></td>
   		 <td></td>
   		 <td>نام کاربری</td>
   		 <td>نام</td>
   		 <td>نام خانوادگی</td>
   		 <td>کد ملی</td>
   		 <td>سمت ها</td>
   		 <td>گروه</td>
   		 <td>جانشین</td>
   		 <td>تاریخ ایجاد کاربر</td>
   		 </tr>
   		 ";
   		  	//print result $v[0]
   		 foreach ($result as $v) {

     echo "
     	 <tr class=''>
   		 <td></td>
   		 <td><input rel='".$this->table."' class='edit' type='image' src='../images/edit.png' id='".$v[0]."' value='".$v[1]."'></td>
   		 <td><input rel='".$this->table."' class='delete' type='image' src='../images/delete.png' id='".$v[0]."' value='".$v[1]."'></td>
   		 <td></td>
   		 <td>".$v[1]."</td>
   		 <td>".$v[3]."</td>
   		 <td>".$v[4]."</td>
   		 <td>".$v[7]."</td>
   		 <td>";
   		    //group info per user
   			$db->query("SELECT title.title FROM title INNER JOIN usertitle ON title.titleid=usertitle.titleid WHERE usertitle.userid='$v[0]'");
			$result2 = $db->get();
   		 	foreach ($result2 as $v2) { echo $v2[0]." "; }
   		echo "</td>
   		 <td>";
   		    //group info per user
   			$db->query("SELECT groups.groupname FROM groups INNER JOIN usergroup ON groups.groupid=usergroup.groupid WHERE usergroup.userid='$v[0]'");
			$result3 = $db->get(); 	
   		 	foreach ($result3 as $v3) { echo $v3[0]."<br>"; }
   		echo "</td>
   		 <td>";
   		 if ($v[11]=="") echo "ندارد"; else echo $v[11];
   		 echo "</td>
   		 <td>".$v[6]."</td>
   		 </tr>
     		  <br>";
   		}
   		echo "</table>";
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