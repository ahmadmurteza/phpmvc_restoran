<footer class="main-footer">
				<div class="footer-left">
					Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
				</div>
				<div class="footer-right">
					2.3.0
				</div>
			</footer>
		</div>
	</div>

	<!-- General JS Scripts -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	<script src="<?= BASEURL; ?>assets/js/stisla.js"></script>

	<!-- Template JS File -->
	<script src="<?= BASEURL; ?>assets/js/scripts.js"></script>
	<script src="<?= BASEURL; ?>assets/js/custom.js"></script>
 	
 	<!-- font awosome -->
 	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>

 	<!-- datatables -->
	<script type="text/javascript" src="<?= BASEURL; ?>vendor/DataTables/datatables.min.js"></script>

	<!-- ajax -->
	<script type="text/javascript">
		$(document).ready(function () {

			// button deleted user
			$('#deletedUsersBtn').click(function(e){
				e.preventDefault();
				showAllDeletedUsers();
			});

			// button back
			$('#backBtn').click(function(e){
				e.preventDefault();
				showAllUsers();
			});

			// fungsi menampilkan semua data

			showAllUsers();
			function showAllUsers() {
				$('#backBtn').hide();
				$('#deletedUsersBtn').show();
				var params = {
					url: '<?= BASEURL ?>Dashboard/allUsers',
					method: 'POST',
					data: {action: 'readAllUsers'},
					success: function (response) {
						// console.log(response);
						$('#allUsersTable').html(response);
						$('#workerTable').DataTable();
					}
				}
				$.ajax(params);
			}

			function showAllDeletedUsers() {
				$('#backBtn').show();
				$('#deletedUsersBtn').hide();
				var params = {
					url: '<?= BASEURL ?>Dashboard/allDeletedUsers',
					method: 'POST',
					data: {action: 'readAllUsers'},
					success: function (response) {
						// console.log(response);
						$('#allUsersTable').html(response);
						$('#workerTable').DataTable();
					}
				}
				$.ajax(params);
			}


		});
	</script>
</body>
</html>
