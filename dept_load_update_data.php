<?php 

	require("db.inc.php");

	$dept_id = $_POST['e_dept_id'];

	$sql = "SELECT * FROM `department` WHERE dept_id = {$dept_id}";

	$result = mysqli_query($con, $sql) or die("Query unsuccessful.");
    $output = "";
    if(mysqli_num_rows($result) > 0 ){
	  	while ($row = mysqli_fetch_assoc($result)) {
	  	    $output = "
						
						<div class='modal-dialog'>
				    	<div class='modal-content'>
				    	<!-- Modal Header -->
					      <div class='modal-header'>
					        <h4 class='modal-title'>Update Your Information</h4>
					        <button type='button' id='update_close_btn'  class='close' data-dismiss='modal'>&times;</button>
					      </div>
				      <!-- Modal body -->
				      <div class='modal-body'>
				      	<form id='update_form'>
				      	<div class='form-group'>
						    <label for='update_dept_name'>Department Name:</label>
						    <input type='text' class='form-control' placeholder='Enter Department Name' id='update_dept_name' required value='{$row['department']}'>
						    <input type='text' class='form-control' placeholder='Enter dept. id' id='update_dept_id' required hidden value='{$row['dept_id']}'>
						</div>
						</form>
				      </div>

				      <!-- Modal footer -->
				      <div class='modal-footer'>
				        <button type='button' id='update_save_btn' class='btn btn-primary btn-block' data-dismiss='modal'>Save</button>
				      </div>

				    </div>
				  </div>";
	  	}
  	echo $output;
  }

 ?>