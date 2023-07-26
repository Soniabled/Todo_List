<?php
	$conn = new mysqli("localhost", "root", "", "todo");
 
	if(!$conn){
		die("Error: Cannot connect to the database");
	}
?>