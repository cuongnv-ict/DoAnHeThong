<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    class AuthorModel extends CI_Model{
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }
        
        public function getById($id){
            $this->db->select("*");
            $this->db->where("id",$id);
            $query=$this->db->get("tbl_authors");
            return $query->result_array();
        }
        
        public function getByAuthorName($author_name){
            $this->db->select("*");
            $this->db->where("author_name",$author_name);
            $query=$this->db->get("tbl_authors");
            $data=$query->result_array();
            if($data!=NULL){
                return TRUE;
            }
            return FALSE;
        }
        public function getAll(){
            $this->db->select("*");
            $query=$this->db->get("tbl_authors");
            return $query->result_array();
        }
        
        public function insert($authorModel){
            $this->db->insert("tbl_authors",$authorModel);
        }
        
        public function delete($id){
            $this->db->where("id",$id);
            $this->db->delete("tbl_authors");
        }
        
        public function update($authorModel,$id){
            $this->db->where("id",$id);
            $this->db->update("tbl_authors",$authorModel);
        }
    }
?>