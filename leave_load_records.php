<?php 

	require("db.inc.php");

	$sql = "SELECT * FROM leave_type ORDER BY leave_id DESC";

	$result = mysqli_query($con, $sql) OR die("Query Failed");
	$output = "";

	if(mysqli_num_rows($result) > 0){
		$output = "<table class='table table-hover'>
		<thead class='bg-success'>
				      <tr class='text-center text-uppercase'>
				      	<th width='15'>S.No</th>
				      	<th width='15'>Leave ID</th>
				        <th width='30'>Leave Type Name</th>
				        <th width='20'>Delete Action</th>
				        <th width='20'>Edit Action</th>
				      </tr>
				    </thead>";
				    $number = 1;
				    while($row = mysqli_fetch_assoc($result)){
				    	$output .= "<tbody>
					      <tr class='text-center'>
					        <td>$number</td>
							<td>{$row["leave_id"]}</td>
					        <td>{$row["leave_name"]}</td>
					        <td><button class='btn btn-danger delete_btn' data-id='{$row["leave_id"]}'>Delete</button></td>
					        <td><button type='button' class='btn btn-primary edit_btn' data-eid='{$row["leave_id"]}'>Edit</button></td>
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