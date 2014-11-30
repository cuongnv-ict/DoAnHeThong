<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CategoryModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getAll() {
        $this->db->select("*");
        $query = $this->db->get("tbl_categorys");
        return $query->result_array();
    }

    public function getByTypeId($id_type) {
        $this->db->select("*");
        $this->db->where("id_type", $id_type);
        $query = $this->db->get("tbl_categorys");
        return $query->result_array();
    }

    public function getById($id) {
        $this->db->select("*");
        $this->db->where("id", $id);
        $query = $this->db->get("tbl_categorys");
        return $query->result_array();
    }

    public function insert($categoryModel) {
        $this->db->insert("tbl_categorys", $categoryModel);
    }

    public function delete($id) {
        $this->db->where("id", $id);
        $this->db->delete("tbl_categorys");
    }
    public function deleteKind($id) {
        $this->db->where("id_kind", $id);
        $this->db->delete("tbl_categorys");
    }

    public function update($categoryModel, $id) {
        $this->db->where("id", $id);
        $this->db->update("tbl_categorys", $categoryModel);
    }
}

?>