<?php 

	require("db.inc.php");

	$emp_id = $_SESSION['USER_ID'];
	if($_SESSION['ROLE'] != 1 )
	{
		$sql = "SELECT apply_leave.id, apply_leave.leave_from, apply_leave.leave_to, apply_leave.leave_description, apply_leave.leave_status, employee.emp_id, employee.name FROM `apply_leave` LEFT JOIN employee ON apply_leave.emp_id = employee.emp_id WHERE apply_leave.emp_id = '{$emp_id}'  ORDER BY id DESC";
	}
	else
	{
		$sql = "SELECT apply_leave.id, apply_leave.leave_from, apply_leave.leave_to, apply_leave.leave_description, apply_leave.leave_status, employee.emp_id, employee.name FROM `apply_leave` LEFT JOIN employee ON apply_leave.emp_id = employee.emp_id  ORDER BY id DESC";
	}
	

	$result = mysqli_query($con, $sql) OR die("Query Failed");
	$output = "";

	if(mysqli_num_rows($result) > 0){
		$output = "<table class='table table-hover'>
		<thead class='bg-success'>
				      <tr class='text-center text-uppercase'>
				      	<th width='5'>S.No</th>
				      	<th width='5'>ID</th>
				        <th width='15'>Leave From</th>
				        <th width='15'>Leave To</th>
				        <th width='30'>Leave Description</th>
				        <th width='20'>Leave Status</th>
				        <th width='10'>";
				        if($_SESSION['ROLE'] != 1)
				        {
				        	$output .= "Delete Action";
				        }
				        if($_SESSION['ROLE'] == 1)
				        {
				        	$output .= "Emp_name & ID";
				        }
				        
				       $output .= " </th>
				      </tr>
				    </thead>";
				    $number = 1;
				    while($row = mysqli_fetch_assoc($result)){
				    	$output .= "<tbody>
					      <tr class='text-center'>
					        <td>$number</td>
					        <td>{$row["id"]}</td>
					        <td>{$row["leave_from"]}</td>
					        <td>{$row["leave_to"]}</td>
					        <td>{$row["leave_description"]}</td>
					        <td>
					        <select required class='form-control'>";
					        if($row["leave_status"] == 1)
					        {
					        	$output .= "<option value='1'> Applied </option>";
					        }
					        if ($row["leave_status"] == 2) {
					        	$output .= "<option value='2'> Accepted </option>";
					        }
					        if ($row["leave_status"] == 3) {
					        	$output .= "<option value='3'> Rejected </option>";
					        }
					        $output .= "</select>";
					        if($_SESSION['ROLE'] == 1)
					        {
					        	$output .= "<button type='button' class='btn btn-primary btn-block edit_btn' data-eid='{$row["id"]}'>Update Leave Status</button>";
					        }
					        $output .= "</td>
					        <td>";
					        if($_SESSION['ROLE'] != 1 && $row["leave_status"] == 1)
					        {
					        	$output .= "<button class='btn btn-danger delete_btn' data-id='{$row["id"]}'>Delete</button>";
					        
					        }
					        

					        if($_SESSION['ROLE'] == 1)
					        {
					        	$output .= "{$row['name']}";
					        }
					        

					      $output .= "</td>  
					      </tr>
					    </tbody>";
				    	$number++;
				    }
				    $output .= '</table>';
		mysqli_close($con);
		echo $output;
	}
	else{
		echo "No records found";
	}

 ?>
