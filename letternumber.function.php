<?php

 function LetterNumber($letter_type){
	switch ($letter_type) {
		case 'internal':
			$letchar="د";
			break;
		case 'incoming':
			$letchar="و";
			break;
		case 'external':
			$letchar="ص";
			break;		
		default:
			# code...
			break;
	}
			$start = 10000;
			include 'config.php';
			//latest letter id
    		$db->query("SELECT letterid FROM letter ORDER BY letterid DESC LIMIT 1");
    		$result = $db->get();
    		if(empty($result)){return $start." / ".$letchar;}
    		else{
     		foreach ($result as $v) {
     			return ($v[0]+$start+1)." / ".$letchar;
     			}
     		}
}