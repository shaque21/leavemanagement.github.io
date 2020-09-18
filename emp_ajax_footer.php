<!-- footer section -->

	<footer class="sticky-footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-9 col-xl-10 col-md-8 mt-5 ml-auto top-content d-flex justify-content-end p-2 mb-2">
					<div class="copyright text-center my-auto">
		            	<span>Copyright &copy; Tejgaon College 2020</span>
		          </div>
				</div>
			</div>
		</div>
	</footer>
	
	<!-- end of footer -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<script>

		//start employee ajax part
		$(document).ready(function(){
			// load all records
			function loadRecords(){
				$.ajax({
					url: "emp_load_records.php",
					type: "POST",
					success: function(data,status){
						$("#load_table").html(data);
					}
				});
			}
			loadRecords();//load all records on the page

			//insert data
			$("#save_btn").on("click",function(e){
				e.preventDefault();
				var emp_name = $("#emp_name").val();
				var emp_mobile = $("#emp_mobile").val();
				var emp_email = $("#emp_email").val();
				var emp_pass = $("#emp_password").val();
				var emp_address = $("#emp_address").val();
				var emp_dept = $("#emp_department").val();
				var emp_dob = $("#emp_birthday").val();
				var emp_role = $("#emp_role").val();
				if(emp_name == "" || emp_mobile == "" || emp_email == "" || emp_pass == "" || emp_address == "" || emp_dept == "" || emp_dob == "" || emp_role == ""){
					$('#error_msg').html("All fields are required.").slideDown();
					$('#success_msg').slideUp();
					setTimeout(function(){
									$('#error_msg').fadeOut("slow");
								},4000);
				}
				else{

					$.ajax({
						url: "emp_insert.php",
						type: "POST",
						data: {
							emp_name:emp_name,
							emp_mobile:emp_mobile,
							emp_email:emp_email,
							emp_pass:emp_pass,
							emp_address:emp_address,
							emp_dept:emp_dept,
							emp_dob:emp_dob,
							emp_role:emp_role
						},

						success:function(data){
							if(data == 1){
								loadRecords();
								$('#add_form').trigger("reset");
							}
							else{
								$('#error_msg').html("can\'t save record.").slideDown();
								$('#success_msg').slideUp();
								setTimeout(function(){
									$('#error_msg').fadeOut("slow");
								},4000);
							}
						}
					});
				}
			});

			//delete data from department table

			$(document).on("click",".delete_btn",function(){

				if(confirm("Do you really want to delete this record ?")){
					var emp_id = $(this).data("id");
					var element = this;
					$.ajax({
						url: "emp_delete.php",
						type: "POST",
						data: {emp_id: emp_id},
						success: function(data){
							if(data == 1){
								$(element).closest("tr").fadeOut();
								loadRecords();
							}
							else{
								$('#error_msg').html("can\'t delete record.").slideDown();
								$('#success_msg').slideUp();
								setTimeout(function(){
									$('#error_msg').fadeOut("slow");
								},4000);
							}
						}
					});
				}
			});


			//Update department data table

			// show update modal box

			$(document).on("click",".edit_btn",function(){

				$("#update_modal").show();
				var emp_id = $(this).data("eid");

				$.ajax({
					url: "emp_load_update_data.php",
					type: "POST",
					data: {e_emp_id: emp_id},
					success: function(data){
						$("#update_modal").html(data);
						// hide update modal box
						$("#update_close_btn").on("click", function(e){
							$("#update_modal").hide();
						});
					}
				});
			});


			// change and successfully update records in db and table

			$(document).on("click","#update_save_btn",function(){
				// pick records every value from the load update form
				var emp_id = $("#update_emp_id").val();
				var emp_name = $("#update_emp_name").val();
				var emp_mobile = $("#update_emp_mobile").val();
				var emp_email = $("#update_emp_email").val();
				var emp_password = $("#update_emp_password").val();
				var emp_address= $("#update_emp_address").val();
				var emp_dept = $("#update_emp_department").val();
				var emp_dob = $("#update_emp_birthday").val();
				var emp_role = $("#update_emp_role").val();

				$.ajax({
					url: "emp_update.php",
					type: "POST",
					data: {
						emp_id: emp_id,
						emp_name: emp_name,
						emp_mobile: emp_mobile,
						emp_email: emp_email,
						emp_password: emp_password,
						emp_address: emp_address,
						emp_dept: emp_dept,
						emp_dob: emp_dob,
						emp_role: emp_role
					},
					success: function(data){
						// if the query run successfully then data == will be 1
						if(data == 1){
							$("#update_modal").hide();//hide modal box
							loadRecords();//call the loadRecords function for see the proper updated records
						}
						else{
							$('#error_msg').html("can\'t update record.").slideDown();
							$('#success_msg').slideUp();
							setTimeout(function(){
									$('#error_msg').fadeOut("slow");
								},4000);
						}
					}
				});

			});

			//Live search option

			$("#search").on("keyup", function(){
				var search_term = $(this).val();

				$.ajax({
					url: "emp_search.php",
					type: "POST",
					data: {
						search_term: search_term
					},
					success: function(data){
						$("#load_table").html(data);
					}
				});
			});


		});
		// end of department ajax part


	</script>


</body>
</html>