<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UploadModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('text');
        $this->load->helper('url');
    }

    public function do_upload() {
//        $dir2 = $this->_gallery_path;
//                if (! is_dir ( $dir2 )) {
//			mkdir ( $dir2, 0777, true );
//		}
        $this->_gallery_path = realpath(APPPATH . "../application/upload/avatar");
        $image_data = "";
        $config = array(
            'upload_path' => $this->_gallery_path,
            'allowed_types' => 'gif|jpg|png',
            'max_size' => '2000'
        );
        $this->load->library("upload", $config);
        if (!$this->upload->do_multi_upload("img_ups")) {
            echo 1;
            $error = array(
                $this->upload->display_errors()
            );
        } else {
            echo 2;
            $image_data = $this->upload->get_multi_upload_data();
        }
        return $image_data;
    }

}

?>
