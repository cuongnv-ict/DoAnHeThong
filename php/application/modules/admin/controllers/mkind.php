<?php

class Mkind extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        // Nạp thư viện hỗ trợ tạo file view
        $this->load->helper("tz_helper");
        // Nạp thư viện layout
        $this->load->library("Tz_layout");
        $this->tz_layout->setLayout("layout/ad_layout_one");
        $this->load->Model('CategoryModel');
        $this->load->Model('KindModel');
        $this->load->Model('TypeModel');
    }

    public function index() {
        $model["lstCategory"]=  CategoryModel::getAll();
        $this->tz_layout->view("kind/index",$model);
    }

    public function newKind() {
        $this->tz_layout->view("kind/new_kind");
    }

}
