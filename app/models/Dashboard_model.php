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
				INNER JOIN roles ON users.rid = roles.rid
		 		WHERE deleted = :val";
 		$this->db->query($sql);
        $this->db->bind('val', $val);
        
        return $this->db->resultAll();
	}

	//  mengambil semua data 
	public function getAllData($table) {
		$sql = "SELECT * FROM $table";
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

	// mengambil data kategori sesuai id
	public function getDataById($table, $field, $id) {
		$sql = "SELECT * FROM $table
              	WHERE $field = :id";
 		$this->db->query($sql);
        $this->db->bind('id', $id);
        
        return $this->db->single();
	}

	// delete permanenen apapun sesuai table dan id
	public function deleteById($table, $field, $id) {
		$sql = "DELETE FROM $table WHERE $field = :id";
		$this->db->query($sql);
        $this->db->bind('id', $id);
        $this->db->execute();
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
		$sql = "UPDATE users INNER JOIN roles ON users.rid = roles.rid SET name = :name, email = :email, role = :role WHERE id = :id";
		$this->db->query($sql);
        $this->db->bind('name', $data['name']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('role', $data['role']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();
	}

	// add data kategori
	public function addCategory($data, $newImage) {
		$sql = "INSERT INTO kategori (kd_kategori, name_kategori, description, photo)
				VALUES (:kd_kategori, :name_kategori, :description, :photo);";
		$this->db->query($sql);
        $this->db->bind('kd_kategori', $data['kodeCat']);
        $this->db->bind('name_kategori', $data['catName']);
        $this->db->bind('description', $data['catDescription']);
        $this->db->bind('photo', $newImage);
        $this->db->execute();
	}

	// update data Kategori
	public function updateCategory($data, $newImage) {
		$sql = "UPDATE kategori SET name_kategori = :name_kategori, description = :description, photo = :photo WHERE kd_kategori = :kd_kategori";
		$this->db->query($sql);
        $this->db->bind('kd_kategori', $data['editKodeCat']);
        $this->db->bind('name_kategori', $data['editCatName']);
        $this->db->bind('description', $data['editCatDescription']);
        $this->db->bind('photo', $newImage);
        $this->db->execute();
	}

	// add data kategori
	public function addMenu($data, $newImage) {
		$sql = "INSERT INTO menu (kd_menu, name_menu, kategori_id, harga, description, status, photo)
				VALUES (:kd_menu, :name_menu, :kategori_id, :harga, :description, :status, :photo);";
		$this->db->query($sql);
        $this->db->bind('kd_menu', $data['menuCode']);
        $this->db->bind('name_menu', $data['menuName']);
        $this->db->bind('kategori_id', $data['menuCat']);
        $this->db->bind('harga', $data['price']);
        $this->db->bind('description', $data['menuDescription']);
        $this->db->bind('status', $data['menuStats']);
        $this->db->bind('photo', $newImage);
        $this->db->execute();
	}

	// update data Menu
	public function updateMenu($data, $newImage) {
		$sql = "UPDATE menu SET name_menu = :name_menu, kategori_id = :kategori_id, harga = :harga, description = :description, status = :status, photo = :photo WHERE kd_menu = :kd_menu";
		$this->db->query($sql);
        $this->db->bind('kd_menu', $data['menuCodeEdit']);
        $this->db->bind('name_menu', $data['menuNameEdit']);
        $this->db->bind('kategori_id', $data['menuCatEdit']);
        $this->db->bind('harga', $data['priceEdit']);
        $this->db->bind('description', $data['menuDescriptionEdit']);
        $this->db->bind('status', $data['menuStatsEdit']);
        $this->db->bind('photo', $newImage);
        $this->db->execute();
	}
}

 ?>