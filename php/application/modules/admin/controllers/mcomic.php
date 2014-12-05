<?php

class Mcomic extends MX_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->helper("url");
        // Nạp thư viện hỗ trợ tạo file view

        $this->load->helper("tz_helper");
        $this->load->library('session');
        $this->checkLogin();
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
        $this->load->Model('Mgallery');
    }

    public function showAll() {
        $model["lstComic"] = ComicModel::getAll();
        $this->tz_layout->view("comic/show_all", $model);
    }

    public function edit($id_comic) {
        $model["model"] = ComicModel::getById($id_comic)[0];
        $model["lstAuthor"] = AuthorModel::getAll();
        $model["lstType"] = TypeModel::getAll();
        $m = ComicModel::getById($id_comic)[0];
        $m = $m['id_category'];
        $m = CategoryModel::getById($m)[0];
        $model["lstKind"] = KindModel::getAllName($m['id_type']);
        $this->tz_layout->view("comic/edit", $model);
    }

    public function editChapterTwo($id_chapter) {
        $model["model"] = ChapterModel::getById($id_chapter)[0];
        $model["data_chap"] = DataStoreModel::getByChapterId($id_chapter);
        $this->tz_layout->view("comic/add_data", $model);
    }

    public function editChapterOne($id_chapter) {
        $model["model"] = ChapterModel::getById($id_chapter)[0];
        $this->tz_layout->view("comic/edit_chapter_two", $model);
    }

    public function newComic() {
        $model["lstAuthor"] = AuthorModel::getAll();
        $model["lstKind"] = KindModel::getAllName(1);
        $this->tz_layout->view("comic/new_comic", $model);
    }

    public function newChapter() {
        $this->tz_layout->view("comic/new_chapter");
    }

    public function allChapter($id_comic) {
        $model["model"] = ComicModel::getById($id_comic)[0];
        $model["lstAuthor"] = AuthorModel::getAll();
        $model["lstType"] = TypeModel::getAll();
        $model["lstKind"] = KindModel::getAll();
        $this->tz_layout->view("comic/show_all_chapter", $model);
    }

    public function addChapter($type, $id) {
        $model['id'] = $id;
        $model['type'] = $type;
        $model['model'] = ChapterModel::getById($id);
        if ($type == 1) {
            $this->tz_layout->view("comic/add_chapter_two", $model);
        } else {
            $this->tz_layout->view("comic/add_chapter", $model);
        }
    }

    public function insert() {
        if ($this->input->post("add")) {
            $name = $_POST["name"];
            $id_author = $_POST["id_author"];
            $id_type = $_POST["type"];
            $id_kind = $_POST["id_kind"];
            $text = $_POST["textArea"];
            $url = "";
            if ($name == "" || $text == "" || $_FILES["img"]["name"] == NULL) {
                echo "<script>alert('Ban chua dien du thong tin')</script>";
                $model["lstAuthor"] = AuthorModel::getAll();
                $model["lstKind"] = KindModel::getAllName(1);
                $this->tz_layout->view("comic/new_comic", $model);
            } else {
                $this->Mgallery->do_upload();
                $url = "/upload/avatar/" . $_FILES["img"]["name"];
                $comic = array(
                    "comic_name" => $name,
                    "review_average" => 0,
                    "number_viewers" => 0,
                    "summary" => $text,
                    "url_images" => $url,
                    "number_chapter" => 0,
                    "id_category" => $id_kind,
                    "id_author" => $id_author,
                );

                ComicModel::insert($comic);
                echo "<script>alert('Them thanh cong')</script>";
                $model["lstAuthor"] = AuthorModel::getAll();
                $model["lstKind"] = KindModel::getAllName(1);
                $this->tz_layout->view("comic/new_comic", $model);
            }
//            
        } else {
            $model["lstComic"] = ComicModel::getAll();
            $this->tz_layout->view("comic/show_all", $model);
        }
    }

    public function insertOne($id) {
        $name = "";
        $no = "";
        $text = "";
        if (isset($_REQUEST["name"])) {
            $name = $_REQUEST["name"];
        }
        if (isset($_REQUEST["No"])) {
            $no = $_REQUEST["No"];
        }
        if (isset($_REQUEST["text"])) {
            $text = $_REQUEST["text"];
            $text = str_replace("<p>", "", $text);
            $text = str_replace("</p>", "<br>", $text);
            
            $text = str_replace("<div>", "", $text);
            $text = str_replace("</div>", "<br>", $text);
        }
        if ($name == "" || $no == "" || $text == "") {
            echo "Bạn chưa điền đủ thông tin";
        } else {
            $chapter = array(
                "id_comic" => $id,
                "No" => $no,
                "chapter_name" => $name
            );
            $id_chapter = ChapterModel::insert($chapter);
            $name_comic = ComicModel::getById($id)[0]['comic_name'];
            $url = "upload/truyenchu/" . md5($name_comic) . "/" . $id_chapter . ".php";
            $data = array(
                "id_chapter" => $id_chapter,
                "No" => 1,
                "url_store" => $url
            );
            DataStoreModel::insert($data);
            $myfile = fopen("./application/" . $url, "w");
            fwrite($myfile, $text);
            fclose($myfile);
            echo "Lưu thành công";
        }
    }

    public function insertTwo($id) {
        $name = "";
        $no = "";
        if (isset($_REQUEST["name"])) {
            $name = $_REQUEST["name"];
        }
        if (isset($_REQUEST["No"])) {
            $no = $_REQUEST["No"];
        }

        if ($name == "" || $no == "") {
            echo "Bạn chưa điền đủ thông tin";
        } else {
            $chapter = array(
                "id_comic" => $id,
                "No" => $no,
                "chapter_name" => $name
            );
            $id_chapter = ChapterModel::insert($chapter);
            echo "Thêm thành công";
        }
    }

    public function insertData($id_chapter) {
        $url = "";
        $no = "";
        if (isset($_REQUEST["url"])) {
            $url = $_REQUEST["url"];
        }
        if (isset($_REQUEST["No"])) {
            $no = $_REQUEST["No"];
        }
        if ($url != "" && $no != "" && is_numeric($no) == true) {
            $data = array(
                "No" => $no,
                "url_store" => $url,
                "id_chapter" => $id_chapter
            );
            DataStoreModel::insert($data);
        }

        $data_chap = DataStoreModel::getByChapterId($id_chapter);
        for ($i = 0; $i < sizeof($data_chap); $i++) {
            echo '
                    <tr>
                        <td> <input type = "checkbox" name="check_data" value = "' . $data_chap[$i]['id'] . '" ></td>
                        <td>' . ($i + 1) . '</td>
                        <td><input type = "text" class = "form-control input-sm" value = "' . $data_chap[$i]['No'] . '" ></td>
                        <td><input type = "text" class = "form-control input-sm" value = "' . $data_chap[$i]['url_store'] . '"></td>
                        <td>' . $data_chap[$i]['create_time'] . '</td>
                        <td>
                            <button type = "button" class = "btn btn-success" id = "save">
                                <b>Save </b>
                            </button>
                        </td>
                    </tr>';
        }
    }

    public function deleteData($id_chapter) {
        $listData = NULL;
        if (isset($_REQUEST["list"])) {
            $listData = $_REQUEST["list"];
        }
        if ($listData != NULL) {
            foreach ($listData as $id) {
                DataStoreModel::delete($id);
            }
            $data_chap = DataStoreModel::getByChapterId($id_chapter);
            for ($i = 0; $i < sizeof($data_chap); $i++) {
                echo '
                    <tr>
                        <td> <input type = "checkbox" name="check_data" value = "' . $data_chap[$i]['id'] . '" ></td>
                        <td>' . ($i + 1) . '</td>
                        <td><input type = "text" class = "form-control input-sm" value = "' . $data_chap[$i]['No'] . '" ></td>
                        <td><input type = "text" class = "form-control input-sm" value = "' . $data_chap[$i]['url_store'] . '"></td>
                        <td>' . $data_chap[$i]['create_time'] . '</td>
                        <td>
                            <button type = "button" class = "btn btn-success" id = "save">
                                <b>Save </b>
                            </button>
                        </td>
                    </tr>';
            }
        } else {
            $data_chap = DataStoreModel::getByChapterId($id_chapter);
            for ($i = 0; $i < sizeof($data_chap); $i++) {
                echo '
                    <tr>
                        <td> <input type = "checkbox" name="check_data" value = "' . $data_chap[$i]['id'] . '" ></td>
                        <td>' . ($i + 1) . '</td>
                        <td><input type = "text" class = "form-control input-sm" value = "' . $data_chap[$i]['No'] . '" ></td>
                        <td><input type = "text" class = "form-control input-sm" value = "' . $data_chap[$i]['url_store'] . '"></td>
                        <td>' . $data_chap[$i]['create_time'] . '</td>
                        <td>
                            <button type = "button" class = "btn btn-success" id = "save">
                                <b>Save </b>
                            </button>
                        </td>
                    </tr>';
            }
        }
    }

    public function updateData($id_chapter) {
        $arrNo = NULL;
        $arrUrl = NULL;
        $arrId = NULL;
        if (isset($_REQUEST["arrNo"])) {
            $arrNo = $_REQUEST["arrNo"];
        }
        if (isset($_REQUEST["arrUrl"])) {
            $arrUrl = $_REQUEST["arrUrl"];
        }
        if (isset($_REQUEST["arrId"])) {
            $arrId = $_REQUEST["arrId"];
        }
        if ($arrId != NULL && $arrNo != NULL && $arrUrl != NULL) {
            for ($i = 0; $i < sizeof($arrId); $i++) {
                if (is_numeric($arrNo[$i]) && $arrUrl[$i] != "") {
                    $data = array(
                        "No" => $arrNo[$i],
                        "url_store" => $arrUrl[$i],
                    );
                    DataStoreModel::update($data, $arrId[$i]);
                }
            }
        }
        $data_chap = DataStoreModel::getByChapterId($id_chapter);
        for ($i = 0; $i < sizeof($data_chap); $i++) {
            echo '
                    <tr>
                        <td> <input type = "checkbox" name="check_data" value = "' . $data_chap[$i]['id'] . '" ></td>
                        <td>' . ($i + 1) . '</td>
                        <td><input type = "text" class = "form-control input-sm" value = "' . $data_chap[$i]['No'] . '" ></td>
                        <td><input type = "text" class = "form-control input-sm" value = "' . $data_chap[$i]['url_store'] . '"></td>
                        <td>' . $data_chap[$i]['create_time'] . '</td>
                        <td>
                            <button type = "button" class = "btn btn-success" id = "save">
                                <b>Save </b>
                            </button>
                        </td>
                    </tr>';
        }
    }

    public function updateComic($id) {
        if ($this->input->post("add")) {
            $name = $_POST["name"];
            $id_author = $_POST["id_author"];
            $id_type = $_POST["type"];
            $id_kind = $_POST["id_kind"];
            $text = $_POST["textArea"];
            $url = "";
            if ($name == "" || $text == "") {
                echo "<script>alert('Bạn chưa điền đủ thông tin')</script>";
                $model["lstAuthor"] = AuthorModel::getAll();
                $model["lstKind"] = KindModel::getAllName(1);
                $this->tz_layout->view("comic/new_comic", $model);
            } else {
                $this->Mgallery->do_upload();
                if ($_FILES["img"]["name"] == NULL) {
                    $comic = array(
                        "comic_name" => $name,
                        "review_average" => 0,
                        "number_viewers" => 0,
                        "summary" => $text,
                        "number_chapter" => 0,
                        "id_category" => $id_kind,
                        "id_author" => $id_author,
                    );
                } else {
                    $url = "/upload/avatar/" . $_FILES["img"]["name"];
                    $comic = array(
                        "comic_name" => $name,
                        "review_average" => 0,
                        "number_viewers" => 0,
                        "summary" => $text,
                        "url_images" => $url,
                        "number_chapter" => 0,
                        "id_category" => $id_kind,
                        "id_author" => $id_author,
                    );
                }

                ComicModel::update($comic, $id);
                echo "<script>alert('Cập nhật thành công')</script>";
                $model["model"] = ComicModel::getById($id)[0];
                $model["lstAuthor"] = AuthorModel::getAll();
                $model["lstType"] = TypeModel::getAll();
                $m = ComicModel::getById($id)[0];
                $m = $m['id_category'];
                $m = CategoryModel::getById($m)[0];
                $model["lstKind"] = KindModel::getAllName($m['id_type']);
                $this->tz_layout->view("comic/edit", $model);
            }
//            
        } else {
            $model["lstComic"] = ComicModel::getAll();
            $this->tz_layout->view("comic/show_all", $model);
        }
    }

    public function deleteChappter($id_comic) {
        $list = NULL;
        if (isset($_REQUEST["list"])) {
            $list = $_REQUEST["list"];
        }
        if ($list != NULL) {
            foreach ($list as $id) {
                DataStoreModel::deleteChap($id);
                ChapterModel::delete($id);
            }
        }
        $lstChapter = ChapterModel::getByComicId($id_comic);
        $model = ComicModel::getById($id_comic)[0];
        $type = CategoryModel::getById($model["id_category"])[0]['id_type'];
        if ($type == 1) {
            $name_type = "One";
        } else {
            $name_type = "Two";
        }
        for ($i = 0; $i < sizeof($lstChapter); $i++) {
            echo '<tr>
                <td><input type="checkbox" name="check_account" value="' . $lstChapter[$i]["id"] . '"></td>
                <td>' . ($i + 1) . '</td>
                <td>' . $lstChapter[$i]["No"] . '</td>
                <td><a href="' . (TZ_Helper::getUrl("admin", "mcomic", "editChapter" . $name_type . "/" . $lstChapter[$i]["id"])) . '">' . $lstChapter[$i]["chapter_name"] . '</a></td>
                <td>' . $lstChapter[$i]["create_time"] . '</td>
            </tr>';
        }
    }

    public function deleteComic() {
        $list = NULL;
        if (isset($_REQUEST["list"])) {
            $list = $_REQUEST["list"];
        }
        if ($list != NULL) {
            foreach ($list as $id) {
                $model = ChapterModel::getByComicId($id);
                foreach ($model as $id_chap) {
                    DataStoreModel::deleteChap($id_chap['id']);
                    ChapterModel::delete($id_chap['id']);
                }
                ComicModel::deleteTableView($id);
                ComicModel::delete($id);
            }
        }
        $lstComic = ComicModel::getAll();
        for ($i = 0; $i < sizeof($lstComic); $i++) {
            echo '  <tr>
                                        <td><input type="checkbox" name="id_comic" value="' . $lstComic[$i]["id"] . '"></td>
                                        <td>' . ($i + 1) . '</td>
                                        <td><a href="' . TZ_Helper::getUrl("admin", "mcomic", "edit/" . $lstComic[$i]["id"]) . '">' . $lstComic[$i]["comic_name"] . '</a></td>                                 
                                        <td>' . (TypeModel::getById(CategoryModel::getById($lstComic[$i]["id_category"])[0]["id_type"])[0]["type_name"]) . '</td>
                                        <td>' . (KindModel::getById(CategoryModel::getById($lstComic[$i]["id_category"])[0]["id_kind"])[0]["kind_name"]) . '</td>
                                        <td>' . (AuthorModel::getById($lstComic[$i]["id_author"])[0]["author_name"]) . '</td>
                                        <td>' . $lstComic[$i]["create_date"] . '</td>
                                        <td>
          


            <button type = "button" class = "btn btn-success">
                <a href="' . TZ_Helper::getUrl("admin", "mcomic", "allChapter/" . $lstComic[$i]["id"]) . '">  <b> >> </b></a>
            </button>

            </td>
                                    </tr>';
        }
    }

}
