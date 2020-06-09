<?php 

class Auth extends Controller {

	public $auth;

	public function __construct() {
		$this->model('Auth_model');
		$this->auth = new Auth_model;
	}

	public function index() {
		$this->view('Auth/index');
	}

	public function login() {
		$this->view('Auth/login');
	}

	public function register() {
		$this->view('Auth/register');
	}

	public function forgot() {
		$this->view('Auth/forgot');
	}

	// mengontrol registrasi
	public function storeRegister() {
		if ($this->auth->userExist($_POST['email'])) {
			Flasher::setFlash('danger', 'Email sudah ada');
			Flasher::flash();
		} else {
			if ($this->auth->register($_POST)) {
				echo "register";
			} else {
				Flasher::setFlash('danger', 'Ada yang salah di register, hubungi admin');
				Flasher::flash();
			}
		}
	}

	// mengontrol login
	public function storeLogin(){
		$checkedLogin = $this->auth->checkLogin($_POST['email']);
		if ($checkedLogin != null) {
			if (password_verify($_POST['password'], $checkedLogin['password'])) {
				if ( !empty($_POST['remember']) ) {
					setcookie("email", $_POST['email'], time()+(30*24*60*60), '/');
					setcookie("password", $_POST['password'], time()+(30*24*60*60), '/');
				} else {
					setcookie('email', '', 1, '/');
					setcookie('password', '', 1, '/');
				}
				$_SESSION['user'] = $_POST['email'];
				echo 'login';
			} else {
				Flasher::setFlash('danger', 'Password salah');
				Flasher::flash();
			}
			
		} else {
			Flasher::setFlash('danger', 'Email belum terdaftar');
			Flasher::flash();
		}
	}

	// mengontrol logout
	public function logout() {
		unset($_SESSION['user']);
		header('location: '. BASEURL .'Dashboard/index');
	}
}

?>