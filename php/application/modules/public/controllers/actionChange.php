<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class actionChange extends MX_Controller {

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
        $this->load->Model('DataStoreModel');
    }

    public function changeSelectChapter() {
        $id_comic = "";
        $id_chapter = "";
        if (isset($_REQUEST["id_comic"])) {
            $id_comic = $_REQUEST["id_comic"];
        }
        if (isset($_REQUEST["id_chapter"])) {
            $id_chapter = $_REQUEST["id_chapter"];
        }
        
        $infoChapter = ChapterModel::getById($id_chapter)[0];
        if (isset($_REQUEST["btn"])) {
            $action = $_REQUEST["btn"];
            if ($action == "f") {
                $id_chapter = ChapterModel::getByIdComicAndNo($infoChapter["id_comic"], $infoChapter["No"] - 1)[0]["id"];
            } else if ($action == "l") {
                $id_chapter = ChapterModel::getByIdComicAndNo($infoChapter["id_comic"], $infoChapter["No"] + 1)[0]["id"];
            }
        }
        echo '<option value="' . $id_chapter . '">' . (ChapterModel::getById($id_chapter)[0]["chapter_name"]) . '</option>';
        $lstChapter = ChapterModel::getByComicId($id_comic);
        for ($i = 0; $i < sizeof($lstChapter); $i++) {
            echo '<option value=' . $lstChapter[$i]["id"] . '>' . $lstChapter[$i]["chapter_name"] . '</option>';
        }
    }

    public function reviewComic() {
        $ip = $_REQUEST["ip"];
        $id_comic = $_REQUEST["idComic"];
        $point = $_REQUEST["point"];

        $check = ReviewModel::checkReview($id_comic, $ip);
        if ($check) {
            echo '<script>alert("Xin lỗi! Bạn chỉ có thể đánh giá truyện một lần! xin cám ơn!");</script>';
            return;
        }
        
        $reviewModel = array(
            "ip" => $ip,
            "id_comic" => $id_comic,
            "reviews_point" => $point
        );
        ReviewModel::insert($reviewModel);
        
        $lstReview=ReviewModel::getByComicId($id_comic);
        $total=0;
        foreach ($lstReview as $info){
            $total+=$info["reviews_point"];
        }
        $average=$total/(sizeof($lstReview));
        $objComic=array(
            "review_average"=>$average,
        );
        ComicModel::updateReview($objComic,$id_comic);
    }

}

?>