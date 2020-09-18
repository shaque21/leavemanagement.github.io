<?php 

	require("db.inc.php");

	$id = $_POST['id'];

	$sql = "SELECT * FROM `apply_leave` WHERE id = {$id}";

	$result = mysqli_query($con, $sql) or die("Query unsuccessful.");
    $output = "";
    if(mysqli_num_rows($result) > 0 ){
	  	while ($row = mysqli_fetch_assoc($result)) {
	  	    $output = "
						
						<div class='modal-dialog'>
				    	<div class='modal-content'>
				    	<!-- Modal Header -->
					      <div class='modal-header'>
					        <h4 class='modal-title'>Update Leave Status </h4>
					        <button type='button' id='update_close_btn'  class='close' data-dismiss='modal'>&times;</button>
					      </div>
				      <!-- Modal body -->
				      <div class='modal-body'>
				      	<form id='update_form'>
				      	<div class='form-group'>
						    <select id='change_leave_status' required class='form-control'>
                          		<option value=''> Update Leave Status</option>
                          		<option value='2'> Accepted </option>
                          		<option value='3'> Rejected !</option>
                            </select>
						    <input type='text' class='form-control' placeholder='Enter dept. id' id='update_leave_id' required hidden value='{$row['id']}'>
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