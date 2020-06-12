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
		$data['title'] = 'Dashboard';
		$this->view('templates/worker_template/header', $data);
		$this->view('templates/worker_template/sidebar', $data);
		$this->view('worker/index', $data);
		$this->view('templates/worker_template/footer');
	}

	public function worker() {
		$email = $_SESSION['user'];
		$data['user'] = $this->Dashboard->getCurrentUser($email); // mengambil data user saat ini
		$data['worker'] = $this->Dashboard->getAllRoles(); // mengambil data pekerja
		$data['title'] = 'Worker';
		$this->view('templates/worker_template/header', $data);
		$this->view('templates/worker_template/sidebar', $data);
		$this->view('worker/worker', $data);
		$this->view('templates/worker_template/footer');
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
					if ($row['verified'] == 1) {
						$row['verified'] = '<span class="badge badge-secondary">Terverifikasi</span>';
					} else {
						$row['verified'] = '<a href="" class="btn btn-primary verifiedBtn" id="'. $row['id'] .'" val="'. $row['name'] .'">Verfikasi</a>';
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
					
					case 'waiter':
						$row['role'] = '<span class="badge badge-warning">Waiter</span>';
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
						'button' => 'text-success editBtn',
						'title' => 'Edit pekerja',
						'icon' => 'fa-edit',
						'modal' => 'data-toggle="modal" data-target="#editModal"'
					];

					$action2 = [
						'button' => 'text-warning deleteBtn',
						'title' => 'Hapus pekerja ',
						'icon' => 'fa-trash'
					];

				} else {

					$action1 = [
						'button' => 'text-dark restoreBtn',
						'title' => 'Restore pekerja',
						'icon' => 'fa-trash-restore',
						'modal' => ''
					];

					$action2 = [
						'button' => 'text-danger prmntDeleteBtn',
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
	                            <td class="text-center">
	                                <a href="#" title="'. $action1['title'] .'" class="'. $action1['button'] .'" id="'. $row['id'] .'" '. $action1['modal'] .' style="text-decoration: none" val="'. $row['name'] .'">
	                                    <i class="fas '. $action1['icon'] .' fa-lg"></i>&nbsp;
	                                </a>';

	            if ( $row['role'] != $admin ) {
	            	$output .= '
            					<a href="#" title="'. $action2['title'] .'" class="'. $action2['button'] .'" id="'. $row['id'] .'" val="'. $row['name'] .'" style="text-decoration: none">
                                    <i class="fas '. $action2['icon'] .' fa-lg"></i>&nbsp;
                                </a>';
	            }

	            $output .= 		'</td>
                        	</tr>';
			}
			echo $output;
		}
	}


	public function verified() {
		// print_r($_POST);
		$this->Dashboard->verifiedUser(1, $_POST['verifiedId']);
		Flasher::setFlash('success', ucfirst($_POST['verifiedName']).' berhasil diverifikasi');
		Flasher::flash();
	}

	public function softDeleteRestore() {
		// print_r($_POST);
		if ( isset($_POST['action']) && $_POST['action'] == 'deleteUser' ) {
			$this->Dashboard->deleteRestore(0, $_POST['deletedId']);
			Flasher::setFlash('warning', ucfirst($_POST['deletedName']).' berhasil dihapus (data dipindahkan ke user yang dihapus)');
			Flasher::flash();
		} else {
			// print_r($_POST);
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
		// print_r($_POST);
    	$data = $this->Dashboard->getUserById($_POST['editId']);
    	// print_r($data);
    	echo json_encode($data);
	}

	public function storeUpdateUser() {
		// print_r($_POST);
		$this->Dashboard->updateUser($_POST);
		Flasher::setFlash('danger', ucfirst($_POST['name']).' berhasil dihapus permanen');
		Flasher::flash();
	}
}

?>

