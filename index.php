<?php

 include ("header.php"); 

	$user_logged =  $_SESSION['email'];
	$pic = $_SESSION['pic'];
	$user_id = 	$_SESSION['id'];

?>

<?php
	include ("menu.php");
	include ("handlers/add_post_handler.php");
?>

<?php
	$query = mysqli_query($con,"SELECT * FROM newsfeed ORDER BY timestamp DESC");
	
?>


	<div id="modal">
		<img src="" alt="" id="modal_img">
		<span id="close">X CLOSE</span>
	</div>
	
<div class="container-fluid homepage no-padding">
	<div class="container-fluid white-back no-padding">
		<div  class="container center height-100">
			<div class="row height-100">
				<div class="col-md-8 height-100">
					<div class="scroll">
						<div class="container add_post">
							<form method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-2 no-padding text-right">
										<?php
											if (!empty($_SESSION['pic'])) {
												echo '<img class="myImage" src="'. $pic . '">';
												
											} else {
												echo '<img src="images/placeholder.png" class="myImage">';
											}
										?>
									</div>
									<div class="col-md-10">
										<textarea rows="4" cols="50" name="textpost"></textarea>
										<input type="file" class="form-control" id="picpost" name="picpost">
										<button type="submit" class="btn btn-primary float-right" name="post">Post</button>
									</div>
								</div>
							</form>
						</div>

					<?php
						while ($row = mysqli_fetch_array($query)) {
					?>

							<div class='jumbotron jumbotron-fluid post text-left'>
								<div class='container'>
									<h6 class='display-4'><?php echo $row['user_name']; ?></h6>
									<p class='lead datepost'><?php echo $row['timestamp']; ?></p>
									
									<?php
										if ($row['user_id'] == $user_id) {
											echo '<a href="delete_post.php?id='. $row['id'] . '&user_id=' . $user_id . '" class="delete-post" data-toggle="tooltip" data-placement="left" title="Delete post">
												<img src="images/bin.png">
											</a>';

										}
									?>
									
									<div style="clear:both;">
										<p class='lead'> <?php echo $row['text']; ?></p>
									</div>
									<div class="text-center">
										<img class='lead' src="<?php echo $row['picpost']; ?>">
									</div>
									
								</div>
							</div>		
								
					<?php }

					?>

					</div>
				</div>
				<div class="col-md-4">
					<div class="profile-homepage">
						<h2>Student Profile</h2>
						<?php
							if (!empty($_SESSION['pic'])) {
								echo '<img src="'. $pic . '" alt="" id="" >';
							} else {
								echo '<img src="images/placeholder.png" alt="" id="myImg" >';
							}
						?>
						
						<div class="text-left information">
							<p> Name: <?php echo $_SESSION['first_name'].' '. $_SESSION['last_name'];?> </p>
							<p> Room no.: <?php echo $_SESSION['room_no']; ?> </p>
							<p> Institute: <?php echo $_SESSION['institute']; ?> </p>
							<p> Email: <?php echo $_SESSION['email']; ?> </p>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>



<?php
	include ("footer.php");
?>

