<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DataStoreModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getByChapterId($id_chapter) {
        $this->db->select("*");
        $this->db->where("id_chapter", $id_chapter);
        $query = $this->db->get("tbl_data_store");
        return $query->result_array();
    }

    public function insert($data_storeModel) {
        $this->db->insert("tbl_data_store", $data_storeModel);
    }

    public function delete($id) {
        $this->db->where("id", $id);
        $this->db->delete("tbl_data_store");
    }
    public function deleteChap($id_chap) {
        $this->db->where("id_chapter", $id_chap);
        $this->db->delete("tbl_data_store");
    }

    public function update($data_storeModel, $id) {
        $this->db->where("id", $id);
        $this->db->update("tbl_data_store", $data_storeModel);
    }

}

?>