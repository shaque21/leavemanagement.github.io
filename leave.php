<?php 
	


	require('header.inc.php');
	if($_SESSION['ROLE'] != 1){
		header("Location:profile.php");
	}
 ?>

<!-- Top nav -->
				<div class="col-xl-10 col-md-8 col-lg-9 ml-auto py-2 fixed-top top-nav mb-sm-3">
					<div class="row align-items-center">
						<div class="col-md-4">
							<h4 class="text-white mb-0 text-uppercase">Leave Type Master</h4>
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
				<div class="col-lg-9 col-xl-10 col-md-8 mt-5 ml-auto top-content d-flex justify-content-end py-2">
					<!-- Button to Open the Modal -->
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addLeave">
					  Add Leave Type
					</button>
				</div>
			</div>
			<div class="row mt-auto mt-md-4 mt-sm-4">
				<div class="col-lg-9 col-xl-10 col-md-8 mt-1 mt-md-2 ml-auto top-content p-4">
					<!-- all records part -->
					<div>
						<h2 class="text-gray-dark">All Records</h2>
						<div id="records_content">
							<table id="load_table" class="table table-striped">
							    
							 </table>
						</div>

					</div>

					<!-- open the edit form that records i want to update -->
					<div id="edit_modal">
						<div id="edit_modal_form">
							<div class="modal" id="update_modal">
						  	
							</div>
						</div>
					</div>
					<!-- end open the edit form that records i want to update -->

					<!-- The Modal for add leave btn-->
					<div class="modal fade" id="addLeave">
					  <div class="modal-dialog">
					    <div class="modal-content">

					      <!-- Modal Header -->
					      <div class="modal-header">
					        <h4 class="modal-title text-uppercase">Add Leave Type</h4>
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					      </div>

					      <!-- Modal body -->
					      <div class="modal-body">
					        <form id="add_form" action="">
					      	<div class="form-group">
							    <label for="leave_name">Leave Type Name:</label>
							    <input type="text" class="form-control" placeholder="Enter Leave Type Name" id="leave_name" required>
							</div>
							</form>
					      </div>

					      <!-- Modal footer -->
					      <div class="modal-footer">
					        <button type="button" class="btn btn-success btn-block" id="leave_save_btn" data-dismiss="modal">Save</button>
					        <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
					      </div>


					    </div>
					  </div>
					</div>
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

	require('leave_ajax_footer.php');

 ?>
