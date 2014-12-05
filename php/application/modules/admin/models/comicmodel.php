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
        $this->load->helper('text');
        $this->load->helper('url');
        $this->load->Model("CategoryModel");
        $this->_gallery_path = realpath(APPPATH . "../application/upload/avatar");
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
        if (CategoryModel::getById($comicModel['id_category'])[0]['id_type'] == 1) {
            $dir2 = "./application/upload/truyenchu/" . md5($comicModel['comic_name']);
            if (!is_dir($dir2)) {
                mkdir($dir2, 0777, true);
            }
        }
        $this->db->insert("tbl_comic", $comicModel);
    }

    public function delete($id) {
        $this->db->where("id", $id);
        $this->db->delete("tbl_comic");
    }
     public function deleteTableView($id) {
        $this->db->where("id_comic", $id);
        $this->db->delete("tbl_reviews");
    }

    public function update($comicModel, $id) {
        $this->db->where("id", $id);
        $this->db->update("tbl_comic", $comicModel);
    }

}

?>
