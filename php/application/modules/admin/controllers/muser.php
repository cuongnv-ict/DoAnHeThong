<?php

class Muser extends MX_Controller {

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

        $this->load->Model('AdministratorModel');
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

    public function index() {
        $id = $this->session->userdata('info')['id'];
        $model["model"] = AdministratorModel::getById($id);
        $model['id'] = $id;
        $this->tz_layout->view("user/index", $model);
//      $this->tz_layout->view("user/all_user", $model);
    }

    public function allUser() {
        if ($this->session->userdata('info')['type'] == '0') {
            echo "<script>alert('Ban không được phép truy cập')</script>";
            $model["lstComic"] = ComicModel::getAll();
            $this->tz_layout->view("comic/show_all", $model);
            return;
        }
        $model["model"] = AdministratorModel::getAll();
        $this->tz_layout->view("user/all_user", $model);
    }

    public function newUser() {
        $this->tz_layout->view("user/new_user");
    }

    public function insert() {
        $name = "";
        $fullname = "";
        $pass = "";
        $re_pass = "";
        $email = "";
        $phone = "";
        $role = 0;
        if (isset($_REQUEST["fullname"])) {
            $fullname = $_REQUEST["fullname"];
        }
        if (isset($_REQUEST["name"])) {
            $name = $_REQUEST["name"];
        }
        if (isset($_REQUEST["pass"])) {
            $pass = $_REQUEST["pass"];
        }
        if (isset($_REQUEST["re_pass"])) {
            $re_pass = $_REQUEST["re_pass"];
        }
        if (isset($_REQUEST["email"])) {
            $email = $_REQUEST["email"];
        }
        if (isset($_REQUEST["phone"])) {
            $phone = $_REQUEST["phone"];
        }
        if ($fullname == "" || $name == "" || $pass == "" || $re_pass == "" || $email == "" || $phone == "") {
            echo "<script>alert('Bạn chưa hoàn thành thông tin cần thiết')</script>";
            return;
        } else if ($pass != $re_pass) {
            echo "<script>alert('Password nhập không chính xác')</script>";
            return;
        }
        $check = AdministratorModel::checkExitsUser($name);
        if ($check != 0) {
            echo "<script>alert('Tài khoản này đã tồn tại')</script>";
        } else {
            $pass = md5($pass);
            $account = array(
                "administrator_name" => $name,
                "password" => $pass,
                "email" => $email,
                "url_image" => "/upload/avatar/avatar.jpg",
                "phone_number" => $phone,
                "isSuperAdministrator" => $role,
                "fullname" => $fullname
            );
            AdministratorModel::insert($account);
            echo "<script>alert('Tạo thành công tài khoản')</script>";
        }
    }

    public function delete() {
        $listAcount = NULL;
        if (isset($_REQUEST["list"])) {
            $listAcount = $_REQUEST["list"];
        }
        if ($listAcount != NULL) {
            foreach ($listAcount as $id) {
                AdministratorModel::delete($id);
            }
            $model = AdministratorModel::getAll();
            for ($i = 0; $i < sizeof($model); $i++) {
                echo '  <tr>
				<td><input type="checkbox" name="check_account"  value="' . $model[$i]["id"] . '"></td>
				<td>' . ($i + 1) . '</td>
				<td>' . $model[$i]["administrator_name"] . '</td>
                                <td>' . $model[$i]["fullname"] . '</td>
				<td>' . '********' . '</td>		
				<td>' . $model[$i]["email"] . '</td>
				<td>' . $model[$i]["phone_number"] . '</td>
                                <td>' . $model[$i]["isSuperAdministrator"] . '</td>
                                <td>' . $model[$i]["create_time"] . '</td> 
			</tr>';
            }
        } else {
            $model = AdministratorModel::getAll();
            for ($i = 0; $i < sizeof($model); $i++) {
                echo '  <tr>
				<td><input type="checkbox" name="check_account"  value="' . $model[$i]["id"] . '"></td>
				<td>' . ($i + 1) . '</td>
				<td>' . $model[$i]["administrator_name"] . '</td>
                                <td>' . $model[$i]["fullname"] . '</td>
				<td>' . '********' . '</td>		
				<td>' . $model[$i]["email"] . '</td>
				<td>' . $model[$i]["phone_number"] . '</td>
                                <td>' . $model[$i]["isSuperAdministrator"] . '</td>
                                <td>' . $model[$i]["create_time"] . '</td> 
			</tr>';
            }
        }
    }

    public function update($id) {
        if ($this->input->post("name")) {
            $name = $_POST["new_name"];
            if ($name == "") {
                echo "<script>alert('Bạn chưa nhập tên mới')</script>";
            } else {
                $data = array(
                    "fullname" => $name
                );
                AdministratorModel::update($data, $id);
                echo "<script>alert('Đổi thành công')</script>";
            }
            $model["model"] = AdministratorModel::getById($id);
            $model['id'] = $id;
            $this->tz_layout->view("user/index", $model);
        }
        if ($this->input->post("pass")) {
            $name = $_POST["new_pass"];
            if ($name == "") {
                echo "<script>alert('Bạn chưa nhập pass mới')</script>";
            } else {
                $data = array(
                    "password" => md5($name)
                );
                AdministratorModel::update($data, $id);
                echo "<script>alert('Đổi thành công')</script>";
            }
            $model["model"] = AdministratorModel::getById($id);
            $model['id'] = $id;
            $this->tz_layout->view("user/index", $model);
        }
        if ($this->input->post("email")) {
            $name = $_POST["new_email"];
            if ($name == "") {
                echo "<script>alert('Bạn chưa nhập email mới')</script>";
            } else {
                $data = array(
                    "email" => $name
                );
                AdministratorModel::update($data, $id);
                echo "<script>alert('Đổi thành công')</script>";
            }
            $model["model"] = AdministratorModel::getById($id);
            $model['id'] = $id;
            $this->tz_layout->view("user/index", $model);
        }
        if ($this->input->post("phone")) {
            $name = $_POST["new_phone"];
            if ($name == "") {
                echo "<script>alert('Bạn chưa nhập số mới')</script>";
            } else {
                $data = array(
                    "phone_number" => $name
                );
                AdministratorModel::update($data, $id);
                echo "<script>alert('Đổi thành công')</script>";
            }
            $model["model"] = AdministratorModel::getById($id);
            $model['id'] = $id;
            $this->tz_layout->view("user/index", $model);
        }
        if ($this->input->post("image")) {
//            $name = $_POST["new_pass"];
            if ($_FILES["img"]["name"] == NULL) {
                echo "<script>alert('Bạn chưa chọn ảnh mới')</script>";
            } else {
                $this->Mgallery->do_upload();
                $url = "/upload/avatar/" . $_FILES["img"]["name"];
                $data = array(
                    "url_image" => $url
                );
                AdministratorModel::update($data, $id);
                echo "<script>alert('Đổi thành công')</script>";
            }

            $model["model"] = AdministratorModel::getById($id);
            $model['id'] = $id;
            $this->tz_layout->view("user/index", $model);
        }
    }

}
