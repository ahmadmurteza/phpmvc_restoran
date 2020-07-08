<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Transaksi</h1>
		</div>
		<div class="row">
			<div class="col-lg-8">
				<div class="card">
					<div class="card-header">
						<h4 class="float-left text-success">Tabel Order</h4>
					</div>
					<div class="card-body">
						<div class="table-hover">
							<table class="table table-bordered" id="showOrderTable">
								<!-- data table di restoranku/app/views/templates/worker_template/footer.php -->
							</table>
						</div> 
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="card" id="transactionCard">
					<div class="card-header">
						<h4 class="float-left text-primary">Transaksi</h4>
					</div>
					<div class="card-body">
						<form method="POST" action="" id="transactionForm">
							<p class="text-danger">* Pilih dulu orderan mana yang akan dibayar</p>
							<div id="transactionAlert"></div>
							<input type="hidden" name="pegawai" value="<?= $data['user']['name'] ?>">
							<input type="hidden" name="noTelp" value="<?= $data['user']['phone'] ?>">
							<div class="form-group">
								<label for="mejaId">Meja ID</label>
								<input type="number" class="form-control" id="mejaId" name="mejaId" readonly>
							</div>
							<div class="form-group">
								<label for="nama">Atas Nama</label>
								<input type="text" class="form-control" id="nama" name="nama" required readonly>
							</div>
							<div class="form-group">
								<label for="total">Total</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">Rp</div>
									</div>
									<input type="text" class="form-control" id="total" name="total" required readonly>
								</div>
							</div>
							<div class="form-group">
								<label for="tunai">Tunai</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">Rp</div>
									</div>
									<input type="text" class="form-control" id="tunai" name="tunai" required>
								</div>	
							</div>
							<div class="form-group">
								<button class="btn btn-primary mb-2" id="kembalianBtn">Kembalian</button>
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">Rp</div>
									</div>
									<input type="text" class="form-control" id="kembalian" name="kembalian" required>
								</div>	
							</div>
							<input type="Reset" class="btn btn-danger btn-block" value="Reset">
							<input type="submit" class="btn btn-primary btn-block" id="transactionBtn" value="Transaksi">
						</form>
					</div>
				</div>
			</div>
		</div>		
	</section>
</div>

