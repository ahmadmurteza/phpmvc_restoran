<?php 

class User_model {
	private $table = 'test';
	private $db;

	public function __construct() {
		$this->db = new Database;
	}

	public function getAllData($table) {
		$this->db->query("SELECT * FROM $table");
		return $this->db->resultAll();
	}
}

 ?>