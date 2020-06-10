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

	


}

?>