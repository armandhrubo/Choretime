<?php
	date_default_timezone_set('Europe/Tallinn');
	$php_data = date('Y-m-d');
	$php_time = date("H:i:s");
if (isset($_POST['cooking_machine_btn'])) { 


	$hours =	$_POST['hours'];
	$date = $_POST['date'];
	$cooking_machine = $_POST['cooking_machine'];


	$user_id = 	$_SESSION['id'];

	$verification = mysqli_query($con, "SELECT * FROM cooking_app"); 

	while ($verification_array = mysqli_fetch_assoc($verification)) {

		$hours_array[] = $verification_array['cooking_time'];
		$date_array[] = $verification_array['cooking_date'];
		$cooking_machine_array[] = $verification_array['cooking_name'];
	} 

	$ql_hour = strtotime($hours);
	$current_hour = strtotime($php_time);

	$time_sql = date('H:i:s', $ql_hour);
	$time_real = date('H:i:s', $current_hour);

	if ($date == $php_data && $time_sql < $time_real) {
		echo 'This time has already passed. Please pick a different time.';
	} else {
		
		if ($date >= $php_data) {

			if (in_array(	$hours, $hours_array) && 
			in_array(	$date, 	$date_array) && 
			in_array(	$cooking_machine,	$cooking_machine_array)) {
	
			echo 'This slot is already booked. Please pick another stove or timeslot.'; 
	
			 }else {		
				$query = mysqli_query($con, "INSERT INTO cooking_app VALUES('','$cooking_machine','$user_id','$date','$hours')"); 
				header('location: get_appoint.php'); 
			}
	
		} else {
			echo 'Please choose a present or future date.';
		}
	}

}


if (isset($_POST['laundry_machine_btn'])) {
    $hours =	$_POST['hours'];
    $date = $_POST['date'];
    $laundry_machine = $_POST['laundry_machine'];

    $user_id = 	$_SESSION['id'];

    $verification = mysqli_query($con, "SELECT * FROM laundry_app");

    while ($verification_array = mysqli_fetch_assoc($verification)) {
        $hours_array[] = $verification_array['laundry_time'];
        $date_array[] = $verification_array['laundry_date'];
        $laundry_machine_machine_array[] = $verification_array['laundry_name'];
    }

		$ql_hour = strtotime($hours);
		$current_hour = strtotime($php_time);

		$time_sql = date('H:i:s', $ql_hour);
		$time_real = date('H:i:s', $current_hour);

    if ($date >= $php_data) {

		if($date == $php_data && 		$time_sql <= $time_real){
			echo 'This time has already passed. Please pick a different time.';
		}else{

        if (in_array($hours, $hours_array) &&
        in_array($date, $date_array) &&
        in_array($laundry_machine, $laundry_machine_machine_array)) {
            echo 'This slot is already booked. Please pick another machine or timeslot.';

        } else {
            $query = mysqli_query($con, "INSERT INTO laundry_app VALUES('','$laundry_machine','$user_id','$date','$hours')"); 
					 header('location: get_appoint.php');
				}
				
			}

    } else {
        echo 'Please choose a present or future date.';
		}
		
}




?>