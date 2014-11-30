<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ReviewModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert($reviewModel) {
        $this->db->insert("tbl_reviews", $reviewModel);
    }

    public function checkReview($id_comic, $ip) {
        $this->db->select("*");
        $this->db->where("id_comic",$id_comic);
        $this->db->where("ip", $ip);
        $query = $this->db->get("tbl_reviews");
        if (sizeof($query->result_array()) != 0) {
            return TRUE;
        }
        return FALSE;
    }

    public function getByComicId($id_comic) {
        $this->db->select("*");
        $this->db->where("id_comic", $id_comic);
        $query = $this->db->get("tbl_reviews");
        return $query->result_array();
    }

}

?>
