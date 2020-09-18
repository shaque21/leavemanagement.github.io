<?php 

	require("db.inc.php");

	$id = $_POST['id'];

	$sql = "DELETE FROM `apply_leave` WHERE id = {$id}";

	if(mysqli_query($con, $sql)){
		echo 1;
	}
	else{
		echo 0;
	}

 ?>