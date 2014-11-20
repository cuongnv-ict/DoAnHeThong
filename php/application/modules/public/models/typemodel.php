<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TypeModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public static function getById($id) {
        $this->db->select("*");
        $this->db->where("id", $id);
        $query = $this->db->get("tbl_type");
        return $query->result_array();
    }

    public static function getAll() {
        
    }

}

?>