<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Picture_user extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function picture(){
        if ($this->input->post('Upload') != NULL) {

            $this->load->view('OPic_view', array('error' => ' ', 'stuID' => $this->uri->segment(3) ));
        }else{
            $stuID = $this->uri->segment(3);
            $this->load->model('Picture_model');
            $data['pic'] = $this->Picture_model->list_profile($stuID);
            $data['stuID'] = $stuID;
            $this->load->view('OPhoto_view', $data);
        }
    }

    public function do_upload(){
        $stuID = $this->uri->segment(3);
        $config = array(
            'upload_path' => "./uploads/",
            'allowed_types' => "gif|jpg|png",
            'file_name' => $stuID,
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "768",
            'max_width' => "1024"
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if($this->upload->do_upload('image'))
        {
            $img_name = $this->upload->data('file_name');
            $this->load->model('Picture_model');
			$this->Picture_model->update_picture($img_name,$stuID);
            $this->load->view('OSuccess_view');
        }
        else
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('OPic_view', $error);
        }
    }
}
?>
