<?php

class Mcomic extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        // Nạp thư viện hỗ trợ tạo file view
        $this->load->helper("tz_helper");
        // Nạp thư viện layout
        $this->load->library("Tz_layout");
        $this->tz_layout->setLayout("layout/ad_layout_one");

        $this->load->Model('ComicModel');
        $this->load->Model('AuthorModel');
        $this->load->Model('CategoryModel');
        $this->load->Model('ChapterModel');
        $this->load->Model('PublisherModel');
        $this->load->Model('TypeModel');
        $this->load->Model('KindModel');
        $this->load->Model('DataStoreModel');
    }

    public function showAll() {
        $model["lstComic"]=  ComicModel::getAll();
        $this->tz_layout->view("comic/show_all",$model);
    }

    public function edit($id_comic) {
        $model["model"]=  ComicModel::getById($id_comic)[0];
        $model["lstAuthor"]=  AuthorModel::getAll();
        $model["lstType"]=  TypeModel::getAll();
        $model["lstKind"]=  KindModel::getAll();
        $this->tz_layout->view("comic/edit",$model);
    }

    public function editChapter($id_chapter) {
        $model["model"]=  ChapterModel::getById($id_chapter)[0];
        $this->tz_layout->view("comic/edit_chapter",$model);
    }
    
    public function editChapterTwo($id_chapter) {
        $model["model"]=  ChapterModel::getById($id_chapter)[0];
    	$this->tz_layout->view("comic/edit_chapter_two",$model);
    }

    public function newComic() {
        $model["lstAuthor"]=  AuthorModel::getAll();
        $model["lstType"]=  TypeModel::getAll();
        $model["lstKind"]=  KindModel::getAll();
        $this->tz_layout->view("comic/new_comic",$model);
    }

    public function newChapter() {
        $this->tz_layout->view("comic/new_chapter");
    }
    
    public function allChapter($id_comic) {
    	$model["model"]=  ComicModel::getById($id_comic)[0];
    	$model["lstAuthor"]=  AuthorModel::getAll();
    	$model["lstType"]=  TypeModel::getAll();
    	$model["lstKind"]=  KindModel::getAll();
    	$this->tz_layout->view("comic/show_all_chapter",$model);
    }

}
