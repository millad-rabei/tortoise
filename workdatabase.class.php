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

	public function getcolumns($tablename){
		include 'config.php';
		$this->table = (string) $tablename;
		//Get count of column of table
		$db->query("SELECT COUNT(*) AS columns FROM INFORMATION_SCHEMA.COLUMNS WHERE table_schema = 'tortoise' AND table_name = '$this->table'");
		$this->count_column = $db->get('columns');
		echo $this->count_column.'<br>';
	}		
	
	
}