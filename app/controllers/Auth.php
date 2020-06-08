<?php 

class Auth extends Controller {

	public function index() {
		$this->view('Auth/index');
	}

	public function register() {
		$this->view('Auth/register');
	}

	public function forgot() {
		$this->view('Auth/forgot');
	}
}

?>