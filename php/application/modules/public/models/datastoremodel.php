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

}

?>