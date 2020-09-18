<?php 


  require("db.inc.php");

 
 $edit_leave_id = $_POST['edit_leave_id'];
 $edit_leave_name = $_POST['edit_leave_name'];
 
 

 $sql = "UPDATE leave_type SET leave_name='{$edit_leave_name}' WHERE leave_id={$edit_leave_id}";

  if(mysqli_query($con, $sql)){
  	echo 1;
  }else {
  	echo 0;
  }
  
  ?>