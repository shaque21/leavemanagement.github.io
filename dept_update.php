<?php 


  require("db.inc.php");

 
 $edit_dept_id = $_POST['edit_dept_id'];
 $edit_dept_name = $_POST['edit_dept_name'];
 
 

 $sql = "UPDATE department SET department='{$edit_dept_name}' WHERE dept_id={$edit_dept_id}";

  if(mysqli_query($con, $sql)){
  	echo 1;
  }else {
  	echo 0;
  }
  ?>