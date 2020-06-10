<?php 

class Dashboard_model {
	private $table = '';
	private $db;

	public function __construct() {
		$this->db = new Database;
	}
	
	public function getCurrentUser($email) {
		$sql = "SELECT * FROM users 
				INNER JOIN roles
              	ON users.rid = roles.id
		 		WHERE email = :email";
        $this->db->query($sql);
        $this->db->bind('email', $email);
        
        return $this->db->single();
	}
}

 ?>