<?php

class KindModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getById($id) {
        $this->db->select("*");
        $this->db->where("id", $id);
        $query = $this->db->get("tbl_kind");
        return $query->result_array();
    }

    public function getAll() {
        $this->db->select("*");
        $query = $this->db->get("tbl_kind");
        return $query->result_array();
    }

    public function insert($kindModel) {
        $this->db->insert("tbl_kind", $kindModel);
    }

    public function delete($id) {
        $this->db->where("id", $id);
        $this->db->delete("tbl_kind");
    }

    public function update($kindModel, $id) {
        $this->db->where("id", $id);
        $this->db->update("tbl_kind", $kindModel);
    }

}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
