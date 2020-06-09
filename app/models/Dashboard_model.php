<?php 

class Dashboard_model {
	private $table = '';
	private $db;

	public function __construct() {
		$this->db = new Database;
	}
	
	public function getCurrentUser($email) {
		$sql = "SELECT * FROM users WHERE email = :email";
        $this->db->query($sql);
        $this->db->bind('email', $email);
        $this->db->execute();
        
        return $this->db->single();
	}
}

 ?>