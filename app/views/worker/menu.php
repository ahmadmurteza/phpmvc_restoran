<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Menu</h1>
		</div>
		<div class="card">
			<div class="card-header">
				<div class="col-lg-6">
					<h4 class="float-left">Tabel Menu</h4>
				</div>
				<div class="col-lg-6">
					<a href="" class="btn btn-success float-right" id="addMenu" data-toggle="modal" data-target="#addMenuModal">
						<i class="fas fa-plus fa-lg"></i>&nbsp;&nbsp;
						Tambah Menu
					</a>
				</div>
			</div>
			<div class="card-body">
				<div id="menuTableAlert"></div>
				<div class="table-responsive">
					<table class="table table-hover table-bordered " id="menuTable">
						<thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Menu</th>
                                <th>Nama Menu</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Photo</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
						<tbody id="allMenuTable">
							<!-- table di controller -->
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
</div>

<div class="modal fade" id="addMenuModal" tabindex="-1" role="dialog" aria-labelledby="addMenuModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addMenuModalLabel">Tambah Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="" id="addMenuForm" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="menuCode">Kode Menu</label>
								<input type="text" class="form-control" id="menuCode" name="menuCode" required> 
							</div>
							<div class="form-group">
								<label for="menuName">Nama Menu</label>
								<input type="text" class="form-control" id="menuName" name="menuName" required>
							</div>
							<div class="form-group">
								<label for="price">Harga</label>
								<input type="number" class="form-control" id="price" name="price" required>
							</div>
							<div class="form-group">
								<label for="menuCat">Kategori Menu</label>
								<select class="form-control" id="menuCat" name="menuCat" required="">
									<option value=""></option>
									<?php foreach ($data['kategori'] as $row) : ?>
										<option value="<?= $row['kd_kategori'] ?>"><?= $row['name_kategori'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>		
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="menustats">Status</label>
								<select class="form-control" id="menustats" name="menuStats" required="">
									<option value=""></option>
									<option value="tersedia">Tersedia</option>
									<option value="tidak_tersedia">Tidak tersedia</option>
								</select>
							</div>
							<div class="form-group">
							    <label for="menuDescription">Deskripsi</label>
							    <textarea class="form-control" name="menuDescription" required id="menuDescription" rows="4" style="height: 100px;"></textarea>
						  	</div>
						  	<div class="custom-file">
						  		<input type="file" class="custom-file-input" id="menuPhoto" name="menuPhoto" required>
						  		<label class="custom-file-label" for="menuPhoto">Pilih Foto Menu</label>
						  	</div>		
						</div>
					</div>
				  	
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" id="addMenuBtn">
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="editMenuModal" tabindex="-1" role="dialog" aria-labelledby="editMenuModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editMenuModalLabel">Edit Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="" id="editMenuForm" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-6">
							<input type="hidden" class="form-control" id="menuCodeEdit" name="menuCodeEdit" required> 
							<div class="form-group">
								<label for="menuNameEdit">Nama Menu</label>
								<input type="text" class="form-control" id="menuNameEdit" name="menuNameEdit" required>
							</div>
							<div class="form-group">
								<label for="priceEdit">Harga</label>
								<input type="number" class="form-control" id="priceEdit" name="priceEdit" required>
							</div>
							<div class="form-group">
								<label for="menuCatEdit">Kategori Menu</label>
								<select class="form-control" id="menuCatEdit" name="menuCatEdit" required="">
									<option value=""></option>
									<?php foreach ($data['kategori'] as $row) : ?>
										<option value="<?= $row['kd_kategori'] ?>"><?= $row['name_kategori'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>		
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="menustatsEdit">Status</label>
								<select class="form-control" id="menustatsEdit" name="menuStatsEdit" required="">
									<option value=""></option>
									<option value="tersedia">Tersedia</option>
									<option value="tidak_tersedia">Tidak tersedia</option>
								</select>
							</div>
							<div class="form-group">
							    <label for="menuDescriptionEdit">Deskripsi</label>
							    <textarea class="form-control" name="menuDescriptionEdit" required id="menuDescriptionEdit" rows="4" style="height: 100px;"></textarea>
						  	</div>
						  	<div class="custom-file">
						  		<input type="hidden" id="oldMenuPhoto" name="oldMenuPhoto">
						  		<input type="file" class="custom-file-input" id="menuPhotoEdit" name="menuPhotoEdit">
						  		<label class="custom-file-label" for="menuPhotoEdit">Pilih Foto Menu</label>
						  	</div>		
						</div>
					</div>
				  	
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" id="editMenuBtn">
				</div>
			</form>
		</div>
	</div>
</div>