<?php 

class Dashboard_model {
	private $table = '';
	private $db;

	public function __construct() {
		$this->db = new Database;
	}
	
	// mengambil semua data user saat ini
	public function getCurrentUser($email) {
		$sql = "SELECT * FROM users 
				INNER JOIN roles
              	ON users.rid = roles.rid
		 		WHERE email = :email";
        $this->db->query($sql);
        $this->db->bind('email', $email);
        
        return $this->db->single();
	}

	// mengambil semua data users
	public function getAllUsers($val) {
		$sql = "SELECT * FROM users 
				INNER JOIN roles
              	ON users.rid = roles.rid
		 		WHERE deleted = :val";
 		$this->db->query($sql);
        $this->db->bind('val', $val);
        
        return $this->db->resultAll();
	}

	// mengambil semua data role
	public function getAllRoles() {
		$sql = "SELECT * FROM roles";
 		$this->db->query($sql);
        
        return $this->db->resultAll();
	}

	// mengambil semua data users
	public function getUserById($id) {
		$sql = "SELECT * FROM users 
				INNER JOIN roles
              	ON users.rid = roles.rid 
              	WHERE id = :id";
 		$this->db->query($sql);
        $this->db->bind('id', $id);
        
        return $this->db->single();
	}


	// memverifikasi data
	public function verifiedUser($status, $id) {
		$sql = "UPDATE users SET verified = :status WHERE id = :id AND deleted != 0";
		$this->db->query($sql);
        $this->db->bind('status', $status);
        $this->db->bind('id', $id);
        $this->db->execute();
	}

	// delete data sementara dan restore
	public function deleteRestore($status,  $id) {
		$sql = "UPDATE users SET deleted = :status, verified = 0 WHERE id = :id";
		$this->db->query($sql);
        $this->db->bind('status', $status);
        $this->db->bind('id', $id);
        $this->db->execute();
	}

	// delete data permanen
	public function deletePermanent($id) {
		$sql = "DELETE FROM users WHERE id = :id";
		$this->db->query($sql);
        $this->db->bind('id', $id);
        $this->db->execute();
	}

	// update data user
	public function updateUser($data) {
		$sql = "UPDATE users SET name = :name, email = :email, role = :role WHERE id = :id";
		$this->db->query($sql);
        $this->db->bind('status', $status);
        $this->db->bind('id', $id);
        $this->db->execute();
	}

}

 ?>