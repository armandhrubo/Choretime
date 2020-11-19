<?php

$error_array_log = [];

if (isset($_POST['login'])) {

	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

	$password = $_POST['password'];
	$check_login_mail = mysqli_query($con, "SELECT * FROM  users WHERE email = '$email'");

	$check_login_query = mysqli_num_rows($check_login_mail);

	if ($check_login_query == 1) {
		$row = mysqli_fetch_array($check_login_mail);

		$hash = $row['password'];

	 	if (password_verify($password, $hash)) {
			
			$_SESSION['email'] = $email; 
			$_SESSION['last_name'] = $row['last_name']; 
			$_SESSION['first_name'] = $row['first_name']; 
			$_SESSION['pic'] = $row['pic']; 
			$_SESSION['id'] = $row['id'];
			$_SESSION['room_no'] = $row['room_no'];
			$_SESSION['institute'] = $row['institute'];

		} 
	} else {
		array_push($error_array_log, "Incorrect email or password. Please try again.");
	} 
	
}
?>