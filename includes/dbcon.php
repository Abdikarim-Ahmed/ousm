<?php
	$host="localhost";
	$user="root";
	$pwd="";
	$db="ousm";
	$myconn=mysqli_connect($host, $user, $pwd, $db);
	if($myconn){
	//echo "conection to database successful";
	}
	else
	{
		echo "connection to database failed";
	}
?>