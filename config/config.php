<?php
ob_start();
if(!isset($_SESSION)) 
{ 
		session_start(); 
} 

$con = mysqli_connect("localhost", "root", "","choretime");

if (mysqli_connect_errno()) {
	echo  'connect faild' . mysqli_connect_errno();
}

?>

