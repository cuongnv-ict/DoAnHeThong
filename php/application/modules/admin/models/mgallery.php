<?php

class Mgallery extends CI_Model {

    protected $_gallery_path = "";
    protected $_gallery_url = "";

    public function __construct() {
        parent::__construct();
        $this->_gallery_path = realpath(APPPATH . "../application/upload/avatar");
    }

    //hàm thực hiện công việc upload và resize lại hình ảnh
    public function do_upload() {
        $config = array('upload_path' => $this->_gallery_path,
            'allowed_types' => 'gif|jpg|png',
            'max_size' => '2000');
        $this->load->library("upload", $config);
        if (!$this->upload->do_upload("img")) {
            $error = array($this->upload->display_errors());
        } else {
            $image_data = $this->upload->data();
        }
        //kết thúc công đoạn upload hình ảnh

//        $config = array("source_image" => $image_data['full_path'],
//            "new_image" => $this->_gallery_path . "/thumbs",
//            "maintain_ration" => true,
//            "width" => '150',
//            "height" => "100");
//        $this->load->library("image_lib", $config);
//        $this->image_lib->resize();
        //kết thúc công đoạn resize lại hình ảnh				
    }

}
