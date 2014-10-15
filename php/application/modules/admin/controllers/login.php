<?php
class Login extends MX_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper("url");
		// Nạp thư viện hỗ trợ tạo file view
		$this->load->helper("tz_helper");
		// Nạp thư viện layout
		$this->load->library("Tz_layout"); 
		
	}
	
	public function index(){
		$this->tz_layout->setLayout("layout/login_layout");
		$this->tz_layout->view("login/index");
	}
}