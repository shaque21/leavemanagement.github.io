<?php 


  require("db.inc.php");

 
 $emp_id = $_POST['emp_id'];
 $emp_name = $_POST['emp_name'];
 $emp_mobile = $_POST['emp_mobile'];
 $emp_email = $_POST['emp_email'];
 $emp_password = $_POST['emp_password'];
 $emp_address = $_POST['emp_address'];
 $emp_dept = $_POST['emp_dept'];
 $emp_dob = $_POST['emp_dob'];
 $emp_role = $_POST['emp_role'];

 $sql = "UPDATE `employee` SET `name`='{$emp_name}',`mobile`='{$emp_mobile}',`email`='{$emp_email}',`password`='{$emp_password}',`address`='{$emp_address}',`dept_id`='{$emp_dept}',`birthday`='{$emp_dob}',`role`='{$emp_role}' WHERE emp_id={$emp_id}";

  if(mysqli_query($con, $sql)){
  	echo 1;
  }else {
  	echo 0;
  }
  ?>