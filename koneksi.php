<?php
$conn=mysqli_connect('localhost','root','','posyandu');
if (mysqli_connect_error()){
	echo "Connection failed: ".mysqli_connect_error();
	exit();	
} 
?>