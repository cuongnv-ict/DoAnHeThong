<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PublisherModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert($publisherModel) {
        $this->db->insert("tbl_publisher", $publisherModel);
    }

    public function delete($id) {
        $this->db->where("id", $id);
        $this->db->delete("tbl_publisher");
    }

    public function update($publisherModel, $id) {
        $this->db->where("id", $id);
        $this->db->update("tbl_publisher", $publisherModel);
    }

}

?>
