<?php
class Comic extends MX_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper("url");
		// Nạp thư viện hỗ trợ tạo file view
		$this->load->helper("tz_helper");
		// Nạp thư viện layout
		$this->load->library("Tz_layout"); 
		$this->tz_layout->setLayout("layout/layout_two");
	}
	
	public function index(){
			
		$this->tz_layout->view("comic/index");
	}
	
	public function reading(){
		$this->tz_layout->setLayout("layout/layout_reading");
		$this->tz_layout->view("comic/reading_two");
	}
	
	public function search(){
		$this->tz_layout->view("comic/search");
	}
}