<?php 
class Dashboard extends Controller {

	public $Dashboard;

	public function __construct() {
		$this->model('Dashboard_model');
		$this->Dashboard = new Dashboard_model;
	}

	public function index() {
		$email = $_SESSION['user'];
		$data['user'] = $this->Dashboard->getCurrentUser($email); // mengambil data user saat ini
		$data['menu'] = $this->Dashboard->getAllData('menu');
		$data['title'] = 'Dashboard';
		$this->view('templates/worker_template/header', $data);
		$this->view('templates/worker_template/sidebar', $data);
		$this->view('worker/index', $data);
		$this->view('templates/worker_template/footer');
	}

	public function worker() {
		$email = $_SESSION['user'];
		$data['user'] = $this->Dashboard->getCurrentUser($email); // mengambil data user saat ini
		$data['title'] = 'Worker';
		$this->view('templates/worker_template/header', $data);
		$this->view('templates/worker_template/sidebar', $data);
		$this->view('worker/worker', $data);
		$this->view('templates/worker_template/footer');
	}

	public function categories() {
		$email = $_SESSION['user'];
		$data['user'] = $this->Dashboard->getCurrentUser($email); // mengambil data user saat ini
		$data['title'] = 'Kategori';
		$this->view('templates/worker_template/header', $data);
		$this->view('templates/worker_template/sidebar', $data);
		$this->view('worker/categories', $data);
		$this->view('templates/worker_template/footer');
	}

	public function menu() {
		$email = $_SESSION['user'];
		$data['user'] = $this->Dashboard->getCurrentUser($email); // mengambil data user saat ini
		$data['kategori'] = $this->Dashboard->getAllData('kategori'); // mengambil data kategori
		$data['title'] = 'Menu';
		$this->view('templates/worker_template/header', $data);
		$this->view('templates/worker_template/sidebar', $data);
		$this->view('worker/menu', $data);
		$this->view('templates/worker_template/footer');
	}

	public function meja() {
		$email = $_SESSION['user'];
		$data['user'] = $this->Dashboard->getCurrentUser($email); // mengambil data user saat ini
		$data['meja'] = $this->Dashboard->getAllDataAsc('meja', 'no_meja'); // mengambil data kategori
		$data['title'] = 'Meja';
		$this->view('templates/worker_template/header', $data);
		$this->view('templates/worker_template/sidebar', $data);
		$this->view('worker/meja', $data);
		$this->view('templates/worker_template/footer');
	}

	public function transaksi() {
		$email = $_SESSION['user'];
		$data['user'] = $this->Dashboard->getCurrentUser($email); // mengambil data user saat ini
		$data['title'] = 'Transaksi';
		$this->view('templates/worker_template/header', $data);
		$this->view('templates/worker_template/sidebar', $data);
		$this->view('worker/transaksi', $data);
		$this->view('templates/worker_template/footer');
	}

	public function report() {
		$data['transaksi'] = $this->Dashboard->getAllData('transaksi');
		$this->view('report', $data);
	}

	public function allUsers() {
		$no	= 1;
		$output = '';
		// kondisi pengambilan data users
		if ( isset($_POST['action']) && $_POST['action'] == 'readAllUsers' ) {
			$data = $this->Dashboard->getAllUsers(1);
		} elseif (isset($_POST['action']) && $_POST['action'] == 'readAllDeletedUsers') {
			$data = $this->Dashboard->getAllUsers(0);
		}

		// kondisi penampilan data
		if (!$data) {
			echo '<tr class="text-center"><td colspan="6"><h4>Data masih kosong</h4></td></tr>';
		} else {
			foreach ($data as $row) {
				// kondisi button verifikasi
				if ( isset($_POST['action']) && $_POST['action'] == 'readAllUsers' ) {
					if ($row['role'] == 'admin') {
						$row['verified'] = '<span class="badge badge-secondary">Dikelola owner</span>';
					} else {
						if ($row['verified'] == 1) {
							$row['verified'] = '<span class="badge badge-secondary">Terverifikasi</span>';
						} else {
							$row['verified'] = '<a href="" class="btn btn-primary verifiedBtn" id="'. $row['id'] .'" val="'. $row['name'] .'">Verfikasi</a>';
						}
					}
				} else {
					$row['verified'] = '<span class="badge badge-secondary">Restore untuk verikasi lagi</span>';
				}
				
				// kondisi role
				$admin = '<span class="badge badge-primary">Admin</span>';
				switch ($row['role']) {
					case 'admin':
						$row['role'] = $admin;
						break;
					
					case 'kasir':
						$row['role'] = '<span class="badge badge-warning">Kasir</span>';
						break;

					case 'owner':
						$row['role'] = '<span class="badge badge-danger">Owner</span>';
						break;

					case 'koki':
						$row['role'] = '<span class="badge badge-info">Koki</span>';
						break;

					default:
						$row['role'] = '<span class="badge badge-secondary">default</span>';
						break;
				}

				// kondisi button aksi
				if ( isset($_POST['action']) && $_POST['action'] == 'readAllUsers' ) {

					$action1 = [
						'button' => 'btn btn-success editBtn',
						'title' => 'Edit pekerja',
						'icon' => 'fa-edit',
						'modal' => 'data-toggle="modal" data-target="#editModal"'
					];

					$action2 = [
						'button' => 'btn btn-warning deleteBtn',
						'title' => 'Hapus pekerja ',
						'icon' => 'fa-trash'
					];

				} else {

					$action1 = [
						'button' => 'btn btn-dark restoreBtn',
						'title' => 'Restore pekerja',
						'icon' => 'fa-trash-restore',
						'modal' => ''
					];

					$action2 = [
						'button' => 'btn btn-danger prmntDeleteBtn',
						'title' => 'Hapus pekerja permanen',
						'icon' => 'fa-trash'
					];
				}

				$output .=	'<tr>
	                            <th>'. $no++ .'</th>
	                            <td>'. $row['name'] .'</td>
	                            <td>'. $row['role'] .'</td>
	                            <td>'. $row['email'] .'</td>
	                            <td>'. $row['verified'] .'</td>
	                            <td class="text-center">';

	            if ( $row['role'] != $admin ) {
	            	$output .= '
            					<a href="#" title="'. $action2['title'] .'" class="'. $action2['button'] .'" id="'. $row['id'] .'" val="'. $row['name'] .'">
                                    <i class="fas '. $action2['icon'] .'"></i>
                                </a>

                                <a href="#" title="'. $action1['title'] .'" class="'. $action1['button'] .'" id="'. $row['id'] .'" '. $action1['modal'] .' val="'. $row['name'] .'">
                                    <i class="fas '. $action1['icon'] .'"></i>
                                </a>';
	            } else {
	            	$output .= '<span class="badge badge-secondary">Dikelola owner</span>';
	            }

	            $output .= 		'</td>
                        	</tr>';
			}
			echo $output;
		}
	}


	public function verified() {
		$this->Dashboard->verifiedUser(1, $_POST['verifiedId']);
		Flasher::setFlash('success', ucfirst($_POST['verifiedName']).' berhasil diverifikasi');
		Flasher::flash();
	}

	public function softDeleteRestore() {
		if ( isset($_POST['action']) && $_POST['action'] == 'deleteUser' ) {
			$this->Dashboard->deleteRestore(0, $_POST['deletedId']);
			Flasher::setFlash('warning', ucfirst($_POST['deletedName']).' berhasil dihapus (data dipindahkan ke user yang dihapus)');
			Flasher::flash();
		} else {
			$this->Dashboard->deleteRestore(1, $_POST['restoreId']);
			Flasher::setFlash('info', ucfirst($_POST['restoreName']).' berhasil dipulihkan');
			Flasher::flash();
		}
		
	}

	public function permanentDelete() {
		$this->Dashboard->deletePermanent($_POST['deletedId']);
		Flasher::setFlash('danger', ucfirst($_POST['deletedName']).' berhasil dihapus permanen');
		Flasher::flash();
	}

	public function loadEdit() {
    	$data = $this->Dashboard->getUserById($_POST['editId']);
    	echo json_encode($data);
	}

	public function storeUpdateUser() {
		$_POST['role'] = (integer)$_POST['role'];
		$this->Dashboard->updateUser($_POST);
		Flasher::setFlash('info', ucfirst($_POST['name']).' berhasil diperbaharui');
		Flasher::flash();
	}

	public function storeAddCategory() {
		$data = $this->Dashboard->getDataById('kategori', 'kd_kategori', $_POST['kodeCat']);
		if ($_POST['kodeCat'] == $data['kd_kategori']) {
			Flasher::setFlash('danger', 'Kode kategori telah dipakai');
			Flasher::flash();
		} else {
			$file_tmp = $_FILES['catPhoto']['tmp_name'];
			$new_image = $_FILES['catPhoto']['name']; 
			move_uploaded_file($file_tmp, 'assets/uploads/'. $new_image);
			$this->Dashboard->addCategory($_POST, $new_image);
			Flasher::setFlash('success', 'Kategori '. ucfirst($_POST['catName']).' berhasil ditambahkan');
			Flasher::flash();
		}
	}

	public function allCategories() {
		$no	= 1;
		$output = '';

		//pengambilan data ke kategori
		$data = $this->Dashboard->getAllData('kategori');

		// kondisi penampilan data
		if (!$data) {
			echo '<tr class="text-center">
						<td colspan="6">
							<h4>Data masih kosong</h4>
						</td>
						<td style="display: none"></td>
					    <td style="display: none"></td>
					    <td style="display: none"></td>
					    <td style="display: none"></td>
					    <td style="display: none"></td>
					</tr>';
		} else {
			foreach ($data as $row) {

				$output .=	'<tr>
	                            <th>'. $no++ .'</th>
	                            <td>'. $row['kd_kategori'] .'</td>
	                            <td>'. $row['name_kategori'] .'</td>
	                            <td>'. $row['description'] .'</td>
	                            <td class="text-center"><img src="'. BASEURL .'assets/uploads/'. $row['photo'] .'" width="50px" height="50px"></td>
	                            <td class="text-center">
	                            	<a href="#" title="Edit Kategori" class="btn btn-success editCatBtn" id="'. $row['kd_kategori'] .'" val="'. $row['name_kategori'] .'" style="text-decoration: none" data-toggle="modal" data-target="#editCategoryModal">
                                    	<i class="fas fa-edit"></i>
	                                </a>
	                                <a href="#" title="Hapus Kategori" class="btn btn-danger delCatBtn" id="'. $row['kd_kategori'] .'" val="'. $row['name_kategori'] .'" style="text-decoration: none">
                                    	<i class="fas fa-trash"></i>
	                                </a>
                                </td>
                        	</tr>';
			}
			echo $output;
		}
	}

	public function loadEditCategory() {
		// print_r($_POST);
    	$data = $this->Dashboard->getDataById('kategori', 'kd_kategori', $_POST['editCatId']);
    	// print_r($data);
    	echo json_encode($data);
	}

	public function storeUpdateCategory() {
		
		$file_tmp = $_FILES['editCatPhoto']['tmp_name'];
	    $old_image = $_POST['oldCatPhoto'];
	    $new_image = $_FILES['editCatPhoto']['name'];  
	    if(isset($_FILES['editCatPhoto']['name']) &&  $_FILES['editCatPhoto']['name'] != '') {
	        move_uploaded_file($file_tmp, 'assets/uploads/'. $new_image);

	        if ($old_image != null) {
	            unlink('assets/uploads/'. $old_image);
	        }
	    } else {
	        $new_image = $old_image;
	    }
	    
		$this->Dashboard->updateCategory($_POST, $new_image);
		
		Flasher::setFlash('success', 'Kategori '. ucfirst($_POST['editCatName']).' berhasil diperbaharui');
		Flasher::flash();
	}

	public function deleteCategory() {
		$this->Dashboard->deleteById('kategori', 'kd_kategori', $_POST['deletedId']);
		Flasher::setFlash('danger', 'Kategori '. $_POST['deletedName'] .' berhasil dihapus permanen');
		Flasher::flash();
	}

	public function allMenu() {
		$no	= 1;
		$output = '';

		//pengambilan data ke kategori
		$data = $this->Dashboard->getAllData('menu');

		// kondisi penampilan data
		if (!$data) {
			echo '<tr class="text-center">
						<td colspan="6">
							<h4>Data masih kosong</h4>
						</td>
						<td style="display: none"></td>
					    <td style="display: none"></td>
					    <td style="display: none"></td>
					    <td style="display: none"></td>
					    <td style="display: none"></td>
					</tr>';
		} else {
			foreach ($data as $row) {

				$output .=	'<tr>
	                            <th>'. $no++ .'</th>
	                            <td>'. $row['kd_menu'] .'</td>
	                            <td>'. $row['name_menu'] .'</td>
	                            <td>'. $row['harga'] .'</td>
	                            <td>'. $row['description'] .'</td>
	                            <td class="text-center"><img src="'. BASEURL .'assets/uploads/'. $row['photo'] .'" width="50px" height="50px"></td>
	                            <td class="text-center">
	                            	<a href="#" title="Edit menu" class="btn btn-success editMenuBtn" id="'. $row['kd_menu'] .'" val="'. $row['name_menu'] .'" data-toggle="modal" data-target="#editMenuModal">
                                    	<i class="fas fa-edit"></i>
	                                </a>
	                                <a href="#" title="Hapus menu" class="btn btn-danger delMenuBtn" id="'. $row['kd_menu'] .'" val="'. $row['name_menu'] .'">
                                    	<i class="fas fa-trash"></i>
	                                </a>
                                </td>
                        	</tr>';
			}
			echo $output;
		}
	}

	public function storeAddMenu() {
		// print_r($_POST);
		// var_dump($_FILES);	
		$data = $this->Dashboard->getDataById('menu', 'kd_menu', $_POST['menuCode']);
		if ($_POST['menuCode'] == $data['kd_menu']) {
			Flasher::setFlash('danger', 'Kode menu telah dipakai');
			Flasher::flash();
		} else {
			$file_tmp = $_FILES['menuPhoto']['tmp_name'];
			$new_image = $_FILES['menuPhoto']['name']; 
			move_uploaded_file($file_tmp, 'assets/uploads/'. $new_image);
			$this->Dashboard->addMenu($_POST, $new_image);
			Flasher::setFlash('success', 'Menu '. ucfirst($_POST['menuName']).' berhasil ditambahkan');
			Flasher::flash();
		}
	}

	public function loadEditMenu() {
		// print_r($_POST);
    	$data = $this->Dashboard->getDataById('menu', 'kd_menu', $_POST['editMenuId']);
    	// print_r($data);
    	echo json_encode($data);
	}

	public function storeUpdateMenu() {
		// print_r($_POST);
		// print_r($_FILES);	
		
		$file_tmp = $_FILES['menuPhotoEdit']['tmp_name'];
	    $old_image = $_POST['oldMenuPhoto'];
	    $new_image = $_FILES['menuPhotoEdit']['name'];  
	    if(isset($_FILES['menuPhotoEdit']['name']) &&  $_FILES['menuPhotoEdit']['name'] != '') {
	        move_uploaded_file($file_tmp, 'assets/uploads/'. $new_image);

	        if ($old_image != null) {
	            unlink('assets/uploads/'. $old_image);
	        }
	    } else {
	        $new_image = $old_image;
	    }
	    
		$this->Dashboard->updateMenu($_POST, $new_image);
		
		Flasher::setFlash('success', 'Menu '. ucfirst($_POST['menuNameEdit']).' berhasil diperbaharui');
		Flasher::flash();
	}

	public function deleteMenu() {
		// print_r($_POST);
		$this->Dashboard->deleteById('menu', 'kd_menu', $_POST['deletedId']);
		Flasher::setFlash('danger', 'Menu '. $_POST['deletedName'] .' berhasil dihapus permanen');
		Flasher::flash();
	}


	public function storeAddMeja() {
		// print_r($_POST);
		$data = $this->Dashboard->getDataById('meja', 'no_meja', $_POST['no_meja']);
		if ($_POST['no_meja'] == $data['no_meja']) {
			Flasher::setFlash('danger', 'Meja '. $_POST['no_meja'] .' sudah ada');
			Flasher::flash();
		} else {
			$this->Dashboard->addMeja($_POST);
			Flasher::setFlash('success', 'Meja '. $_POST['no_meja'] .' telah ditambahkan');
			Flasher::flash();
		}
	}

	public function deleteMeja() {
		// print_r($_POST);
		$data = $this->Dashboard->getDataById('meja', 'no_meja', $_POST['no_meja']);
		if (!$data) {
				Flasher::setFlash('warning', 'Meja '. $_POST['no_meja'] .' tidak ada');
				Flasher::flash();
				
		} elseif ($data['status'] == 'active') {
			Flasher::setFlash('warning', 'Meja '. $_POST['no_meja'] .' sedang aktif');
			Flasher::flash();

		} else {
			$this->Dashboard->deleteById('meja', 'no_meja', $_POST['no_meja']);
			Flasher::setFlash('danger', 'Meja '. $_POST['no_meja'] .' berhasil dihapus permanen');
			Flasher::flash();
		}
		
	}

	public function loadOrder() {
		$data = $this->Dashboard->getAllOrdersById($_POST['orderId']);
		echo json_encode($data);
	}

	public function changeStatus() {
		if (isset($_POST['blumOrderId'])) {
			$this->Dashboard->updateStatusById($_POST['blumOrderId'], 'belum');
		} elseif (isset($_POST['selOrderId'])) {
			$this->Dashboard->updateStatusById($_POST['selOrderId'], 'selesai');
		}
		
		Flasher::setFlash('success', 'Status berhasil diperbaharui');
		Flasher::flash();
	}

	public function deactiveTable() {
		$this->Dashboard->deactiveTableById($_POST['tableId']);
		Flasher::setFlash('success', 'Meja berhasil di nonaktifkan');
		Flasher::flash();
	}

	public function getAllOrder() {
		$data = $this->Dashboard->getAllMeja();
		echo json_encode($data);
	}

	public function loadtransForm() {
		$data = $this->Dashboard->getAllMejaById($_POST['byrId']);
		echo json_encode($data);
	}

	public function storeTrans() {
		
		$_POST['total'] = (integer) str_replace(',', '', substr($_POST['total'], 0, -3));
		$_POST['tunai'] = (integer) str_replace(',', '', substr($_POST['tunai'], 0, -3));
		$_POST['kembalian'] = (integer) str_replace(',', '', substr($_POST['kembalian'], 0, -3));
		if ($_POST['tunai'] < $_POST['total']) {
			Flasher::setFlash('danger', 'Uang masih kurang');
			Flasher::flash();
		} else {
			$this->Dashboard->addTransaksi($_POST);
			$this->Dashboard->deleteById('orders', 'meja_id', $_POST['mejaId']);
			$this->Dashboard->deactiveTableById($_POST['mejaId']);
			Flasher::setFlash('success', 'Transaksi berhasil');
			Flasher::flash();
		}
	}


}

?>


