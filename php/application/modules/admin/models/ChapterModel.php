<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ChapterModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getAll() {
        $this->db->select("*");
        $query = $this->db->get("tbl_chapter");
        return $query->result_array();
    }

    public function getById($id) {
        $this->db->select("*");
        $this->db->where("id", $id);
        $query = $this->db->get("tbl_chapter");
        return $query->result_array();
    }

    public function getByComicId($id_comic) {
        $this->db->select("*");
        $this->db->where("id_comic", $id_comic);
        $this->db->order_by("No", "ASC");
        $query = $this->db->get("tbl_chapter");
        return $query->result_array();
    }

    public function getChapterNewUpdate($id_comic) {
        $this->db->select("*");
        $this->db->where("id_comic", $id_comic);
        $this->db->order_by("create_time", "DESC");
        $this->db->limit(5, 0);
        $query = $this->db->get("tbl_chapter");
        return $query->result_array();
    }

    public function insert($chapterModel) {
        $this->db->insert("tbl_chapter", $chapterModel);
    }

    public function delete($id) {
        $this->db->where("id", $id);
        $this->db->delete("tbl_chapter");
    }

    public function update($chapterModel, $id) {
        $this->db->where("id", $id);
        $this->db->update("tbl_chapter", $chapterModel);
    }

}

?>