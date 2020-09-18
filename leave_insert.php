<?php 

	require("db.inc.php");
	$leave_name = $_POST['leave_name'];

	$sql = "INSERT INTO `leave_type`(`leave_name`) VALUES ('{$leave_name}')";

	if(mysqli_query($con, $sql)){
		echo 1;
	}else {
		echo 0;
	}

 ?>