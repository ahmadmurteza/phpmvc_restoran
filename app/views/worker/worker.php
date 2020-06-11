<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Pekerja RestoranKu</h1>
		</div>
		<div class="card">
			<div class="card-header">
					<div class="col-lg-6">
						<h4 class="float-left">Tabel Pekerja</h4>
					</div>
					<div class="col-lg-6">
						<a href="" class="btn btn-danger float-right" id="deletedUsersBtn">
							<i class="fas fa-user-slash fa-lg"></i>&nbsp;&nbsp;
							Pekerja yang dihapus
						</a>
						<a href="" class="btn btn-warning float-right" id="backBtn">
							<i class="fas fa-arrow-alt-circle-left fa-lg"></i>&nbsp;&nbsp;
							Kembali
						</a>
					</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover table-bordered " id="workerTable">
						<thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Posisi</th>
                                <th>Email</th>
                                <th>Verifikasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
						<tbody id="allUsersTable">
							<!-- method -->
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>