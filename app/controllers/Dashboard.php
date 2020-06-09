<?php 
class Dashboard extends Controller {

	public $Dashboard;

	public function __construct() {
		$this->model('Dashboard_model');
		$this->Dashboard = new Dashboard_model;
	}

	public function index() {
		$email = $_SESSION['user'];
		$data = $this->Dashboard->getCurrentUser($email); // mengambil data user saat ini

		$this->view('worker/index', $data);
	}

	


}

?>