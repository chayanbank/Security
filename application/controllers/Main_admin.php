<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_admin extends CI_Controller {

	public function index() {
        $status = $this->session->userdata('status');
        if($status === 'ADMIN') {
            $stuID = $this->session->userdata('stuID');
            $this->load->model('Main_model');
            $this->load->model('Admin_model');
            $data['main'] = $this->Main_model->list_main();
            $data['pic'] = $this->Admin_model->list_profile($stuID);
    		$this->load->view('Admin_view',$data);
        } else {
            if($status === 'USER') {
                redirect('/Main_user');
            } else {
                redirect('/Main');
            }
        }
    }

    public function __construct() {
        parent::__construct();
    }

    public function profile(){
        $status = $this->session->userdata('status');
        if($status === 'ADMIN') { 
            $stuID = $this->session->userdata('stuID');
            if ($this->input->post('Update') != NULL) {
    			$this->load->model('Admin_model');
    			$this->Admin_model->edit($stuID);
    			redirect('Main_admin');
    		}else{
                $this->load->model('Admin_model');
    		    $data['profile'] = $this->Admin_model->list_profile($stuID);
                $this->load->view('AdminProfile_view', $data);
            }
        } else {
            if($status === 'USER') {
                redirect('/Main_user');
            } else {
                redirect('/Main');
            }
        }
    }

    public function delete() {
        $status = $this->session->userdata('status');
        if($status === 'ADMIN') { 
    		$stuID = $this->uri->segment(3);
    		$this->load->model('Admin_model');
    		$this->Admin_model->delete($stuID);
    		redirect('Main');
        } else {
            if($status === 'USER') {
                redirect('/Main_user');
            } else {
                redirect('/Main');
            }
        }
	}

    public function picture(){
        $status = $this->session->userdata('status');
        if($status === 'ADMIN') { 
            if ($this->input->post('Upload') != NULL) {
                $this->load->view('PicAd_view', array('error' => ' ' ));
            }else{
                $stuID = $this->session->userdata('stuID');
                $this->load->model('Admin_model');
    		    $data['pic'] = $this->Admin_model->list_profile($stuID);
                $this->load->view('PhotoAd_view', $data);
            }
        } else {
            if($status === 'USER') {
                redirect('/Main_user');
            } else {
                redirect('/Main');
            }
        }
    }

    public function do_upload(){
        $status = $this->session->userdata('status');
        if($status === 'ADMIN') { 
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
                $this->load->model('Admin_model');
    			$this->Admin_model->update_picture($img_name);
                $this->load->view('UploadSuccess_view');
            }
            else
            {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('PicAd_view', $error);
            }
        } else {
            if($status === 'USER') {
                redirect('/Main_user');
            } else {
                redirect('/Main');
            }
        }
    }

    public function edit_user() {
        $status = $this->session->userdata('status');
        if($status === 'ADMIN') { 
            $stuID = $this->uri->segment(3);
    		if ($this->input->post('Edit') != NULL) {
    			$this->load->model('Admin_model');
    			$this->Admin_model->edit_user($stuID);
    			redirect('Main_admin');
    		}else{
    			$this->load->model('Admin_model');
    			$data['account'] = $this->Admin_model->list_profile($stuID);
    			$this->load->view('AdminEdit_view',$data);
    		}
        } else {
            if($status === 'USER') {
                redirect('/Main_user');
            } else {
                redirect('/Main');
            }
        }
    }

    public function delete_user() {
        $status = $this->session->userdata('status');
        if($status === 'ADMIN') { 
            $stuID = $this->uri->segment(3);
    		$this->load->model('Admin_model');
    		$this->Admin_model->delete_user($stuID);
    		redirect('Main_admin');
        } else {
            if($status === 'USER') {
                redirect('/Main_user');
            } else {
                redirect('/Main');
            }
        }
    }

    public function search() {
        $status = $this->session->userdata('status');
        if($status === 'ADMIN') { 
            $stuID = $this->session->userdata('stuID');
            $keyword = $this->input->post('keyword');
            $this->load->model('Admin_model');
            $data['main'] = $this->Admin_model->search($keyword);
            $data['pic'] = $this->Admin_model->list_profile($stuID);
            $this->load->view('Admin_view',$data);
        } else {
            if($status === 'USER') {
                redirect('/Main_user');
            } else {
                redirect('/Main');
            }
        }
    }

    public function about() {
        $status = $this->session->userdata('status');
        if($status === 'ADMIN') { 
            $this->load->model('Admin_model');
            $data['about'] = $this->Admin_model->about();
            $this->load->view('About_view',$data);
        } else {
            if($status === 'USER') {
                redirect('/Main_user');
            } else {
                redirect('/Main');
            }
        }
    }
}
?>
