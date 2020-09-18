<?php 
	session_start();
	$con = mysqli_connect("localhost", "root", "", "employee_leave_management_system") OR die("Connection failed." . mysqli_connect_error());

 ?>