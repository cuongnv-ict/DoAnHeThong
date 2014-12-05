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
        $id = $this->session->userdata('id');
        $model["model"] = AdministratorModel::getById(2);
        $model['id'] = $id;
        $this->tz_layout->view("user/index", $model);
//      $this->tz_layout->view("user/all_user", $model);
    }

    public function allUser() {
        if ($this->session->userdata('type') == 0) {
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
            echo "Bạn chưa hoàn thành thông tin cần thiết";
            return;
        } else if ($pass != $re_pass) {
            echo "Password nhập không chính xác";
            return;
        }
        $check = AdministratorModel::checkExitsUser($name);
        if ($check != 0) {
            echo "Tài khoản này đã tồn tại";
        } else {
            $pass = md5($pass);
            $account = array(
                "administrator_name" => $name,
                "password" => $pass,
                "email" => $email,
                "phone_number" => $phone,
                "isSuperAdministrator" => $role,
                "fullname" => $fullname
            );
            AdministratorModel::insert($account);
            echo "Tạo thành công tài khoản";
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

}
