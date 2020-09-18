<?php 

	require("db.inc.php");

	$sql = "SELECT * FROM employee WHERE role = 0 ORDER BY emp_id DESC";

	$result = mysqli_query($con, $sql) OR die("Query Failed");
	$output = "";

	if(mysqli_num_rows($result) > 0){
		$output = "<table class='table table-hover'>
		<thead class='bg-success'>
				      <tr class='text-center text-uppercase'>
				      	<th width='5'>S.No</th>
				      	<th width='20'>Employee Name</th>
				        <th width='10'>Mobile</th>
				        <th width='20'>Email</th>
				        <th width='25'>Address</th>
				        <th width='10'>Delete Action</th>
				        <th width='10'>Edit Action</th>
				      </tr>
				    </thead>";
				    $number = 1;
				    while($row = mysqli_fetch_assoc($result)){
				    	$output .= "<tbody>
					      <tr class='text-center'>
					        <td>$number</td>
							<td>{$row["name"]}</td>
					        <td>{$row["mobile"]}</td>
					        <td>{$row["email"]}</td>
					        <td>{$row["address"]}</td>
					        <td><button class='btn btn-danger delete_btn' data-id='{$row["emp_id"]}'>Delete</button></td>
					        <td><button type='button' class='btn btn-primary edit_btn' data-eid='{$row["emp_id"]}'>Edit</button></td>
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