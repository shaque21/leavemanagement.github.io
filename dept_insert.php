<?php 

	require("db.inc.php");
	$dept_name = $_POST['dept_name'];

	$sql = "INSERT INTO `department`(`department`) VALUES ('{$dept_name}')";

	if(mysqli_query($con, $sql)){
		echo 1;
	}else {
		echo 0;
	}

 ?>