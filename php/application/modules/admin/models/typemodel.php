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

    public function getById($id) {
        $this->db->select("*");
        $this->db->where("id", $id);
        $query = $this->db->get("tbl_type");
        return $query->result_array();
    }

    public function getAll() {
        $this->db->select("*");
        $query = $this->db->get("tbl_type");
        return $query->result_array();
    }

    public function insert($typeModel) {
        $this->db->insert("tbl_type", $typeModel);
    }

    public function delete($id) {
        $this->db->where("id", $id);
        $this->db->delete("tbl_type");
    }

    public function update($typeModel, $id) {
        $this->db->where("id", $id);
        $this->db->update("tbl_type", $typeModel);
    }

}

?>