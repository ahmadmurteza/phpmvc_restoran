<footer class="main-footer">
  <div class="footer-left">
    Copyright &copy; 2020 <div class="bullet"></div> Oleh <a href="#">Ahmad Murteza Akbari</a>
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

<!-- font awosome -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="<?= BASEURL; ?>assets/js/scripts.js"></script>
<script src="<?= BASEURL; ?>assets/js/custom.js"></script>

<!-- sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<!-- ajax -->
<script type="text/javascript">
	$(document).ready(function () {
		// ajax untuk orderForm
		$('#orderForm').submit(function (e) {
			e.preventDefault();

			$.ajax({
				url: '<?= BASEURL ?>Customer/storeOrder',
				method: 'POST',
				processData: false,
				contentType: false,
				cache: false,
				data: new FormData(this),
				success: function (response) {
					$('#menuAlert').html(response);
				}
			});
		});
		
		// ajax order
		$('body').on('click', '.orderDone', function(e) {
			e.preventDefault();
			orderId = $(this).attr('id');
			showOrderTable(orderId);
		});

		// ajax order
		$('body').on('click', '#orderFinish', function(e) {
			e.preventDefault();
			Swal.fire({
				title: 'Chekout Order?',
				text: "Selesai order!",
				icon: 'info',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Oke!',
				cancelButtonText: 'Pilih menu lagi'
			}).then((result) => {
				if (result.value) {
					window.location.href = "<?= BASEURL ?>Auth/logout";
				}
			})
		});

		// ajax cancel order
		$('body').on('click', '.cancelBtn', function(e) { 
			e.preventDefault();
			var cancelId = $(this).attr('id');
			var cancelName = $(this).attr('val');
			var mejaId = <?= $data['customer']['id'] ?>;
			$.ajax({
				url: '<?= BASEURL ?>Customer/cancelOrder',
				method: 'POST',
				data: {cancelId: cancelId, cancelName: cancelName, mejaId: mejaId},
				success: function(response) {
					console.log(response);
					showOrderTable(mejaId);
					$('#orderAlert').html(response);
				}
			});
		});

		// function show table
		function showOrderTable(orderId) {
			$.ajax({
				url: '<?= BASEURL ?>Customer/loadOrder',
				method: 'POST',
				data: {orderId: orderId},
				success: function(response) {
					var show = '';
					var total = 0;
					data = JSON.parse(response);
					show += '<tr><th>Foto</th><th>Menu</th><th>Jumlah</th><th>Subtotal</th><th>Batal</th></tr>';
					for (var i = 0; i < data.length ; i++) {
						var subTotal = parseInt(data[i].harga) * parseInt(data[i].jumlah);
						total += subTotal;
						show += '<tr id="orderRow">'+
									'<td><img src="<?= BASEURL; ?>assets/uploads/'+ data[i].photo +'" width="50px" height="50px"></td>'+
									'<td>'+ data[i].name_menu +'</td>'+
									'<td>'+ data[i].jumlah +'</td>'+
									'<td>'+ subTotal +'</td>'+
									'<td>'+
											'<a href="" class="btn btn-danger cancelBtn" id="'+ data[i].id_order +'" val="'+ data[i].name_menu +'">'+
											'<i class="fas fa-trash"></i></a>'+
									'</td>'+
								'</tr>';
					}
					showTotal = 'Total: '+ total;
					$('#orderTable').html(show);
					$('#totalInfo').html(showTotal);
				}
			});
		}
	});
</script>


</body>
</html>