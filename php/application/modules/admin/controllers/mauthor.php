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
        $this->load->Model('AuthorModel');
    }

    public function index() {
        $model["lstAuthor"] = AuthorModel::getAll();
        $this->tz_layout->view("author/index", $model);
    }

    public function newAuthor() {
        $this->tz_layout->view("author/new_author");
    }

    public function insert() {
        $author_name = "";
        /* @var $_REQUEST type */
        if (isset($_REQUEST["author_name"])) {
            $author_name = $_REQUEST["author_name"];
        }
        if ($author_name == "") {
            echo 'Vui lòng điền tên tác giả!';
        } else {
            $checkAuthor = AuthorModel::getByAuthorName($author_name);
            if (!$checkAuthor) {
                $authorModel = array(
                    "author_name" => $author_name,
                );
                AuthorModel::insert($authorModel);
                echo 'Đã thêm tác giả <b>' . $author_name . '</b> vào cơ sở dữ liệu!';
            } else {
                echo 'Tên tác giả đã tồn tại vui lòng kiểm tra lại!';
            }
        }
    }

    public function delete() {
        $lstAuthorId = $_REQUEST["lstAuthorId"];
        // print_r( $lstAuthorId);
        foreach ($lstAuthorId as $id) {
            AuthorModel::delete($id);
        }
        $lstAuthor=  AuthorModel::getAll();
        for ($i = 0; $i < sizeof($lstAuthor); $i++) {
            echo '<tr>
                <td><input type="checkbox" name="chkAuthors" id="' . ($i + 1) . '_chkAuthor" value="' . $lstAuthor[$i]["id"] . '"></td>
                <td>' . ($i + 1) . '</td>
                <td><a href="#">' . $lstAuthor[$i]["author_name"] . '</a></td>
                <td><a href="#">' . $lstAuthor[$i]["create_date"] . '</a></td>    
            </tr>';
        }
    }

    public function update() {
        
    }

}
