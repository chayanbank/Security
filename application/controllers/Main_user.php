<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_user extends CI_Controller {

	public function index() {
        $status = $this->session->userdata('status');
        if($status !== null) {
            $stuID = $this->session->userdata('stuID');
            $this->load->model('Main_model');
            $this->load->model('User_model');
            $data['main'] = $this->Main_model->list_main();
            $data['pic'] = $this->User_model->list_profile($stuID);
            $this->load->view('User_view',$data);
        } else {
            redirect('/');
        }
    }
    public function __construct() {
        parent::__construct();
    }
    public function profile(){
        $status = $this->session->userdata('status');
        if($status !== null) {
            $stuID = $this->session->userdata('stuID');
            if ($this->input->post('Update') != NULL) {
                $faculty = $this->input->post('faculty');
                $major = $this->input->post('major');

                $this->form_validation->set_error_delimiters('<div class="error" style="color: red;">', '</div>');
                $this->form_validation->set_rules("studentID", "StudentID", "trim|required|is_natural_no_zero|max_length[8]|min_length[8]");
                $this->form_validation->set_rules("Fname", "First Name", "trim|required|alpha");
                $this->form_validation->set_rules("Lname", "Last Name", "trim|required|alpha");

                if ($this->form_validation->run() == FALSE) {
                    $this->load->model('User_model');
                    $data = array(
                        'studentID' => form_error('studentID'),
                        'fname' => form_error('Fname'),
                        'lname' => form_error('Lname'),
                        'profile' => $this->User_model->list_profile($stuID)
                      );
                      $this->load->view('Profile_view', $data);
                } else {
                    if(($faculty === 'Informatics' && ($major === 'Computer Science' || $major === 'Information Technology' || $major === 'Software Engineering')) || ($faculty === 'Humanities and Social Sciences' && ($major === 'Religions and Philosophy' || $major === 'Thai' || $major === 'Cultural Resources Management' || $major === 'Psychology')) || ($faculty === 'Science' && ($major === 'Biology' || $major === 'Chemistry' || $major === 'Biochemistry' || $major === 'Mathematics'))) {

    			         $this->load->model('User_model');
    			         $this->User_model->edit($stuID);
    			         redirect('Main_user');
                     } else {
                        $this->load->model('User_model');
                        $data['profile'] = $this->User_model->list_profile($stuID);
                        $this->load->view('Profile_view', $data);
                     }
                }
    		}else{
                $this->load->model('User_model');
    		    $data['profile'] = $this->User_model->list_profile($stuID);
                $this->load->view('Profile_view', $data);
            }
        } else {
            redirect('/');
        }
    }

    public function delete() {
        $status = $this->session->userdata('status');
        if($status !== null) {
    		$stuID = $this->session->userdata('stuID');
    		$this->load->model('User_model');
    		$this->User_model->delete($stuID);
    		redirect('Main');
        } else {
            redirect('/');
        }
	}

    public function picture(){
        $status = $this->session->userdata('status');
        if($status !== null) {
            if ($this->input->post('Upload') != NULL) {
                $this->load->view('Picture_view', array('error' => ' ' ));
            }else{
                $stuID = $this->session->userdata('stuID');
                $this->load->model('User_model');
    		    $data['pic'] = $this->User_model->list_profile($stuID);
                $this->load->view('Photo_view', $data);
            }
        } else {
            redirect('/');
        }
    }

    public function do_upload(){
        $status = $this->session->userdata('status');
        if($status !== null) {
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
        } else {
            redirect('/');
        }
    }

    public function search() {
        $status = $this->session->userdata('status');
        if($status !== null) {
            $stuID = $this->session->userdata('stuID');
            $keyword = $this->input->post('keyword');
            $this->load->model('User_model');
            $data['main'] = $this->User_model->search($keyword);
            $data['pic'] = $this->User_model->list_profile($stuID);
            $this->load->view('User_view',$data);
        } else {
            redirect('/');
        }
    }

    public function about() {
        $status = $this->session->userdata('status');
        if($status !== null) {
            $this->load->model('User_model');
            $data['about'] = $this->User_model->about();
            $this->load->view('About_view',$data);
        } else {
            redirect('/');
        }
    }
}
?>
