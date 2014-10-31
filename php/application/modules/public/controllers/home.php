<?php

class Home extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        // Nạp thư viện hỗ trợ tạo file view
        $this->load->helper("tz_helper");
        // Nạp thư viện layout
        $this->load->library("Tz_layout");
        $this->tz_layout->setLayout("layout/layout_one");
        $this->load->Model('ComicModel');
        $this->load->Model('AuthorModel');
        $this->load->Model('CategoryModel');
        $this->load->Model('ChapterModel');
        $this->load->Model('PublisherModel');
        $this->load->Model('TypeModel');
        $this->load->Model('KindModel');
    }

    public function index() {
        $model["lstComicRank"] = ComicModel::getRank();
        $model["lstComicShow"] = ComicModel::getUpdateNew();
        $this->tz_layout->view("home/index", $model);
    }

    public function showToType($id_type) {
        $comicModelRank = ComicModel::getRank();
        $comicshow=  ComicModel::getByTypeId($id_type);
        $model = array(
            'lstComicRank'=>$comicModelRank,
            'lstComicShow'=>$comicshow,
        );
        $this->tz_layout->view("home/index", $model);
    }
    
    public function showToCategory($id_category){
        $comicModelRank = ComicModel::getRank();
        $comicshow=  ComicModel::getByCategoryId($id_category);
        $model = array(
            'lstComicRank'=>$comicModelRank,
            'lstComicShow'=>$comicshow,
        );
        $this->tz_layout->view("home/index", $model);
    }
    
    public function showToFirstChar($char){
        $comicModelRank = ComicModel::getRank();
        $comicshow=  ComicModel::getByFirstChar($char);
        $model = array(
            'lstComicRank'=>$comicModelRank,
            'lstComicShow'=>$comicshow,
        );
        $this->tz_layout->view("home/index", $model);
    }
}
