<?php
$abs = $_SERVER['DOCUMENT_ROOT'] . '/choreTime/';
include $abs. "/header.php";
?>

<?php
	$user_id = 	$_SESSION['id'];
	$id = $_GET['id'];

	if($_GET['user_id'] == $user_id){
		$query = mysqli_query($con,"DELETE FROM newsfeed WHERE id = '$id' AND user_id = $user_id");
	}
	
	header('Location: index.php');
?>

<?php
include ("footer.php");
?>

