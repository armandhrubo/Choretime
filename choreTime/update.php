<?php
require('header.php');

include ("handlers/register_handler.php");
include ("handlers/update_handler.php");
include ("menu.php");
?>

<?php

	if ((empty($_SESSION['email']))) {
		header('Location: index.php');
 
 	} else {
		 
		if (!empty($error_array)) {
		 	echo "<div style='color:red;'>";
		 	foreach ($error_array as $error) {
			 	echo  "<p>". $error ."</p>";
		 	}
		 echo "</div>";	
	 	}
 	}

?>

	<div class="container-fluid no-padding">
		<div class="settings">

		<div class="container">
			<h2 class="logo-login col-sm-8 offset-md-4">Settings</h2>
			<form method="post" enctype="multipart/form-data">

				<div class="form-group row">
					<label for="first_name" class="col-sm-4 col-form-label text-md-right">First Name</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $row['first_name']; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label for="last_name" class="col-sm-4 col-form-label text-md-right">Last Name</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $row['last_name'];  ?>">
					</div>
				</div>

				<div class="form-group row">
					<label for="room_no" class="col-sm-4 col-form-label text-md-right">Room No.</label>
					<div class="col-sm-8">

						<select id="room_no" name="room_no" class="form-control" value="<?php echo $row['room_no']; ?>">
							<?php
								for ($i=1; $i <= 30; $i++) {
									echo '<option value="'. $i .'">'. $i .'</option>';
								}
							?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label for="institute" class="col-sm-4 col-form-label text-md-right">Institute</label>
					<div class="col-sm-8">

						<select id="institute" name="institute" class="form-control" value="<?php echo $row['institute'];  ?>">
							<option value="Tallinn University">Tallinn University</option>
							<option value="Tallinn University Of Technology">Tallinn University Of Technology</option>
							<option value="Estonian Business School">Estonian Business School</option>
							<option value="EUAS">EUAS</option>
						</select>

					</div>
				</div>

				<div class="form-group row">
					<label for="email" class="col-sm-4 col-form-label text-md-right">Email address</label>
					<div class="col-sm-8">
						<input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email'];  ?>">
					</div>
				</div>

				<div class="form-group row">
					<label for="password" class="col-sm-4 col-form-label text-md-right">Password</label>
					<div class="col-sm-8">
						<input type="password" class="form-control"  name="password" value="<?php echo $row['password'];  ?>">
					</div>
				</div>

				<div class="form-group row">
					<label for="password2" class="col-sm-4 col-form-label text-md-right">Confirm Password</label>
					<div class="col-sm-8">
						<input type="password" class="form-control"  name="password2" value="<?php echo $row['password'];  ?>">
					</div>
				</div>

				<div class="form-group row">
					<label for="pic" class="col-sm-4 col-form-label text-md-right">Picture</label>
					<div class="col-sm-8">
						<input type="file" class="float-left" id="pic" name="pic">
					</div>
				</div>

				<button type="submit" class="btn btn-primary" name="update">Update</button>
			</form>
		</div>






<?php
require('footer.php');
?>
