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
		$data['title'] = 'Worker';
		$this->view('templates/worker_template/header', $data);
		$this->view('templates/worker_template/sidebar', $data);
		$this->view('worker/worker', $data);
		$this->view('templates/worker_template/footer');
	}

	public function allUsers() {
		$output = '';
		$data = $this->Dashboard->getAllUsers(1);
		$no	= 1;
		if (!$data) {
			$output .= '<h3 class="text-center badge badge-primary">Data Masih Kosong</h3>';
		} else {
			foreach ($data as $row) {
				if ($row['verified'] == 1) {
					$row['verified'] = '<span class="badge badge-secondary">Terverifikasi</span>';
				} else {
					$row['verified'] = '<a href="" class="btn btn-primary">Verfikasi</a>';
				}
				switch ($row['role']) {
					case 'admin':
						$row['role'] = '<span class="badge badge-primary">Admin</span>';
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
				$output .= '<tr>
	                            <th>'. $no++ .'</th>
	                            <td>'. $row['name'] .'</td>
	                            <td>'. $row['role'] .'</td>
	                            <td>'. $row['email'] .'</td>
	                            <td>'. $row['verified'] .'</td>
	                            <td class="text-center">
	                                <a href="#" title="Edit pekerja" class="text-success editBtn" id="'. $row['id'] .'" data-toggle="modal" data-target="#editModal" style="text-decoration: none">
	                                    <i class="fas fa-edit fa-lg"></i>&nbsp;
	                                </a>
	                                <a href="#" title="Hapus Pekerja" class="text-danger deleteBtn" id="'. $row['id'] .'" style="text-decoration: none">
	                                    <i class="fas fa-trash fa-lg"></i>&nbsp;
	                                </a>
	                            </td>
	                        </tr>';
			}
		}
		
		echo $output;
	}

	public function allDeletedUsers() {
		$output = '';
		$data = $this->Dashboard->getAllUsers(0);
		$no	= 1;
		if (!$data) {
			$output .= '<h3 class="text-center badge badge-primary">Data Masih Kosong</h3>';
		} else {
			foreach ($data as $row) {
				if ($row['verified'] == 1) {
					$row['verified'] = '<span class="badge badge-secondary">Terverifikasi</span>';
				} else {
					$row['verified'] = '<a href="" class="btn btn-primary">Verfikasi</a>';
				}
				switch ($row['role']) {
					case 'admin':
						$row['role'] = '<span class="badge badge-primary">Admin</span>';
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
				$output .= '<tr>
	                            <th>'. $no++ .'</th>
	                            <td>'. $row['name'] .'</td>
	                            <td>'. $row['role'] .'</td>
	                            <td>'. $row['email'] .'</td>
	                            <td>'. $row['verified'] .'</td>
	                            <td class="text-center">
	                                <a href="#" title="Restore Pekerja" class="text-dark deleteBtn" id="'. $row['id'] .'" style="text-decoration: none">
	                                    <i class="fas fa-trash-restore-alt fa-lg"></i>&nbsp;
	                                </a>
	                            </td>
	                        </tr>';
			}
		}
		
		echo $output;
	}
}

?>

