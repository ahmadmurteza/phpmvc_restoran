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

	<!-- chart -->
	<script type="text/javascript" src="https://cdnjs.com/libraries/Chart.js"></script>

	<!-- sweet alert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

 	<!-- font awosome -->
 	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>

 	<!-- datatables -->
	<script type="text/javascript" src="<?= BASEURL; ?>vendor/DataTables/datatables.min.js"></script>

	<!-- autonumeric -->
	<script type="text/javascript" src="<?= BASEURL; ?>vendor/autoNumeric/autoNumeric.js"></script>



	<!-- ajax -->
	<script type="text/javascript">
		$(document).ready(function () {
			// chart
			let myChart = document.getElementById('myChart').getContext('2d');

			let massPopChart = new Chart(myChart, {
				type: bar, 
				data: {
					labels: ['Mtp', 'bjb', 'bjm'],
					datasets: [{
						label: 'population',
						data: [100, 200, 300],
						backgroundColor: [
							'rgba(255, 99, 132, 0.2)',
			                'rgba(54, 162, 235, 0.2)',
			                'rgba(255, 206, 86, 0.2)'
						]
					}]
				}
			});


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
						$('#idUser').val(data.id);
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
							// console.log(response);
							showAllUsers();
							$('#tableAlert').html(response);
							$('#editModal').modal('hide');
							$('#editUserForm')[0].reset();
						}
					});
				}
			});

			// form add kategori
			$('#addCategoryForm').submit(function (e) {
               	e.preventDefault();
        		
                $.ajax({
                    url: '<?= BASEURL ?>Dashboard/storeAddCategory',
                    method: 'POST',
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: new FormData(this),
                    success: function (response) {
                    	console.log(response);
                    	showAllCategories();
                        $('#categoriesTableAlert').html(response);
						$('#addCategoryModal').modal('hide');
						$('#addCategoryForm')[0].reset();
                    }
                });
               });

			// load edit kategori
			$('body').on('click', '.editCatBtn', function(e) {
				e.preventDefault();
				editCatId = $(this).attr('id');
				$.ajax({
					url: '<?= BASEURL ?>Dashboard/loadEditCategory',
					method: 'POST',
					data: {editCatId: editCatId},
					success: function(response) {
						data = JSON.parse(response);
						// console.log(data);
						$('#editKodeCat').val(data.kd_kategori);
						$('#editCatName').val(data.name_kategori);
						$('#editCatDescription').val(data.description);
						$('#oldCatPhoto').val(data.photo);
					}
				});
			});


			// form edit kategori
			$('#editCategoryForm').submit(function (e) {
               	e.preventDefault();
        		
                $.ajax({
                    url: '<?= BASEURL ?>Dashboard/storeUpdateCategory',
                    method: 'POST',
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: new FormData(this),
                    success: function (response) {
                    	console.log(response);
                    	showAllCategories();
                        $('#categoriesTableAlert').html(response);
						$('#editCategoryModal').modal('hide');
						$('#editCategoryForm')[0].reset();
                    }
                });
               });

			// menghapus kategori
			$('body').on('click', '.delCatBtn', function(e) {
				e.preventDefault();
				deletedId = $(this).attr('id');
				deletedName = $(this).attr('val');
				Swal.fire({
				  	title: 'Yakin?',
				  	text: "Kategori akan dihapus selamanya!",
				  	icon: 'error',
				  	showCancelButton: true,
				  	confirmButtonColor: '#3085d6',
				  	cancelButtonColor: '#d33',
				  	confirmButtonText: 'Ya, hapus!',
				  	cancelButtonText: 'Batal'
				}).then((result) => {
				  	if (result.value) {
						$.ajax({
							url: '<?= BASEURL ?>Dashboard/deleteCategory',
							method: 'POST',
							data: {deletedId: deletedId, deletedName: deletedName},
							success: function(response) {
								console.log(response);
								showAllCategories();
								$('#categoriesTableAlert').html(response);
							}
						});
					    Swal.fire(
					      'Terhapus!',
					      'Kategori berhasil dihapus selamanya!',
					      'success'
					    );
				  	}
				});
			});

			// menambah addMenuBtn menu
			$('#addMenuForm').submit(function (e) {
				e.preventDefault();

				$.ajax({
					url: '<?= BASEURL ?>Dashboard/storeAddMenu',
					method: 'POST',
					processData: false,
					contentType: false,
					cache: false,
					data: new FormData(this),
					success: function (response) {
						console.log(response);
                    		showAllMenu();
                        $('#menuTableAlert').html(response);
						$('#addMenuModal').modal('hide');
						$('#addMenuForm')[0].reset();
					}
				});
			});

			// load edit menu
			$('body').on('click', '.editMenuBtn', function(e) {
				e.preventDefault();
				editMenuId = $(this).attr('id');
				$.ajax({
					url: '<?= BASEURL ?>Dashboard/loadEditMenu',
					method: 'POST',
					data: {editMenuId: editMenuId},
					success: function(response) {
						data = JSON.parse(response);
						// console.log(response);
						$('#menuCodeEdit').val(data.kd_menu);
						$('#menuNameEdit').val(data.name_menu);
						$('#priceEdit').val(data.harga);
						$('#menuCatEdit').val(data.kategori_id);
						$('#menustatsEdit').val(data.status);
						$('#menuDescriptionEdit').val(data.description);
						$('#oldMenuPhoto').val(data.photo);
					}
				});
			});

			// form edit menu
			$('#editMenuForm').submit(function (e) {
				e.preventDefault();

				$.ajax({
					url: '<?= BASEURL ?>Dashboard/storeUpdateMenu',
					method: 'POST',
					processData: false,
					contentType: false,
					cache: false,
					data: new FormData(this),
					success: function (response) {
						// console.log(response);
						showAllMenu();
						$('#menuTableAlert').html(response);
						$('#editMenuModal').modal('hide');
						$('#editMenuForm')[0].reset();
					}
				});
			});

			// menghapus Menu
			$('body').on('click', '.delMenuBtn', function(e) {
				e.preventDefault();
				deletedId = $(this).attr('id');
				deletedName = $(this).attr('val');
				Swal.fire({
				  	title: 'Yakin?',
				  	text: "Menu akan dihapus selamanya!",
				  	icon: 'error',
				  	showCancelButton: true,
				  	confirmButtonColor: '#3085d6',
				  	cancelButtonColor: '#d33',
				  	confirmButtonText: 'Ya, hapus!',
				  	cancelButtonText: 'Batal'
				}).then((result) => {
				  	if (result.value) {
						$.ajax({
							url: '<?= BASEURL ?>Dashboard/deleteMenu',
							method: 'POST',
							data: {deletedId: deletedId, deletedName: deletedName},
							success: function(response) {
								console.log(response);
								showAllMenu();
								$('#menuTableAlert').html(response);
							}
						});
					    Swal.fire(
					      'Terhapus!',
					      'Menu berhasil dihapus selamanya!',
					      'success'
					    );
				  	}
				});
			});

			// menambahkan meja baru
			$('#addMejaForm').submit(function (e) {
				e.preventDefault();

				$.ajax({
					url: '<?= BASEURL ?>Dashboard/storeAddMeja',
					method: 'POST',
					processData: false,
					contentType: false,
					cache: false,
					data: new FormData(this),
					success: function (response) {
						// console.log(response);
						$('#mejaBtn').load(' #mejaBtn');
                        $('#mejaAlert').html(response);
						$('#addMejaForm')[0].reset();
					}
				});
			});

			// menghapus meja
			$('#delMejaForm').submit(function (e) {
				e.preventDefault();

				$.ajax({
					url: '<?= BASEURL ?>Dashboard/deleteMeja',
					method: 'POST',
					processData: false,
					contentType: false,
					cache: false,
					data: new FormData(this),
					success: function (response) {
						// console.log(response);
						$('#mejaBtn').load(' #mejaBtn');
                        $('#btnMejaAlert').html(response);
						$('#deleteMeja').modal('hide');
						$('#delMejaForm')[0].reset();
					}
				});
			});

			// load order info
			$('body').on('click', '.infoBtn', function(e) {
				e.preventDefault();
				orderId = $(this).attr('id');
				$('#deactiveTable').val(orderId);
				showAllOrder(orderId);
			});

			// menampilkan table order
			function showAllOrder(orderId) {
				$.ajax({
					url: '<?= BASEURL ?>Dashboard/loadOrder',
					method: 'POST',
					data: {orderId: orderId},
					success: function(response) {
						var show = '';
						data = JSON.parse(response);
						show += '<tr><th>Foto</th><th>Menu</th><th>Jumlah</th><th>Status</th></tr>';
						for (var i = 0; i < data.length ; i++) {
							if (data[i].status == 'belum') {
								data[i].status = {
									'btn': 'danger', 
									'btnStat': 'Belum', 
								}
							} else {
								data[i].status = {
									'btn': 'info', 
									'btnStat': 'Selesai', 
								}
							}
							show += '<tr>'+
								'<td><img src="<?= BASEURL; ?>assets/uploads/'+ data[i].photo +'" width="50px" height="50px"></td>'+
								'<td>'+ data[i].name_menu +'</td>'+
								'<td>'+ data[i].jumlah +'</td>'+
								'<td>'+
									'<button class="btn btn-'+ data[i].status.btn +' dropdown-toggle" type="button" id="statusDropDown"'+
									' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+ 
										data[i].status.btnStat +
									'</button>'+
									'<div class="dropdown-menu" aria-labelledby="statusDropDown">'+
									'<a class="dropdown-item blumOrderBtn" href="#" id="'+ data[i].id_order +'" val="'+ orderId +'">Belum</a>'+
									'<a class="dropdown-item selOrderBtn" href="#" id="'+ data[i].id_order +'" val="'+ orderId +'">Selesai</a>'+
									'</div>'+
								'</td>'+
							'</tr>';
						}
						$('#orderTable').html(show);
					}
				});
			}

			// mengubah status order belum
			$('body').on('click', '.blumOrderBtn', function(e) {
				e.preventDefault();
				var blumOrderId = $(this).attr('id');
				var mejaId = $(this).attr('val');
				$.ajax({
					url: '<?= BASEURL ?>Dashboard/changeStatus',
					method: 'POST',
					data: {blumOrderId: blumOrderId},
					success: function(response) {
						showAllOrder(mejaId);
						$('#orderAlert').html(response);
					}
				});
			});

			// mengubah status order Sudah
			$('body').on('click', '.selOrderBtn', function(e) {
				e.preventDefault();
				var selOrderId = $(this).attr('id');
				var mejaId = $(this).attr('val');
				$.ajax({
					url: '<?= BASEURL ?>Dashboard/changeStatus',
					method: 'POST',
					data: {selOrderId: selOrderId},
					success: function(response) {
						showAllOrder(mejaId);
						$('#orderAlert').html(response);
					}
				});
			});

			// menonaktifkan meja 
			$('#deactiveTable').click(function(e) {
				e.preventDefault();
				var tableId = $('#deactiveTable').val();
				$.ajax({
					url: '<?= BASEURL ?>Dashboard/deactiveTable',
					method: 'POST',
					data: {tableId: tableId},
					success: function(response) {
						$('#btnMejaAlert').html(response);
						$('#orderInfo').modal('hide');
						$('#mejaBtn').load(' #mejaBtn');
					}
				});
			});

			// load transaksi form
			$('body').on('click', '.byrBtn', function(e) {
				e.preventDefault();
				var byrId = $(this).attr('id');
				$.ajax({
					url: '<?= BASEURL ?>Dashboard/loadtransForm',
					type: 'POST',
					data: {byrId: byrId},
					success: function(response) {
						var data = JSON.parse(response);
						// $('#transactionCard').load(' #transactionCard');
						$('#mejaId').val(data.id);
						$('#nama').val(data.nama);
						$('#total').val(data.total).autoNumeric('init');
						
					}
				});
			});

			// kembalian
			$('#kembalianBtn').click(function(e) {
				e.preventDefault();
				var tunai = parseInt($('#tunai').val().slice(0, -3).replace(',', ''));
				var total = parseInt($('#total').val().slice(0, -3).replace(',', ''));
				var kembalian = tunai - total;
				$('#kembalian').val(kembalian).autoNumeric('init');
			});	

			//store transaksi
			$('#transactionBtn').click(function(e){        
				if ( $('#transactionForm')[0].checkValidity() ) {
					e.preventDefault();
					$.ajax({
						url: '<?= BASEURL ?>Dashboard/storeTrans',
						method: 'POST',
						data: $('#transactionForm').serialize(),
						success: function(response) {
							$('#transactionAlert').html(response);
							$('#transactionForm')[0].reset();
							showAllOrderForTransaction();
						}
					});
				}
			});

			// menampilkan table order
			showAllOrderForTransaction();
			function showAllOrderForTransaction() {
				var params = {
					url: '<?= BASEURL ?>Dashboard/getAllOrder',
					method: 'POST',
					data: {action: 'readAll'},
					success: function (response) {
						var show = '';
						data = JSON.parse(response);
						show += '<tr><th>Nama</th><th>Nomer Meja</th><th>Total</th><th>Aksi</th></tr>';
						for (var i = 0; i < data.length; i++) {
							show += '<tr>'+
									'<td>'+ data[i].nama +'</td>'+
									'<td>'+ data[i].no_meja +'</td>'+
									'<td>'+ data[i].total +'</td>'+
									'<td>'+
										'<a href="#" class="btn btn-primary byrBtn" id="'+ data[i].id +'">Bayar</a>'+
									'</td>'+
									'</tr>'
						}
						$('#showOrderTable').html(show);
					}
				}
				$.ajax(params);
			}

			// format uang di form transaksi
			$('#tunai').autoNumeric('init');

			// menampilkan data Menu
			showAllMenu();
			function showAllMenu() {
				var params = {
					url: '<?= BASEURL ?>Dashboard/allMenu',
					method: 'POST',
					data: {action: 'readAllMenu'},
					success: function (response) {
						// console.log(response);
						$('#allMenuTable').html(response);
						$('#menuTable').DataTable();
					}
				}
				$.ajax(params);
			}

			// menampilkan data kategori
			showAllCategories();
			function showAllCategories() {
				var params = {
					url: '<?= BASEURL ?>Dashboard/allCategories',
					method: 'POST',
					data: {action: 'readAllCateories'},
					success: function (response) {
						// console.log(response);
						$('#allCategoriesTable').html(response);
						$('#categoriesTable').DataTable();
					}
				}
				$.ajax(params);
			}


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
