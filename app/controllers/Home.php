<?php 

class Home extends Controller {
	public function index() {
		$data['judul'] = 'Home';
		$data['user'] = 'Teza';
		$data['database'] = $this->model('User_model')->getAllData('test');
		$this->view('templates/header', $data);
		$this->view('home/index', $data);
		$this->view('templates/footer');
	}
}

?>