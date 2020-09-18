<?php 

	require("db.inc.php");

	$leave_id = $_POST['leave_id'];

	$sql = "DELETE FROM `leave_type` WHERE leave_id = {$leave_id}";

	if(mysqli_query($con, $sql)){
		echo 1;
	}
	else{
		echo 0;
	}

 ?>