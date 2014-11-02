<?php

class Mauthor extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        // Nạp thư viện hỗ trợ tạo file view
        $this->load->helper("tz_helper");
        // Nạp thư viện layout
        $this->load->library("Tz_layout");
        $this->tz_layout->setLayout("layout/ad_layout_one");

    }

    public function index() {
    	$this->tz_layout->view("author/index");
    }
    public function newAuthor() {
    	$this->tz_layout->view("author/new_author");
    }

}
