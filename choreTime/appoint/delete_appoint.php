

<?php
$abs = $_SERVER['DOCUMENT_ROOT'] . '/choreTime/';
include $abs. "/header.php";
?>

<?php
	$user_id = 	$_SESSION['id'];
	$id_appointment = $_GET['id'];

	if ($_GET['type'] == "laundry") {
		$table_name = "laundry_app";
		$id_name = "id_laundry";
	} 
	else if ($_GET['type'] == "cooking") {
		$table_name = "cooking_app";
		$id_name = "id_cooking";
	}

	$query = mysqli_query($con,"DELETE FROM `$table_name` WHERE `$id_name` = '$id_appointment'");

	header('Location: get_appoint.php');
?>



<?php
include ("../footer.php");
?>

