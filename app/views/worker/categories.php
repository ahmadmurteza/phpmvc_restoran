<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Kategori</h1>
		</div>
		<div class="card">
			<div class="card-header">
					<div class="col-lg-6">
						<h4 class="float-left">Tabel Kategori</h4>
					</div>
					<div class="col-lg-6">
						<a href="" class="btn btn-success float-right" id="addCategories" data-toggle="modal" data-target="#addCategoryModal">
							<i class="fas fa-plus fa-lg"></i>&nbsp;&nbsp;
							Tambah Kategori
						</a>
					</div>
			</div>
			<div class="card-body">
				<div id="categoriesTableAlert"></div>
				<div class="table-responsive">
					<table class="table table-hover table-bordered " id="categoriesTable">
						<thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Kategori</th>
                                <th>Nama Kategori</th>
                                <th>Deskripsi</th>
                                <th>Photo</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
						<tbody id="allCategoriesTable">
							<!-- table di controller -->
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
</div>

<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoriesModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addCategoriesModalLabel">Tambah Kategori</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="" id="addCategoryForm" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="kodeCat">Kode Kategori</label>
						<input type="text" class="form-control" id="kodeCat" name="kodeCat" required> 
					</div>
					<div class="form-group">
						<label for="catName">Nama Kategori</label>
						<input type="text" class="form-control" id="catName" name="catName" required>
					</div>
					<div class="form-group">
					    <label for="catDescription">Deskripsi</label>
					    <textarea class="form-control" name="catDescription" required id="catDescription" rows="4" style="height: 100px;"></textarea>
				  	</div>
				  	<div class="custom-file">
				  		<input type="file" class="custom-file-input" id="catPhoto" name="catPhoto" required>
				  		<label class="custom-file-label" for="catPhoto">Pilih Foto Kategori</label>
				  	</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" id="addCategoryBtn">
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editCategoryModalModalLabel">Edit Kategori</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="" id="editCategoryForm" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<input type="hidden" class="form-control" id="editKodeCat" name="editKodeCat" required>  
						<label for="editCatName">Nama Kategori</label>
						<input type="text" class="form-control" id="editCatName" name="editCatName" required>
					</div>
					<div class="form-group">
					    <label for="editCatDescription">Deskripsi</label>
					    <textarea class="form-control" name="editCatDescription" required id="editCatDescription" rows="4" style="height: 100px;"></textarea>
				  	</div>
				  	<div class="custom-file">
				  		<input type="hidden" id="oldCatPhoto" name="oldCatPhoto">
				  		<input type="file" class="custom-file-input" id="editCatPhoto" name="editCatPhoto">
				  		<label class="custom-file-label" for="editCatPhoto" >Pilih Foto Kategori</label>
				  	</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" id="editCategoryBtn" value="Perbaharui">
				</div>
			</form>
		</div>
	</div>
</div>