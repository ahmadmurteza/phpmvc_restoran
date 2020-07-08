<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Meja</h1>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="card">
					<div class="card-header">
						<h4 class="float-left text-primary">Tambah Meja</h4>
					</div>
					<div class="card-body">
						<form method="POST" action="" id="addMejaForm">
							<div id="mejaAlert"></div>
							<div class="form-group">
								<label for="no_meja">Nomer Meja Baru</label>
								<input type="number" class="form-control" id="no_meja" name="no_meja" required>
							</div>
							<input type="submit" class="btn btn-primary btn-block" id="addMejaBtn">
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="card">
					<div class="card-header">
						<div class="col-lg-6">
							<h4 class="float-left text-success">Meja</h4>
						</div>
						<div class="col-lg-6">
							<a href="" class="btn btn-danger float-right" id="delMeja" data-toggle="modal" data-target="#deleteMeja">
								<i class="fas fa-minus fa-lg"></i>&nbsp;&nbsp;
								Hapus Meja
							</a>
						</div>
					</div>
					<div class="card-body">
						<div id="btnMejaAlert"></div>
						<p class="text-muted">Klik meja yang aktif untuk melihat order</p>
						<div class="buttons" id="mejaBtn">
							<?php foreach ($data['meja'] as $row) : ?>
								<a href="#" class="btn btn-icon btn-<?= ($row['status'] == 'non-active') ? 'secondary' : 'success'?> btn-lg <?= ($row['status'] == 'non-active') ? 'disabled' : ''?> infoBtn" id="<?= $row['id'] ?>" data-toggle="modal" data-target="#orderInfo">
									<i class="fas fa-utensils"></i>&nbsp;
									<?= $row['no_meja'] ?>
								</a>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</section>
</div>

<div class="modal fade" id="deleteMeja" tabindex="-1" role="dialog" aria-labelledby="deleteMejaLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="deleteMejaLabel">Masukan no meja yang akan dihapus</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="" id="delMejaForm" enctype="multipart/form-data">
				<div class="modal-body">
				  	<div class="form-group">
						<input type="number" class="form-control" id="no_meja" name="no_meja" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-danger" id="delMejaBtn">
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="orderInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Info order</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div id="orderAlert"></div>
				<table id="orderTable" class="table">
					<!-- table di footer ajax -->
				</table>
				<hr>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<form id="deactiveForm"> 
					<input type="hidden" name="deactiveMejaId" id="deactiveMejaId">
					<button type="submit" class="btn btn-danger" id="deactiveTable">Nonaktifkan Meja</button>
				</form> 
			</div>
		</div>
	</div>
</div>

<!-- dropdown status pada orderTable -->
 