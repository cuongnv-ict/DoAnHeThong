<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AdministratorModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getById($id) {
        $this->db->select("*");
        $this->db->where("id", $id);
        $query = $this->db->get("tbl_administrator");
        return $query->result_array();
    }

    public function getAll() {
        $this->db->select("*");
        $query = $this->db->get("tbl_administrator");
        return $query->result_array();
    }
    
    public function checkUser($username, $pass){
    	$this->db->select("*");
    	$this->db->where("administrator_name", $username);
    	$this->db->where("password", $pass);
    	$query = $this->db->get("tbl_administrator");
    	return $query->result_array();
    	
    }

}

?>