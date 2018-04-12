<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_user extends CI_Controller {

	public function index() {
        $this->load->model('Main_model');
        $data['main'] = $this->Main_model->list_main();
        $this->load->view('User_view',$data);
    }
    public function __construct() {
        parent::__construct();
    }
    public function profile(){
        $stuID = $this->session->userdata('stuID');
        if ($this->input->post('Update') != NULL) {
			$this->load->model('User_model');
			$this->User_model->edit($stuID);
			redirect('Main_user');
		}else{
            $this->load->model('User_model');
		    $data['profile'] = $this->User_model->list_profile($stuID);
            $this->load->view('Profile_view', $data);
        }
    }

    public function picture(){
        if ($this->input->post('Upload') != NULL) {
            $this->load->view('Picture_view', array('error' => ' ' ));
        }else{
            $stuID = $this->session->userdata('stuID');
            $this->load->model('User_model');
		    $data['pic'] = $this->User_model->list_profile($stuID);
            $this->load->view('Photo_view', $data);
        }
    }

    public function do_upload(){
        $config = array(
            'upload_path' => "./uploads/",
            'allowed_types' => "gif|jpg|png",
            'file_name' => $this->session->userdata('stuID'),
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
            $this->load->model('User_model');
			$this->User_model->update_picture($img_name);
            $this->load->view('Upload_success');
        }
        else
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('Picture_view', $error);
        }
    }
}
?>
