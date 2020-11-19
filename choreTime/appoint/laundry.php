<?php

$abs = $_SERVER['DOCUMENT_ROOT'] . '/choreTime/';
include $abs. "/header.php";

include $abs. "/menu.php";


?>


<div class="container-fluid no-padding">
	<div class="laundry-background">
		<h1>Laundry</h1>

<?php
	echo '<div style="color: red;">';
	include ("register_appoint.php");
	echo '</div>';
?>

<?php

$date_time1 = new DateTime('08:00:00');
$date_time2 = new DateTime('09:00:00');
$date_time3 = new DateTime('10:00:00');
$date_time4 = new DateTime('11:00:00');
$date_time5 = new DateTime('12:00:00');
$date_time6 = new DateTime('13:00:00');
$date_time7 = new DateTime('14:00:00');
$date_time8 = new DateTime('15:00:00');
$date_time9 = new DateTime('16:00:00');
$date_time10 = new DateTime('17:00:00');
$date_time11= new DateTime('18:00:00');
$date_time12 = new DateTime('19:00:00');
$date_time13 = new DateTime('20:00:00');
$date_time14 = new DateTime('21:00:00');
$date_time15 = new DateTime('22:00:00');



if (isset($_GET['laundry_machine'])) {

	$link_get =	$_GET['laundry_machine'];

	$machineCount = ['laundry_machine1','laundry_machine2','laundry_machine3','laundry_machine4','laundry_machine5','laundry_machine6'];

	if (in_array($link_get,$machineCount)) {
?>
	<div class="container add_appoint">
		<form method="POST">
			<div class="form-group padding-bottom-15 padding-top-15">
				<label for="hours">Select interval</label>
				<select id="hours" name="hours" class="form-control">
					<option value="<?php echo $date_time1-> format('H:i:s'); ?>">08:00-09:00</option>
					<option value="<?php echo $date_time2-> format('H:i:s'); ?>">09:00-10:00</option>
					<option value="<?php echo $date_time3-> format('H:i:s'); ?>">10:00-11:00</option>
					<option value="<?php echo $date_time4-> format('H:i:s'); ?>">11:00-12:00</option>
					<option value="<?php echo $date_time5-> format('H:i:s'); ?>">12:00-13:00</option>
					<option value="<?php echo $date_time6-> format('H:i:s'); ?>">13:00-14:00</option>
					<option value="<?php echo $date_time7-> format('H:i:s'); ?>">14:00-15:00</option>
					<option value="<?php echo $date_time8-> format('H:i:s'); ?>">15:00-16:00</option>
					<option value="<?php echo $date_time9-> format('H:i:s'); ?>">16:00-17:00</option>
					<option value="<?php echo $date_time10-> format('H:i:s'); ?>">17:00-18:00</option>
					<option value="<?php echo $date_time11-> format('H:i:s'); ?>">18:00-19:00</option>
					<option value="<?php echo $date_time12-> format('H:i:s'); ?>">19:00-20:00</option>
					<option value="<?php echo $date_time13-> format('H:i:s'); ?>">20:00-21:00</option>
					<option value="<?php echo $date_time14-> format('H:i:s'); ?>">21:00-22:00</option>
					<option value="<?php echo $date_time15-> format('H:i:s'); ?>">22:00-23:00</option>
				</select>
			</div>
			<div class="form-group padding-bottom-15">
				<label for="date">Select date</label>
				<input type="date" class="form-control" id="date" name="date" required> 
			</div>

			<input type="hidden" name="laundry_machine" value="<?php echo $link_get; ?>">
			<button type="submit" class="btn btn-primary" name="laundry_machine_btn">Submit appointment</button>
		</form>
	</div>
<?php

	} else {
		echo "PAGE NOT FOUND 404";
	}


} else {
?>
	<div class="container laundry-list">
		<div class="row row-cols-3">
			<div class="col">
				<div class="laundry-single">
					<h6>Laundry 1</h6>
					<div>
						<img src="../images/washing-machine.png">
					</div>
					<a href="?laundry_machine=laundry_machine1">
						Make appointment
					</a>
				</div>
			</div>
			<div class="col">
				<div class="laundry-single">
					<h6>Laundry 2</h6>
					<div>
						<img src="../images/washing-machine.png">
					</div>
					<a href="?laundry_machine=laundry_machine2">
						Make appointment
					</a>
				</div>
			</div>
			<div class="col">
				<div class="laundry-single">
					<h6>Laundry 3</h6>
					<div>
						<img src="../images/washing-machine.png">
					</div>
					<a href="?laundry_machine=laundry_machine3">
						Make appointment
					</a>
				</div>
			</div>
			<div class="col">
				<div class="laundry-single">
					<h6>Laundry 4</h6>
					<div>
						<img src="../images/washing-machine.png">
					</div>
					<a href="?laundry_machine=laundry_machine4">
						Make appointment
					</a>
				</div>
			</div>
			<div class="col">
				<div class="laundry-single">
					<h6>Laundry 5</h6>
					<div>
						<img src="../images/washing-machine.png">
					</div>
					<a href="?laundry_machine=laundry_machine5">
						Make appointment
					</a>
				</div>
			</div>
			<div class="col">
				<div class="laundry-single">
					<h6>Laundry 6</h6>
					<div>
						<img src="../images/washing-machine.png">
					</div>
					<a href="?laundry_machine=laundry_machine6">
						Make appointment
					</a>
				</div>
			</div>
		</div>
	</div>


<?php
	}
?>

	</div>
</div>
<?php
include ("../footer.php");
?>