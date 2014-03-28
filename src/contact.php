<?php

class contact
{
	public function __construct()
	{
		echo 'This is the Contact page'; 
	}
	
}
class add
{
	public function __construct()
	{
		include "form.htm";
		$fname=$_POST["fname"];
		echo $fname;
	}
	
}