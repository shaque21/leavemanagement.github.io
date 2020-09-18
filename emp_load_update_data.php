<?php

require ("db.inc.php");

$emp_id = $_POST['e_emp_id'];

$sql = "SELECT * FROM `employee` WHERE  emp_id = {$emp_id}";

$result = mysqli_query($con, $sql) or die("Query unsuccessful.");

$output = "";
if (mysqli_num_rows($result) > 0)
{
    while ($row = mysqli_fetch_assoc($result))
    {

        $output = "
						
						<div class='modal-dialog  modal-dialog-scrollable '>
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
						    <label for='update_dept_name'>Name:</label>
						    <input type='text' class='form-control' placeholder='Enter Employee Name' id='update_emp_name' required value='{$row['name']}'>
						    <input type='text' class='form-control' placeholder='Enter dept. id' id='update_emp_id' required hidden value='{$row['emp_id']}'>
						</div>

						<div class='form-group'>
							    <label for='emp_mobile'>Mobile:</label>
							    <input type='text' class='form-control' placeholder='Enter Mobile Number' id='update_emp_mobile' required value='{$row['mobile']}'>
							</div>
							<div class='form-group'>
							    <label for='emp_email'>Email Address:</label>
							    <input type='text' class='form-control' placeholder='Enter Email Address' id='update_emp_email' required value='{$row['email']}'>
							</div>
							<div class='form-group'>
							    <label for='emp_password'>Password:</label>
							    <input type='password' class='form-control' placeholder='Enter Password' id='update_emp_password' required value='{$row['password']}'>
							</div>
							<div class='form-group'>
							    <label for='emp_address'>Address:</label>
							    <input type='text' class='form-control' placeholder='Enter Employee Address' id='update_emp_address' required value='{$row['address']}'>
							</div>
							<div class='form-group'>
							    <label for='emp_department'>Department:</label>
							    <select name='emp_department' id='update_emp_department' required class='form-control'>

                              		<option> Select Department</option>";

        $sql2 = 'SELECT * FROM department ORDER BY department DESC';
        $result2 = mysqli_query($con, $sql2) or die('Query Unsuccessfull');
        if (mysqli_num_rows($result2) > 0)
        {

            while ($row2 = mysqli_fetch_assoc($result2))
            {

                if ($row['dept_id'] == $row2['dept_id'])
                {

                    $output .= " echo '<option selected='selected' value='{$row2['dept_id']}'>{$row2['department']}</option>'";
                }
                else
                {
                	$output .= "echo '<option value='{$row2['dept_id']}'>{$row2['department']}</option>'";
                }
                

            }
        }

        $output .= "
							     </select>
							</div>
						
							<div class='form-group'>
							    <label for='emp_birthday'>Date-Of-Birth:</label>
							    <input type='date' class='form-control' placeholder='Enter Employee Birth-date' id='update_emp_birthday' required value='{$row['birthday']}'>
							</div>
							<div class='form-group'>
							    <label for='emp_role'>Employee Role:</label>
							    <select class='form-control' name='role' id='update_emp_role' required>
							    <option> Select User</option>";
        if ($row["role"] == 1)
        {
            $output .= "echo '<option selected='selected' value='1'>Admin</option>';
            			echo '<option value'0'>Normal User</option>'";
        }
        else
        {
            $output .= "echo '<option selected='selected' value'0'>Normal User</option>'
            			echo '<option value='1'>Admin</option>'";
        }

        $output .= "  
	                          	</select>
							</div>
						</form>
				      </div>

				      <!-- Modal footer -->
				      <div class='modal-footer'>
				        <button type='button' id='update_save_btn btn-block' class='btn btn-primary' data-dismiss='modal'>Save</button>
				      </div>

				    </div>
				  </div>";
    }
    echo $output;
}

?>
