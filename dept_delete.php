<?php 

	require("db.inc.php");

	$dept_id = $_POST['dept_id'];

	$sql = "DELETE FROM `department` WHERE dept_id = {$dept_id}";

	if(mysqli_query($con, $sql)){
		echo 1;
	}
	else{
		echo 0;
	}

 ?>