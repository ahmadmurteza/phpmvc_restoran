<?php 

class Customer_model {
	private $db;

	public function __construct() {
		$this->db = new Database;
	}

	//  mengambil semua data 
	public function getAllData($table) {
		$sql = "SELECT * FROM $table";
 		$this->db->query($sql);
        
        return $this->db->resultAll();
	}

	// mengambil semua data kategori sesuai id
	public function getMenuById($id) {
		$sql = "SELECT * FROM menu
              	WHERE kategori_id = :id";
 		$this->db->query($sql);
        $this->db->bind('id', $id);
        
        return $this->db->resultAll();
	}

	// mengambil semua data sesuai kolom
	public function getSingleDataById($table, $field, $id) {
		$sql = "SELECT * FROM $table WHERE $field = :id";
 		$this->db->query($sql);
		$this->db->bind('id', $id);
        
        return $this->db->single();
	}

	// mengambil semua data sesuai kolom
	public function getAllDataById($table, $field, $id) {
		$sql = "SELECT * FROM $table WHERE $field = :id";
 		$this->db->query($sql);
		$this->db->bind('id', $id);
        
        return $this->db->resultAll();
	}

	// menghitung jumlah data sesuai table dan kolom
	public function countAllDataById($table, $field, $id) {
		$sql = "SELECT count(*) FROM $table WHERE $field = :id";
 		$this->db->query($sql);
		$this->db->bind('id', $id);
        
        return $this->db->rowCount();
	}

	// mengambil data join dari table orders 
	public function getAllOrdersById($id) {
		$sql = "SELECT orders.id_order, orders.jumlah, menu.name_menu, menu.photo, menu.harga
				FROM orders 
				INNER JOIN menu
				ON orders.menu_kd=menu.kd_menu
				WHERE meja_id = :id";
 		$this->db->query($sql);
		$this->db->bind('id', $id);
        
        return $this->db->resultAll();
	}

	// memasukan data ke table order
	public function insertDataOrder($data) {
        $sql = "INSERT INTO orders (meja_id, menu_kd, jumlah, status) VALUES (:meja_id, :menu_kd, :jumlah, :status)";
		$this->db->query($sql);
		$this->db->bind('meja_id', $data['mejaId']);
        $this->db->bind('menu_kd', $data['menuKd']);
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->bind('status', 'belum');
		$this->db->execute();
	}

	// menghapus data sesuai id dan field
	public function cancelOrderById($table, $field, $id) {
		$sql = "DELETE FROM $table WHERE $field = :id";
 		$this->db->query($sql);
		$this->db->bind('id', $id);
		$this->db->execute();
	}

}

 ?>