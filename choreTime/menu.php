<?php
	$link = "http://" . $_SERVER['SERVER_NAME'] . '/choreTime/'; 
	$pic = $_SESSION['pic'];
?>

<div class="menu" id="closingNav">
	 <nav class="navbar navbar-expand-md navbar-dark bg-dark">   
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
              <a class="navbar-brand" href="<?php echo $link ?>">ChoreTime</a>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $link ?>">Home</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="<?php echo $link ?>about_us.php">About Us</a>
                </li>
                <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          Appointments
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item" href="<?php echo $link ?>appoint/laundry.php">Laundry</a>
			          <a class="dropdown-item" href="<?php echo $link ?>appoint/cooking.php">Kitchen</a>
			          <a class="dropdown-item" href="<?php echo $link ?>appoint/get_appoint.php">Your appointments</a>
			        </div>
			    </li>

                <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          <?php echo $_SESSION['first_name'].' '. $_SESSION['last_name'];?>
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item" href="<?php echo $link ?>update.php">Settings</a>
			          <a class="dropdown-item" href="<?php echo $link ?>logout.php">LogOut</a>
			        </div>
			    </li>
            </ul>
        </div>
    </nav>
</div>






