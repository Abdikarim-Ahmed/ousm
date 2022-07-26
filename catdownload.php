<?php
include('includes/dbcon.php');
if(isset($_GET['filename'])) 
{ 
	$filename= $_GET['filename']; 
	$query = mysqli_query($myconn,"SELECT * FROM cat WHERE filename = '$filename'"); 
	header('Content-type: application/octet-stream'); 
	header('Content-Disposition: attachment; filename="'.basename($filename).'"' ); 
	header('Content-length: ' . filesize($filename)); 
	readfile ($filename); 
	exit; 
}  
?>