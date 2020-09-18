
<?php 
	require('db.inc.php');
	$error_msg="";
	if(isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password'])){
		$email = mysqli_real_escape_string($con,$_POST['email']);
		$password = mysqli_real_escape_string($con,$_POST['password']);

		$sql = "SELECT * FROM employee WHERE email = '$email' AND password = '$password'";
		$result = mysqli_query($con, $sql) or die('Query Failed');
		if(mysqli_num_rows($result) > 0){
			while ($row = mysqli_fetch_assoc($result)) {
			    $_SESSION['ROLE'] = $row['role'];
			    $_SESSION['USER_ID'] = $row['emp_id'];
			    $_SESSION['USER_NAME'] = $row['name'];

			    if($_SESSION['ROLE'] == 1)
			    {
			    	header("location:index.php");
			    	die();
			    }
			    else
			    {
			    	header("location:profile.php");
			    	die();
			    }
			    
			}
		}
		else{
			$error_msg = "Please insert valid email and password !";
		}

	}
	mysqli_close($con);

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	
	<link rel="stylesheet" href="css/style.css">
</head>
<body class="bg">
	<div class="container-fluid">
		<div class="row form-bg d-flex justify-content-center">
			<div class="col-12 col-md-3">
				<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="form-container p-5 bg-light">
				  <div class="form-group">
				  	<h2 class="text-center text-primary text-uppercase">login</h2>
				    <label for="email">Email address:</label>
				    <input type="email" class="form-control" name="email" placeholder="Enter email" id="email" required>
				  </div>
				  <div class="form-group">
				    <label for="pwd">Password:</label>
				    <input type="password" class="form-control" name="password" placeholder="Enter password" id="password" required>
				  </div>
				  <button type="submit" class="btn btn-primary btn-block" name="login" value="login">Submit</button>
				  <div class="text-danger mt-2">
				  	<?php echo $error_msg; ?>
				  </div>
				</form>
			</div>
		</div>
	</div>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>