<?php 

	require("db.inc.php");

	$emp_id = $_POST['emp_id'];

	$sql = "DELETE FROM `employee` WHERE emp_id = {$emp_id}";

	if(mysqli_query($con, $sql)){
		echo 1;
	}
	else{
		echo 0;
	}

 ?>