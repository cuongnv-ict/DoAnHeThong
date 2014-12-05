<?php

class Mkind extends MX_Controller {

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
        $this->load->Model('CategoryModel');
        $this->load->Model('KindModel');
        $this->load->Model('TypeModel');
        $this->load->Model('ComicModel');
    }

    public function index() {
        $model["lstCategory"] = CategoryModel::getAll();
        $this->tz_layout->view("kind/index", $model);
    }

    public function newKind() {
//        $model["author"] = AuthorModel::getAll();
//        $model["list_k"] = KindModel::getAllName(1);
        $this->tz_layout->view("kind/new_kind");
    }

    public function getAll() {
        $id_type = 1;
        if (isset($_REQUEST["id_type"])) {
            $id_type = $_REQUEST["id_type"];
        }
        $mode = KindModel::getAllName($id_type);

        for ($i = 0; $i < sizeof($mode); $i++) {
            echo '<option value="' . $mode[$i]["id"] . '">' . $mode[$i]["kind_name"] . '</option>';
        }
    }

    public function edit($id) {
        $model['model'] = KindModel::getById($id);
        $model['type'] = CategoryModel::getByKind($id);
        $this->tz_layout->view("kind/edit_kind", $model);
    }

    public function update($id, $id_type) {
        $type = 1;
        $kind = "";
        if (isset($_REQUEST["type"])) {
            $type = $_REQUEST["type"];
        }
        if (isset($_REQUEST["kind"])) {
            $kind = $_REQUEST["kind"];
        }
        if ($kind == "") {
            echo "<script>alert('Bạn chưa nhập tên thể loại')</script>";
        } else {
            $model = array(
                "kind_name" => $kind
            );
            KindModel::update($model, $id_type);
            $model = array(
                "id_type" => $type
            );
            CategoryModel::update($model, $id);
            echo "<script>alert('Cập nhật thành công')</script>";
        }
    }

    public function insert() {
        $type = 1;
        $kind = "";
        if (isset($_REQUEST["type"])) {
            $type = $_REQUEST["type"];
        }
        if (isset($_REQUEST["kind"])) {
            $kind = $_REQUEST["kind"];
        }
        if ($kind == "") {
            echo "<script>alert('Bạn chưa nhập tên thể loại')</script>";
        } else {
            $model = array(
                "kind_name" => $kind
            );
            $id_kind = KindModel::insert($model);
            $model = array(
                "id_kind" => $id_kind,
                "id_type" => $type
            );
            CategoryModel::insert($model);
            echo "<script>alert('Thêm thành công')</script>";
        }
    }

    public function delete() {
        $listKind = NULL;
        if (isset($_REQUEST["list"])) {
            $listKind = $_REQUEST["list"];
        }
//        echo sizeof($listKind);
        if ($listKind != NULL) {
            foreach ($listKind as $id) {
                $id_cate = CategoryModel::getByKind($id);
                $id_com = ComicModel:: getByCategoryId($id_cate[0]['id']);
                if (sizeof($id_com) == 0) {
                    CategoryModel::deleteKind($id);
                    KindModel::delete($id);
                } else {
                    $lstCategory = CategoryModel::getAll();
                    for ($i = 0; $i < sizeof($lstCategory); $i++) {
                        echo '  <tr>
				<td><input type="checkbox" id="inlineCheckbox1" value="' . $lstCategory[$i]["id_kind"] . '"></td>
				<td>' . ($i + 1) . '</td>
				<td>' . (TypeModel::getById($lstCategory[$i]["id_type"])[0]["type_name"]) . '</td>
				<td>' . (KindModel::getById($lstCategory[$i]["id_kind"])[0]["kind_name"]) . '</td>
			</tr>';
                    }
                    echo "<script>alert('Thể loại đã được gán vào chuyện')</script>";
                    return;
                }
            }
        }
        $lstCategory = CategoryModel::getAll();
        for ($i = 0; $i < sizeof($lstCategory); $i++) {
            echo '  <tr>
				<td><input type="checkbox" id="inlineCheckbox1" value="' . $lstCategory[$i]["id_kind"] . '"></td>
				<td>' . ($i + 1) . '</td>
				<td>' . (TypeModel::getById($lstCategory[$i]["id_type"])[0]["type_name"]) . '</td>
				<td>' . (KindModel::getById($lstCategory[$i]["id_kind"])[0]["kind_name"]) . '</td>
			</tr>';
        }
    }

}
