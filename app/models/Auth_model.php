<?php 

class Auth_model {
	private $table = 'users';
	private $db;

	public function __construct() {
		$this->db = new Database;
	}

	// memasukan data register
	public function register($data) {
		$hpassword = password_hash($data['password'], PASSWORD_DEFAULT);
		$query = "INSERT INTO users(rid, name, email, password, phone, gender, dob)
				VALUES(6, :name, :email, :password, :phone, :gender, :dob)";

		$this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', $hpassword);
        $this->db->bind('phone', $data['phone']);
        $this->db->bind('gender', $data['gender']);
        $this->db->bind('dob', $data['dob']);
        
		$this->db->execute();

        return $this->db->rowCount();
	}

	// mencek email sudah ada atau belum
	public function userExist($email) {
		$sql = "SELECT email FROM users WHERE email = :email";
        $this->db->query($sql);
        $this->db->bind('email', $email);
        $this->db->execute();
        
        return $this->db->single();
	}

	// check login dengan email
	public function checkLogin($email) {
		$sql = "SELECT email, password FROM users WHERE email = :email AND deleted != 0 AND verified = 1";
		$this->db->query($sql);
        $this->db->bind('email', $email);
        $this->db->execute();
        
        return $this->db->single();
	}

	// mengambil data meja
	public function getCustomerTable() {
		$sql = "SELECT id, no_meja, status FROM meja";
		$this->db->query($sql);
        $this->db->execute();
        
        return $this->db->resultAll();
	}

	// mengubah status di table meja 
	public function activatedMeja($nama, $no_meja) {
		$sql = "UPDATE meja SET nama = :nama, status = :status WHERE no_meja = :no_meja";
		$this->db->query($sql);
        $this->db->bind('nama', $nama);
        $this->db->bind('status', 'active');
        $this->db->bind('no_meja', $no_meja);
        $this->db->execute();
	}
}

 ?>