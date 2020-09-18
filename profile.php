<?php 
	


	require('header.inc.php');
	

 ?>

<!-- Top nav -->
				<div class="col-xl-10 col-md-8 col-lg-9 ml-auto py-2 fixed-top top-nav mb-sm-3">
					<div class="row align-items-center">
						<div class="col-md-4">
							<h4 class="text-white mb-0 text-uppercase">Profile Master</h4>
						</div>
						<div class="col-md-5">
							<form>
								<div class="input-group">
									<input type="text" class="form-control" id="search" placeholder="Search...">
									<!-- <button type="button" class="btn btn-light"><i class="fas fa-search text-danger"></i></button> -->
								</div>
							</form>
						</div>
						<div class="col-md-3 logout-sec mt-sm-2 d-flex justify-content-end">
							
							<a href="logout.php" class="btn btn-danger text-uppercase ">sign out</a>
						</div>
					</div>
				</div>
	  			<!-- end of top nav -->
	  		</div>
	  	</div>
	  </div>
		
	</nav>
	<!-- end of navbar -->
	
	<!-- content code -->
	<section id="content">
		<div class="container-fluid">
			<div class="row mt-auto mt-md-4 mt-sm-4">
				<div class="col-lg-9 col-xl-10 col-md-8 mt-5 ml-auto top-content d-flex justify-content-center py-2">
					<!-- Button to Open the Modal -->
					<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEmp">
					  Add Employee
					</button> -->
					<h4 class="text-primary text-uppercase">your information</h4>
				</div>
			</div>
			<div class="row mt-auto mt-md-4 mt-sm-4">
				<div class="col-lg-9 col-xl-10 col-md-8 mt-1 mt-md-2 ml-auto top-content p-4">
					<!-- all records part -->
					<div>
						<!-- <h2 class="text-gray-dark">All Records</h2> -->
						<div id="records_content">
							
						</div>

					</div>

					<!-- open the edit form that records i want to update -->
					
					<!-- end open the edit form that records i want to update -->

					<!-- The Modal for logout btn-->
					
					<!-- end modal for logout btn -->
					<!-- end all records part -->
					<!-- show error msg on page -->
					<div id="error_msg"></div>
					<!-- show success msg on page -->
					<div id="success_msg"></div>

					

				</div>
			</div>
		</div>
	</section>
	<!-- end of content code -->

 <?php 

	require('profile_ajax_footer.php');

 ?>
