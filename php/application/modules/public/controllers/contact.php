<?php

class Contact extends MX_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper("url");
		// Nạp thư viện hỗ trợ tạo file view
		$this->load->helper("tz_helper");
		// Nạp thư viện layout
		$this->load->library("Tz_layout");
		$this->tz_layout->setLayout("layout/layout_two");
		$this->load->Model('ComicModel');
		$this->load->Model('AuthorModel');
		$this->load->Model('CategoryModel');
		$this->load->Model('ChapterModel');
		$this->load->Model('PublisherModel');
		$this->load->Model('TypeModel');
		$this->load->Model('ReviewModel');
		$this->load->Model('KindModel');
	}

	public function index() {
		$this->tz_layout->view("contact/index");
	}

}
