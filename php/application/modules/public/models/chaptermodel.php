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
        $this->db->order_by("No","ASC");
        $query = $this->db->get("tbl_chapter");
        return $query->result_array();
    }
    
    public function getChapterNewUpdate($id_comic){
        $this->db->select("*");
        $this->db->where("id_comic", $id_comic);
        $this->db->order_by("create_time","DESC");
        $this->db->limit(5,0);
        $query = $this->db->get("tbl_chapter");
        return $query->result_array();
    }
    
    public function getByIdComicAndNo($id_comic,$no){
        $this->db->select("*");
        $this->db->where("id_comic", $id_comic);
        $this->db->where("No",$no);
        $query = $this->db->get("tbl_chapter");
        return $query->result_array();
    }
    public function getMaxNo($idComic){
        $this->db->select("*");
        $this->db->where("id_comic", $id_comic);
        $this->db->order_by("No","DESC");
        $query = $this->db->get("tbl_chapter");
        
        return $query->result_array();
    }
    
    public function getNewUpdate(){
        $this->db->distinct();
        $this->db->select("id_comic");
        $this->db->order_by("create_time","DESC");
        $query = $this->db->get("tbl_chapter");
        return $query->result_array();
    }
     public function getChapterUpdateNewFinal($id_comic){
        $this->db->select("*");
        $this->db->where("id_comic", $id_comic);
        $this->db->order_by("create_time","DESC");
        $this->db->limit(1);
        $query = $this->db->get("tbl_chapter");
        return $query->result_array();
    }
}

?>