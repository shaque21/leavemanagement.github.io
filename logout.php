<?php 

	require("db.inc.php");
	session_start();
	session_unset();

  	session_destroy();

	header("Location:http://localhost/practise/leave_management_system/admin/login.php");
	die();

 ?>