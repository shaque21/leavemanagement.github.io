<?php

require ("db.inc.php");
$emp_id = $_SESSION['USER_ID'];
$sql = "SELECT * FROM employee WHERE emp_id = '{$emp_id}'";

$result = mysqli_query($con, $sql) or die("Query Failed");
$output = "";

if (mysqli_num_rows($result) > 0)
{
    while ($row = mysqli_fetch_assoc($result))
    {
        $output = "<form id='add_form'>
	    							<div class='form-group'>
						    <label for='update_emp_name'>Name:</label>
						    <input type='text' class='form-control' placeholder='Enter Employee Name' id='update_emp_name' required value='{$row['name']}'>
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
							    <label for='emp_birthday'>Date-Of-Birth:</label>
							    <input type='date' class='form-control' placeholder='Enter Employee Birth-date' id='update_emp_birthday' required value='{$row['birthday']}'>
							</div>
							<div class='form-group'>
							    <label for='emp_department'>Department:</label>
							    <select name='emp_department' id='update_emp_department' required class='form-control'>";
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
                // else
                // {
                //     $output .= "echo '<option value='{$row2['dept_id']}'>{$row2['department']}</option>'";
                // }

            }
        }

        $output .= "
							</select>
							</div>
							</form>";

    }

    mysqli_close($con);
    echo $output;
}
else
{
    echo "No records found";
}

?>
