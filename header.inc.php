<?php 

	require('db.inc.php');
	if(!isset($_SESSION['ROLE']))
	{
		header("location:login.php");
		die();
	}

 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Employee Leave Management System</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<!-- navbar  -->
	<nav class="navbar navbar-expand-md navbar-light">
		<!-- Toggler/collapsibe Button -->
	  <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#myNavbar">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="myNavbar">
	  	<div class="container-fluid">
	  		<div class="row">
	  			<!-- sidebar -->
				<div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top">
					<!-- Brand -->
  					<a class="navbar-brand text-white d-block mx-auto py-2 text-center brand-style bottom-border text-uppercase mb-4 font-weight-bold" href="#">samsul <span>Haque</span></a>
  					<!-- admin profile -->
  					<div class="bottom-border pb-3">
  						<!-- <img src="images/samsul.jpg" width="50" class="rounded mr-3"> -->
  						<a href="#"><i class="fas fa-user text-light fa-lg mr-3"></i></a>
  						<a href="#" class="text-white text-center" ><?php echo $_SESSION['USER_NAME']; ?></a>
  					</div>
  					<!-- sidebar list -->
  					<h6 class="text-white mt-4 ">MENU</h6>
  					<ul class="navbar-nav flex-column mt-4">
  						<?php if($_SESSION['ROLE'] == 1){ ?>
  						<li class="nav-item">
  							<a href="index.php" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-address-card text-light fa-lg mr-3"></i>Department Master</a>
  						</li>
  						<li class="nav-item">
  							<a href="leave.php" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-archway text-light fa-lg mr-3"></i>Leave Type Master</a>
  						</li>
  						<li class="nav-item">
  							<a href="employee.php" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-transgender-alt text-light fa-lg mr-3"></i>Employee Master</a>
  						</li>

  					<?php }else { ?>
  						<li class="nav-item">
  							<a href="profile.php" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-transgender-alt text-light fa-lg mr-3"></i>Profile</a>
  						</li>
  						
  					<?php } ?>
  						<li class="nav-item">
  							<a href="apply_leave.php" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-power-off text-light fa-lg mr-3"></i>Apply Leave</a>
  						</li>
  					</ul>
				</div>
	  			<!-- end of sidebar -->