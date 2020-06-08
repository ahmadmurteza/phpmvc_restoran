<?php 

class App {

	protected $controller = 'Auth';
	protected $method = 'index';
	protected $params = [];

	public function __construct() {
		$url = $this->parseURL();
		
		// controllers
		if ( file_exists('../app/controllers/'. $url[0] . '.php') ) {
			$this->controller = $url[0]; //mengubah variabel global $this->controller menjadi array $url ke 0
			unset($url[0]); //mengunset $url 0
		}

		include '../app/controllers/'. $this->controller . '.php'; //menginclude file controller
		$this->controller = new $this->controller; //menginstasisai objek this->controller

		//method
		if ( isset($url[1]) ) {
			if ( method_exists($this->controller, $url[1]) ) { //jika method didalam objek ada maka
				$this->method = $url[1]; 
				unset($url[1]);
			}
		}

		//params
		if ( !empty($url) ) {
			$this->params = array_values($url);
		}

		//menjalankan controller & method dan params 
		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	public function parseURL() {
		if ( isset($_GET['url']) ) { //jika url ada maka
			$url = rtrim($_GET['url'], '/'); //rtrim menghapus karakter palingkanan sesuai parameter kedua
			$url = filter_var($url, FILTER_SANITIZE_URL); 
			$url = explode('/', $url); //mengubah string menjadi array
			return $url; //kembalikan variabel url
		}
	}

}

?>