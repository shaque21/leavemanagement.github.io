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
					url: "apply_leave_load_records.php",
					type: "POST",
					success: function(data,status){
						$("#load_table").html(data);
					}
				});
			}
			loadRecords();//load all records on the page

			// $("#change_leave_status").on("change",function(){
			// 	var id = $(this).data(id);
			// 	var status = $(this).data(status);
			// 	var element_id = this;
			// 	var element_status = this;
			// 	$.ajax({
			// 		url:"change_leave_status.php";
			// 		type:"POST";
			// 		data: {
			// 			id:id,
			// 			status:status
			// 		},
			// 		success:function(data){
			// 			if(data == 1){
			// 				loadRecords();
			// 			}
			// 		}
			// 	});
			// });

			//insert data
			$("#save_btn").on("click",function(e){
				e.preventDefault();
				var leave_type = $("#leave_type").val();
				var leave_from = $("#leave_from").val();
				var leave_to = $("#leave_to").val();
				var leave_description = $("#leave_description").val();
				
				if(leave_type == "" || leave_from == "" || leave_to == "" ){
					$('#error_msg').html("All fields are required.").slideDown();
					$('#success_msg').slideUp();
					setTimeout(function(){
									$('#error_msg').fadeOut("slow");
								},4000);
				}
				else{

					$.ajax({
						url: "apply_leave_insert.php",
						type: "POST",
						data: {
							leave_type:leave_type,
							leave_from:leave_from,
							leave_to:leave_to,
							leave_description:leave_description
							
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
					var id = $(this).data("id");
					var element = this;
					$.ajax({
						url: "apply_leave_delete.php",
						type: "POST",
						data: {id: id},
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
				var id = $(this).data("eid");

				$.ajax({
					url: "apply_leave_load_update_data.php",
					type: "POST",
					data: {id: id},
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
				var id = $("#update_leave_id").val();
				var leave_status = $("#change_leave_status").val();
				

				$.ajax({
					url: "apply_leave_update.php",
					type: "POST",
					data: {
						id: id,
						leave_status: leave_status
						
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