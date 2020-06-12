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
 	
	<!-- sweet alert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

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

			// button verifikasi
			$('body').on('click', '.verifiedBtn', function(e) {
				e.preventDefault();
				verifiedId = $(this).attr('id');
				verifiedName = $(this).attr('val');
				Swal.fire({
				  	title: 'Yakin?',
				  	text: "Pekerja akan diverifikasi!",
				  	icon: 'warning',
				  	showCancelButton: true,
				  	confirmButtonColor: '#3085d6',
				  	cancelButtonColor: '#d33',
				  	confirmButtonText: 'Ya, verfikasi!',
				  	cancelButtonText: 'Batal'
				}).then((result) => {
				  	if (result.value) {
						$.ajax({
							url: '<?= BASEURL ?>Dashboard/verified',
							method: 'POST',
							data: {verifiedId: verifiedId, verifiedName: verifiedName},
							success: function(response) {
								// console.log(response);
								showAllUsers();
								$('#tableAlert').html(response);
							}
						});
					    Swal.fire(
					      'Terverifikasi!',
					      'Pekerja berhasil diverifikasi!',
					      'success'
					    );
				  	}
				});
			});

			// button delete
			$('body').on('click', '.deleteBtn', function(e) {
				e.preventDefault();
				deletedId = $(this).attr('id');
				deletedName = $(this).attr('val');
				Swal.fire({
				  	title: 'Yakin?',
				  	text: "Pekerja akan dihapus!",
				  	icon: 'warning',
				  	showCancelButton: true,
				  	confirmButtonColor: '#3085d6',
				  	cancelButtonColor: '#d33',
				  	confirmButtonText: 'Ya, hapus!',
				  	cancelButtonText: 'Batal'
				}).then((result) => {
				  	if (result.value) {
						$.ajax({
							url: '<?= BASEURL ?>Dashboard/softDeleteRestore',
							method: 'POST',
							data: {deletedId: deletedId, deletedName: deletedName, action: 'deleteUser'},
							success: function(response) {
								// console.log(response);
								showAllUsers();
								$('#tableAlert').html(response);
							}
						});
					    Swal.fire(
					      'Terhapus!',
					      'Pekerja berhasil dihapus!',
					      'success'
					    );
				  	}
				});
			});

			// button restore
			$('body').on('click', '.restoreBtn', function(e) {
				e.preventDefault();
				restoreId = $(this).attr('id');
				restoreName = $(this).attr('val');
				Swal.fire({
				  	title: 'Yakin?',
				  	text: "Pekerja akan dipulihkan!",
				  	icon: 'warning',
				  	showCancelButton: true,
				  	confirmButtonColor: '#3085d6',
				  	cancelButtonColor: '#d33',
				  	confirmButtonText: 'Ya, pulihkan!',
				  	cancelButtonText: 'Batal'
				}).then((result) => {
				  	if (result.value) {
						$.ajax({
							url: '<?= BASEURL ?>Dashboard/softDeleteRestore',
							method: 'POST',
							data: {restoreId: restoreId, restoreName: restoreName, action: 'restoreUser'},
							success: function(response) {
								// console.log(response);
								showAllDeletedUsers();
								$('#tableAlert').html(response);
							}
						});
					    Swal.fire(
					      'Dipulihkan!',
					      'Pekerja berhasil pulih!',
					      'success'
					    );
				  	}
				});
			});

			// button delete permanent
			$('body').on('click', '.prmntDeleteBtn', function(e) {
				e.preventDefault();
				deletedId = $(this).attr('id');
				deletedName = $(this).attr('val');
				Swal.fire({
				  	title: 'Yakin?',
				  	text: "Pekerja dihapus selamanya!",
				  	icon: 'error',
				  	showCancelButton: true,
				  	confirmButtonColor: '#3085d6',
				  	cancelButtonColor: '#d33',
				  	confirmButtonText: 'Ya, hapus!',
				  	cancelButtonText: 'Batal'
				}).then((result) => {
				  	if (result.value) {
						$.ajax({
							url: '<?= BASEURL ?>Dashboard/permanentDelete',
							method: 'POST',
							data: {deletedId: deletedId, deletedName: deletedName},
							success: function(response) {
								// console.log(response);
								showAllDeletedUsers();
								$('#tableAlert').html(response);
							}
						});
					    Swal.fire(
					      'Terhapus!',
					      'Pekerja berhasil dihapus selamanya!',
					      'success'
					    );
				  	}
				});
			});

			// load edit user
			$('body').on('click', '.editBtn', function(e) {
				e.preventDefault();
				editId = $(this).attr('id');
				$.ajax({
					url: '<?= BASEURL ?>Dashboard/loadEdit',
					method: 'POST',
					data: {editId: editId},
					success: function(response) {
						data = JSON.parse(response);
						// console.log(data);
						$('#name').val(data.name);
						$('#email').val(data.email);
						$('#role').val(data.role);
					}
				});
			});

			// button update user
			$('#updateBtn').click(function(e){        
				if ( $('#editUserForm')[0].checkValidity() ) {
					e.preventDefault();
					$.ajax({
						url: '<?= BASEURL ?>Dashboard/storeUpdateUser',
						method: 'POST',
						data: $('#editUserForm').serialize(),
						success: function(response) {
							console.log(response);
						}
					});
				}
			});


			// fungsi menampilkan semua data users
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
					url: '<?= BASEURL ?>Dashboard/allUsers',
					method: 'POST',
					data: {action: 'readAllDeletedUsers'},
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
