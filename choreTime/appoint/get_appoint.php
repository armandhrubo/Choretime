<?php
$abs = $_SERVER['DOCUMENT_ROOT'] . '/choreTime/';
include $abs. "/header.php";
include $abs. "/menu.php";
?>

<div class="container-fluid no-padding">
	<div class="see-appoint">
		<div class="container">
			<h1 class="padding-bottom-15 padding-top-15">Appointment List</h1>
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">Machine Name</th>
			      <th scope="col">Date</th>
			      <th scope="col">Interval</th>
			      <th scope="col"></th>
			    </tr>
			  </thead>
			  <tbody>
					<?php
						$user_id = 	$_SESSION['id'];
						
						$query = mysqli_query($con," SELECT 'laundry' as type, laundry_name as machine, laundry_date as machine_date , laundry_time as machine_time, user_id, id_laundry as id_app
																				FROM laundry_app
																				WHERE  user_id = '$user_id'
																				UNION ALL
																				SELECT  'cooking', cooking_name, cooking_date, cooking_time, user_id, id_cooking
																				FROM cooking_app
																				WHERE  user_id = '$user_id'
																				");
					?>
					<?php
						while ($row= mysqli_fetch_array($query)) {
							
							$link_delete = "delete_appoint.php?type=". $row['type'] . "&id=".$row['id_app'];

							$timestamp = strtotime($row['machine_time']) + 60*60; 
							
							$time = date('H:i:s', $timestamp);

							$machine_type = '';

							switch ($row['machine']) {
								case "laundry_machine1":
									$machine_type = 'Laundry 1';
								break;
								case "laundry_machine2":
									$machine_type = 'Laundry 2';
								break;
								case "laundry_machine3":
									$machine_type = 'Laundry 3';
								break;
								case "laundry_machine4":
									$machine_type = 'Laundry 4';
								break;
								case "laundry_machine5":
									$machine_type = 'Laundry 5';
								break;
								case "laundry_machine6":
									$machine_type = 'Laundry 6';
								break;
								case "cooking_machine1":
									$machine_type = 'Stove 1';
								break;
								case "cooking_machine2":
									$machine_type = 'Stove 2';
								break;
								case "cooking_machine3":
									$machine_type = 'Stove 3';
								break;
								case "cooking_machine4":
									$machine_type = 'Stove 4';
								break;
								case "cooking_machine5":
									$machine_type = 'Stove 5';
								break;
								case "cooking_machine6":
									$machine_type = 'Stove 6';
								break;
							}

								echo '</hr>';
							echo ' <tr>';
								echo ' <td>'. $machine_type .'</td>';
								echo ' <td>'. $row['machine_date'] .'</td>';
								echo ' <td>'. $row['machine_time'] . '-' . $time .'</td>';
								echo ' <td><a href="'.$link_delete.'">Delete</a></td>';
							echo ' </tr>';
						}
					?>
			  </tbody>
			</table>
		</div>
	</div>
</div>
<?php
include ("../footer.php");
?>

