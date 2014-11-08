<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ComicModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->Model("CategoryModel");
    }

    public function getAll() {
        $this->db->select("*");
        $query = $this->db->get("tbl_comic");
        return $query->result_array();
    }

    public function getById($id) {
        $this->db->select("*");
        $this->db->where("id", $id);
        $query = $this->db->get("tbl_comic");
        return $query->result_array();
    }

    public function getByCategoryId($id_category) {
        $this->db->select("*");
        $this->db->where("id_category", $id_category);
        $query = $this->db->get("tbl_comic");
        return $query->result_array();
    }

    public function getByTypeId($id_type) {
        $this->db->select("*");
        $this->db->where("id_category in (select id 
                                                    from tbl_categorys
                                                    where `id_type`=$id_type)");
        $query = $this->db->get("tbl_comic");
        return $query->result_array();
    }

    public function getByFirstChar($char) {
        $this->db->select("*");
        $this->db->where("comic_name like ", $char . "%");
        $query = $this->db->get("tbl_comic");
        return $query->result_array();
    }

    public function insert($comicModel) {
        $this->db->insert("tbl_comic", $comicModel);
    }

    public function delete($id) {
        $this->db->where("id", $id);
        $this->db->delete("tbl_comic");
    }

    public function update($comicModel, $id) {
        $this->db->where("id", $id);
        $this->db->update("tbl_comic", $comicModel);
    }

}

?>
