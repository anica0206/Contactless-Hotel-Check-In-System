<?php
	$host='sql112.epizy.com';
	$username='epiz_34044351';
	$password='5seDrTWBZn31Qc'; 
	$db_name='epiz_34044351_checkinn'; 

	$connect_db = mysqli_connect($host, $username, $password, $db_name);
	

	if($connect_db)
	{
		//echo json_encode("Connected to DB");
	}
?>