<?php

class Comic extends MX_Controller {

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
        $this->load->Model('KindModel');
        $this->load->Model('ReviewModel');
        $this->load->Model('DataStoreModel');
    }

    public function index($id) {
        $info = ComicModel::getById($id);
        $objModel=array(
            "number_viewers"=>ComicModel::getById($id)[0]["number_viewers"]+1
        );
        ComicModel::update($objModel,$id);
        $model['model'] = $info;
        $this->tz_layout->view("comic/index", $model);
    }

    public function reading() {
        $this->tz_layout->setLayout("layout/layout_reading");
        $this->tz_layout->view("comic/reading_two");
    }

    public function readingone($id_comic, $id_chapter) {
        if ($id_chapter == 0) {
            $id_chapter = $_GET["select_chapter"];
        }
        $info_comic = DataStoreModel::getByChapterId($id_chapter);
        $model["id_comic"] = $id_comic;
        $model["id_chapter"] = $id_chapter;
        $model["lstDataStore"] = $info_comic;
        $this->tz_layout->setLayout("layout/layout_reading");
        $this->tz_layout->view("comic/reading_one", $model);
    }

    public function search() {
        $this->tz_layout->view("comic/search");
    }

    public function changeContent() {
        $id_chapter = $_REQUEST["id_chapter"];
        $infoChapter = ChapterModel::getById($id_chapter)[0];
        if (isset($_REQUEST["btn"])) {
            $action = $_REQUEST["btn"];
            if ($action == "f") {
                $id_chapter = ChapterModel::getByIdComicAndNo($infoChapter["id_comic"], $infoChapter["No"] - 1)[0]["id"];
            } else if ($action == "l") {
                $id_chapter = ChapterModel::getByIdComicAndNo($infoChapter["id_comic"], $infoChapter["No"] + 1)[0]["id"];
            }
        }

        $lstDataStore = DataStoreModel::getByChapterId($id_chapter);

        for ($i = 0; $i < sizeof($lstDataStore); $i++) {
            $url = base_url() . 'application/' . $lstDataStore[$i]["url_store"];
            $file = fopen($url, 'r');
            while (!feof($file)) {
                echo fgets($file) . "<br>";
            }
        }
    }

    public function showAllChapter() {
        $id_comic = $_REQUEST["id_comic"];
        $lstChapter = ChapterModel::getByComicId($id_comic);
        for ($i = 0; $i < sizeof($lstChapter); $i++) {
            echo '<li><a href="' . base_url() . 'index.php/public/comic/readingone/' . $id_comic . '/' . $lstChapter[$i]["id"] . '">' . $lstChapter[$i]["chapter_name"] . '</a></li>';
        }
    }

}
