<?php 

	require("db.inc.php");
	$emp_name = mysqli_real_escape_string($con,$_POST['emp_name']);
	$emp_mobile = mysqli_real_escape_string($con,$_POST['emp_mobile']);
	$emp_email = mysqli_real_escape_string($con,$_POST['emp_email']);
	$emp_pass = mysqli_real_escape_string($con,$_POST['emp_pass']);
	$emp_address = mysqli_real_escape_string($con,$_POST['emp_address']);
	$emp_dept = mysqli_real_escape_string($con,$_POST['emp_dept']);
	$emp_dob = mysqli_real_escape_string($con,$_POST['emp_dob']);
	$emp_role = mysqli_real_escape_string($con,$_POST['emp_role']);


	$sql = "INSERT INTO `employee`(`name`, `mobile`, `email`, `password`, `address`, `dept_id`, `birthday`, `role`) VALUES('{$emp_name}', '{$emp_mobile}', '{$emp_email}', '{$emp_pass}', '{$emp_address}', '{$emp_dept}', '{$emp_dob}', '{$emp_role}')";

	if(mysqli_query($con, $sql)){
		echo 1;
	}else {
		echo 0;
	}

 ?>