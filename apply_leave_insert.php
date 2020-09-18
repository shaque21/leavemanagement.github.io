<?php 

	require("db.inc.php");
	$leave_type = mysqli_real_escape_string($con,$_POST['leave_type']);
	$emp_id = $_SESSION['USER_ID'];
	$leave_from = mysqli_real_escape_string($con,$_POST['leave_from']);
	$leave_to = mysqli_real_escape_string($con,$_POST['leave_to']);
	$leave_description = mysqli_real_escape_string($con,$_POST['leave_description']);
	


	$sql = "INSERT INTO `apply_leave`(`emp_id`, `leave_id`, `leave_from`, `leave_to`, `leave_description`) VALUES('{$emp_id}', '{$leave_type}', '{$leave_from}', '{$leave_to}', '{$leave_description}')";

	if(mysqli_query($con, $sql)){
		echo 1;
	}else {
		echo 0;
	}

 ?>