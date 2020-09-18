<?php 


  require("db.inc.php");

 
 $id = $_POST['id'];
 $leave_status = $_POST['leave_status'];
 
 

 $sql = "UPDATE apply_leave SET leave_status='{$leave_status}' WHERE id={$id}";

  if(mysqli_query($con, $sql)){
  	echo 1;
  }else {
  	echo 0;
  }
  ?>