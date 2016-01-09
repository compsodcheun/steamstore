<?php 
	$mysqli=new mysqli(SERVER_NAME,USERNAME,PASSWORD,DB_NAME);
	$mysqli->set_charset('UTF8');
	if(mysqli_connect_errno()){
		echo "Conection Database Lost"." ".mysqli_connect_error();
		exit();
	}
 ?>