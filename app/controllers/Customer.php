<?php 

class Customer extends Controller {

	public $Customer;

	public function __construct() {
		$this->model('Customer_model');
		$this->Customer = new Customer_model;
	}

	public function index() {
		$data['title'] = 'Order';
		$data['kategori'] = $this->Customer->getAllData('kategori');
		$data['customer'] = $this->Customer->getSingleDataById('meja', 'id', $_SESSION['customer']);
		$this->view('templates/customer_template/header', $data);
		$this->view('customer/index', $data);
		$this->view('templates/customer_template/footer', $data);
	}

	public function menu($id) {
		$data['title'] = 'Menu';
		$data['menu'] = $this->Customer->getMenuById($id);
		$data['customer'] = $this->Customer->getSingleDataById('meja', 'id', $_SESSION['customer']);
		$this->view('templates/customer_template/header', $data);
		$this->view('customer/menu', $data);
		$this->view('templates/customer_template/footer', $data);
	}

	public function storeOrder() {
		$this->Customer->insertDataOrder($_POST);
		$this->Customer->updateMenuAdd($_POST['jumlah'], $_POST['menuKd']);
		Flasher::setFlash('success', 'Berhasil ditambahkan ke order');
		Flasher::flash();
	}

	public function loadOrder() {
		$data = $this->Customer->getAllOrdersById($_POST['orderId']);
		echo json_encode($data);
	}

	public function cancelOrder() {
		$this->Customer->cancelOrderById('orders', 'id_order', $_POST['cancelId']);
		$this->Customer->updateMenuMin($_POST['juml'], $_POST['kdMenu']);
		Flasher::setFlash('danger', 'Order '. $_POST['cancelName'] .' dibatalkan');
		Flasher::flash();
	}

}

?>