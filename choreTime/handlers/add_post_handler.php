<?php
	date_default_timezone_set('Europe/Tallinn');
	$username = $_SESSION['first_name'] . " " . $_SESSION['last_name'];
	$timestamp= date('Y-m-d H:i:s');
	
	$error_array = [];

	//clear the input from tags
	function clear($sanitize)
	{
		$sanitize = strip_tags($sanitize);
		return $sanitize;
	}

	//if the post button was pressed
	if (isset($_POST['post'])) {
		$textpost = clear($_POST['textpost']);
		$textpost = $con->real_escape_string($textpost);

		if (strlen($textpost) < 6) {
			array_push($error_array, "Text too short.");
		}

		//upload the picture
		$target_dir = "uploadsPost/";
		$target_file = $target_dir . basename($_FILES["picpost"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		//if there are no errors, then upload the data to database
		if (empty($error_array)) {
			//upload image to upload folder
			move_uploaded_file($_FILES["picpost"]["tmp_name"], $target_file);

			if ($_FILES['picpost']['name'] != "") {
				
				$query = mysqli_query($con,"INSERT INTO newsfeed VALUES('', '$user_id', '$username','$textpost','$timestamp','$target_file')");
			} else {
				$query = mysqli_query($con,"INSERT INTO newsfeed VALUES('', '$user_id', '$username','$textpost','$timestamp','')");
			}



		}


	}



?>

						





