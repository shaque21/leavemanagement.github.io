<?php 
	


	require('header.inc.php');

 ?>

<!-- Top nav -->
				<div class="col-xl-10 col-md-8 col-lg-9 ml-auto py-2 fixed-top top-nav mb-sm-3">
					<div class="row align-items-center">
						<div class="col-md-4">
							<h4 class="text-white mb-0 text-uppercase">Apply Leave Master</h4>
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
				<div class="col-lg-9 col-xl-10 col-md-8 mt-5 ml-auto top-content  py-2">
					<!-- Button to Open the Modal -->
					<?php if($_SESSION['ROLE'] != 1) { ?>
					<button type="button" class="btn btn-primary d-flex justify-content-end" data-toggle="modal" data-target="#addApplyLeave">
					  Apply For Leave
					</button>
				<?php }else{ ?>
					<h4 class="text-primary text-capitalize d-flex justify-content-center">Approve Or Reject leave appnication</h4>
				<?php } ?>
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

					<!-- The Modal for logout btn-->
					<div class="modal fade" id="addApplyLeave">
					  <div class="modal-dialog">
					    <div class="modal-content">

					      <!-- Modal Header -->
					      <div class="modal-header">
					        <h4 class="modal-title text-uppercase text-primary">Insert Your Leave Application </h4>
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					      </div>

					      <!-- Modal body -->
					      <div class="modal-body">
					        <form id="add_form" action="">
					      	<div class="form-group">
							    <label for="leave_type">Leave Type:</label>
							    <select name="leave_type" id="leave_type" required class="form-control">
                              		<option value="" > Select Leave Type</option>
							    <?php 
							    	
							    	$sql = "SELECT * FROM `leave_type` ORDER BY leave_id DESC";
							    	$result = mysqli_query($con, $sql) or die("Query Unsuccessfull");
							    	if(mysqli_num_rows($result) > 0){
							    		
							    		while ($row = mysqli_fetch_assoc($result)) {
							    		    echo "<option value='{$row['leave_id']}'>{$row['leave_name']}</option>";
							    		}
							    	}
							     ?>
							     </select>
							</div>
							<div class="form-group">
							    <label for="leave_from">Leave From:</label>
							    <input type="date" class="form-control" name="leave_from" id="leave_from" required>
							</div>
							<div class="form-group">
							    <label for="leave_to">Leave To:</label>
							    <input type="date" class="form-control" name="leave_to" id="leave_to" required>
							</div>
							<div class="form-group">
							    <label for="leave_description">Leave Description:</label>
							    <input type="text" class="form-control" name="leave_description" id="leave_description">
							</div>
							</form>
					      </div>

					      <!-- Modal footer -->
					      <div class="modal-footer">
					        <button type="button" class="btn btn-success btn-block" id="save_btn" data-dismiss="modal">Save</button>
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

	require('apply_leave_ajax_footer.php');

 ?>
