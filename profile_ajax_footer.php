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
					url: "profile_load_records.php",
					type: "POST",
					success: function(data,status){
						$("#records_content").html(data);
					}
				});
			}
			loadRecords();//load all records on the page

			
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