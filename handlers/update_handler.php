<?php
$user_logged =  $_SESSION['email'];
$user_id = 	$_SESSION['id'];
$pic = $_SESSION['pic'];
$query = mysqli_query($con, "SELECT * FROM users WHERE id = '$user_id'");
$row = mysqli_fetch_array($query);
$error_array = [];



if (isset($_POST['update'])) {


	$password=clear($_POST['password']);
	$password2= clear($_POST['password2']);
	$room_no= clear($_POST['room_no']);
	$email = clear($_POST['email']);
	$first_name = clear($_POST['first_name']);
	$last_name = clear($_POST['last_name']);
	$institute = clear($_POST['institute']);

	$hash = $row['password'];



	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$email_check = mysqli_query($con, "SELECT email FROM  users WHERE  email = '$email'");
		$num_rows = mysqli_num_rows($email_check);

		$user_email = mysqli_query($con, "SELECT * FROM  users WHERE  email = '$email' AND id ='$user_id' ");
		$email_row = mysqli_num_rows($user_email);
		$email_arr = mysqli_fetch_array($user_email);


		if ($num_rows > 0 && $email_row == 0) {

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

	if (empty($error_array)) {


		if (password_verify($password, $hash)) {

			$query = "UPDATE users SET email ='$email', room_no = $room_no, first_name='$first_name', last_name = '$last_name', institute = '$institute' 
			WHERE id = '$user_id'";
	
			$result = mysqli_query($con,$query);

			if($_FILES['pic']['name'] != ""){

				$target_dir = "uploads/";
				$target_file = $target_dir . basename($_FILES["pic"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
					move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file);
	
				$query = "UPDATE users SET pic ='$target_file' WHERE id = '$user_id'";
				$result = mysqli_query($con,$query);	
	
			}	

		} else {

			$query = "UPDATE users SET password = '$password', email ='$email', room_no = $room_no, first_name='$first_name', last_name = '$last_name', institute = '$institute' 
			WHERE id = '$user_id'";

			$result = mysqli_query($con,$query);	
			

			if ($_FILES['pic']['name'] != "") {

				$target_dir = "uploads/";
				$target_file = $target_dir . basename($_FILES["pic"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
					move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file);
	
				$query = "UPDATE users SET pic ='$target_file' WHERE id = '$user_id'";
				$result = mysqli_query($con,$query);	
	
			}
		} 
		
		$_SESSION['password'] = "";
		$_SESSION['password2'] = "";
		$_SESSION['room_no'] = "";
		$_SESSION['email'] = "";
		$_SESSION['first_name'] = "";
		$_SESSION['last_name'] = "";
		$_SESSION['institute'] = ""; 
		
		header('Location: logout.php');
		exit(); 
	}


	};

		


?>