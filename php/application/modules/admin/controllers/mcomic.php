<?php
class Mcomic extends MX_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper("url");
		// Nạp thư viện hỗ trợ tạo file view
		$this->load->helper("tz_helper");
		// Nạp thư viện layout
		$this->load->library("Tz_layout"); 
		$this->tz_layout->setLayout("layout/ad_layout_one");
	}
	
	public function showAll(){
		$this->tz_layout->view("comic/show_all");
	}
	
	public function edit(){
		$this->tz_layout->view("comic/edit");
	}
	
	public function editChapter(){
		$this->tz_layout->view("comic/edit_chapter");
	}
	
}