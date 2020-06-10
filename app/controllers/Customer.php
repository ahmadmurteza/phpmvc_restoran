<?php 

class Customer extends Controller {

	public $customer;

	public function __construct() {
		$this->model('Customer_model');
		$this->customer = new Customer_model;
	}

	public function index() {

		$this->view('customer/index');
	}

	
}

?>