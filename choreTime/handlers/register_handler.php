<?php

$password= "";
$password2= "";
$room_no= "";
$email = "";
$first_name = "";
$last_name = "";
$institute = "";
$error_array = [];

function clear($sanitize)
{
	$sanitize = strip_tags($sanitize);
	$sanitize = trim($sanitize);
	return $sanitize;
}

if (isset($_POST['register'])) {

	$password=clear($_POST['password']);
	$password2= clear($_POST['password2']);
	$room_no= clear($_POST['room_no']);
	$email = clear($_POST['email']);
	$first_name = clear($_POST['first_name']);
	$last_name = clear($_POST['last_name']);
	$institute = clear($_POST['institute']);

	if ($password != $password2) {
		array_push($error_array, 'Passwords do not match.');
	} else {
		if (preg_match('/[^A-Za-z0-9]/',$password)) {
			array_push($error_array, 'Passwords must contain letters and digits.');
		}
	}

	if (strlen($password) > 20 || strlen($password) < 6) {
		array_push($error_array, "Password must be between 6 and 20 characters.");
	}

	$email = filter_var($email, FILTER_SANITIZE_EMAIL);

	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$email_check = mysqli_query($con, "SELECT email FROM  users WHERE  email = '$email'");
		$num_rows = mysqli_num_rows($email_check);

		if($num_rows > 0){
			array_push($error_array, "This email already exists.");
		}

	} else {
		array_push($error_array, "The email is not valid.");
	}

	if (strlen($first_name) > 20 || strlen($first_name) < 3) {
		array_push($error_array, "First name must be between 3 and 20 characters");
	}

	if (strlen($last_name) > 20 || strlen($last_name) < 3) {
		array_push($error_array, "Last name must be between 3 and 20 characters");
	}

	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["pic"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


	if (empty($error_array)) {

		$password = password_hash($password, PASSWORD_DEFAULT);

		if ($_FILES['pic']['name'] == "") {
			$query = mysqli_query($con,"INSERT INTO users VALUES('','$password','$room_no','$email','$first_name','$last_name','$institute','')");
		} else {
			$query = mysqli_query($con,"INSERT INTO users VALUES('','$password','$room_no','$email','$first_name','$last_name','$institute','$target_file')");
		}

		move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file);
		
		$_SESSION['password'] = "";
		$_SESSION['password2'] = "";
		$_SESSION['room_no'] = "";
		$_SESSION['email'] = "";
		$_SESSION['first_name'] = "";
		$_SESSION['last_name'] = "";
		$_SESSION['institute'] = "";

		header('Location: register_login.php?message=success');
		exit(); 
	}


}



?>

						





