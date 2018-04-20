<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index() {
        $this->load->model('Main_model');
        $data['main'] = $this->Main_model->list_main();
		$this->load->view('Main_view',$data);
    }

    public function sign_up() {
        if ($this->input->post('signUp') != NULL) {
            //set validations
            $this->form_validation->set_error_delimiters('<div class="error" style="color: red;">', '</div>');
            $this->form_validation->set_rules("studentID", "StudentID", "trim|required|is_natural_no_zero|max_length[8]|min_length[8]");
            $this->form_validation->set_rules("username", "Username", "trim|required|alpha_numeric");
            $this->form_validation->set_rules("pwd", "Password", "trim|required");
            $this->form_validation->set_rules("fname", "First Name", "trim|required|alpha");
            $this->form_validation->set_rules("lname", "Last Name", "trim|required|alpha");
            
            if ($this->form_validation->run() == FALSE)
             {
                  //validation fails
                  $exception = array(
                    'studentID' => form_error('studentID'),
                    'username' => form_error('username'),
                    'pwd' => form_error('pwd'),
                    'fname' => form_error('fname'),
                    'lname' => form_error('lname')
                  );
                  $this->load->view('SignUp_view', $exception);
             } else {

                $this->load->model('Main_model');
    			$this->Main_model->sign_up();
    			redirect('Main');
            }
        }else{  
            $this->load->view('SignUp_view');
        }
    }

    public function search() {
        $keyword = $this->input->post('keyword');
        $this->load->model('Main_model');
        $data['main'] = $this->Main_model->search($keyword);
        $this->load->view('Main_view',$data);
    }

    public function about() {
        $this->load->model('Main_model');
        $data['about'] = $this->Main_model->about();
        $this->load->view('About_view',$data);
    }
}
?>
