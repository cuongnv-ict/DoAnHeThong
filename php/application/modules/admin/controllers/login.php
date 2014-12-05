<?php
class Login extends MX_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper("url");
		// Nạp thư viện hỗ trợ tạo file view
		$this->load->helper("tz_helper");
		// Nạp thư viện layout
		$this->load->library("Tz_layout"); 
		$this->load->Model('AdministratorModel');
		$this->load->library('session');
		
	}
	
	public function index(){
		if($this->session->userdata('login')==true){
			redirect('/admin/mcomic/showAll', 'refresh');
		}
		$this->tz_layout->setLayout("layout/login_layout");
		$this->tz_layout->view("login/index");
	}
	
	public function loginProcess(){
		$username = $_POST['username'];
		$passwd = $_POST['password'];
		$result = AdministratorModel::checkUser($username,$passwd);
		if($result) {
			$userdata = array(
                                        'id'=>$result[0]['id'],
					'username' => $username,
					'full_name' => $result[0]['fullname'],
					'email' => $result[0]['email'],
					'type' => $result[0]['isSuperAdministrator']
			);
			
			$this->session->set_userdata('login', true);
			$this->session->set_userdata('info', $userdata);
			redirect('/admin/mcomic/showAll', 'refresh');
		} else {
			$this->session->set_userdata['login'] = false;
			redirect('/admin/login/index?r=error', 'refresh');
		}
	}
	
	public function logout(){
		$this->session->unset_userdata('info');
		$this->session->set_userdata('login', false);
		redirect('/admin/login/index', 'refresh');
	}
}