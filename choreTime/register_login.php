<?php

include ("config/config.php");
include ("handlers/login_handler.php");
include ("handlers/register_handler.php");

$link = "http://" . $_SERVER['SERVER_NAME'] . '/choreTime/'; 

?>
<!doctype html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
    <!-- Bootstrap CSS -->
    
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
    <title>ChoreTime</title>
  </head>
  <body>
  	<?php 

	  	if((!empty($_SESSION['email']))){
			header('Location: index.php');
		} else{
	?>

	  	<div class="container-fluid no-padding">
	  		<div class="log">

				<div id="register_div">
					
					<div class="container">
						<h2 class="logo-login col-sm-8 offset-md-4">ChoreTime</h2>

						<div class="errors col-sm-8 offset-md-4">	
							<?php 
								
									if(!empty($error_array)){
										echo "<div>";
										foreach($error_array as $error){
											echo  "<p>". $error ."</p>";
										}
										echo "</div>";	
									}
							?>
						</div>
					
						<form method="post" enctype="multipart/form-data" action="register_login.php">

							<div class="form-group row">
								<label for="first_name" class="col-sm-4 col-form-label text-md-right">First Name</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="first_name" name="first_name">
								</div>
							</div>

							<div class="form-group row">
								<label for="last_name" class="col-sm-4 col-form-label text-md-right">Last Name</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="last_name" name="last_name">
								</div>
							</div>

							<div class="form-group row">
								<label for="room_no" class="col-sm-4 col-form-label text-md-right">Room No.</label>
								<div class="col-sm-8">

									<select id="room_no" name="room_no" class="form-control">
										<?php
											for($i=1; $i <= 30; $i++){
												echo '<option value="'. $i .'">'. $i .'</option>';
											}
										?>
									</select>
								</div>
							</div>

							<div class="form-group row">
								<label for="institute" class="col-sm-4 col-form-label text-md-right">Institute</label>
								<div class="col-sm-8">

									<select id="institute" name="institute" class="form-control">
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
									<input type="email" class="form-control" id="email" name="email">
								</div>
							</div>

							<div class="form-group row">
								<label for="password" class="col-sm-4 col-form-label text-md-right">Password</label>
								<div class="col-sm-8">
									<input type="password" class="form-control"  name="password">
								</div>
							</div>

							<div class="form-group row">
								<label for="password2" class="col-sm-4 col-form-label text-md-right">Confirm Password</label>
								<div class="col-sm-8">
									<input type="password" class="form-control"  name="password2">
								</div>
							</div>

							<div class="form-group row">
								<label for="pic" class="col-sm-4 col-form-label text-md-right">Picture</label>
								<div class="col-sm-8">
									<input type="file" class="float-left" id="pic" name="pic">
								</div>
							</div>

							<div class="form-group row">
								<div class="col-md-8 offset-md-4 row">
									<div class="col-md-4 no-padding">
										<button type="submit" class="btn btn-primary float-left" name="register">Register</button>
									</div>
									<div class="col-md-8 no-padding">
										<button  type="button" class="btn btn-success float-right" id='login_btn'>Login into account</button>
									</div>
								</div>
							</div>
							
						</form>
						
					</div>

				</div>

				<div id="login_div">
					<div class="container">
						<h2 class="logo-login col-sm-9 offset-md-3">ChoreTime</h2>
						<?php
							if (!empty($_GET['message'])) {
							    echo "Registration Successful. Please log in.";
							}
						?>

						<div class="errors col-sm-8 offset-md-4">	
							<?php 
								
								if(!empty($error_array_log)){
									echo "<div>";
									foreach($error_array_log as $error){
										echo  "<p>". $error ."</p>";
									}
									echo "</div>";	
								}
							?>
						</div>

						<form method="POST" action="register_login.php">
							<div class="form-group row">
								<label for="email" class="col-sm-3 col-form-label text-md-right">Email address</label>
								<div class="col-sm-9">
									<input type="Email" class="form-control" name="email">
								</div>
								
							</div>
							<div class="form-group row">
								<label for="password" class="col-sm-3 col-form-label text-md-right">Password</label>
								<div class="col-sm-9">
									<input type="password" class="form-control"  name="password">
								</div>
							</div>

							<div class="form-group row">
								<div class="col-md-9 offset-md-3 row">
									<div class="col-md-6 no-padding">
										<button type="submit" class="btn btn-primary float-left" name="login">Login</button>
									</div>
									<div class="col-md-6 no-padding">
										<button type="button" class="btn btn-success float-right" id='register_btn'>Create new account</button>
									</div>
								</div>
							</div>
							
							
						</form>
					</div>
				</div>
			</div>
		</div>

	<?php
		}		
	?>
<?php
include ("footer.php");
?>


<?php

if (isset($_POST['login'])) {
	echo '
	<script>
	$(document).ready(function() {
		$("#register_div").hide();
		$("#login_div").show();
	});

	</script>
	';
}


if (isset($_POST['register'])) {
    echo '
		<script>
		$(document).ready(function() {
			$("#register_div").show();
			$("#login_div").hide();
		});

		</script>
		';
}

?>