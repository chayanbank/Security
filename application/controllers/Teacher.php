<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

    public function index() {
        $this->load->model('Teacher_model');
        $data['teacher'] = $this->Teacher_model->list_teacher();
        $this->load->view('Teacher_view',$data);
    }

    public function insert_teacher() {
        if ($this->input->post('Insert') != NULL) {
            $this->form_validation->set_error_delimiters('<div class="error" style="color: red;">', '</div>');
            $this->form_validation->set_rules("teachID", "Teacher ID", "trim|required|alpha_numeric|max_length[5]|min_length[5]");
            $this->form_validation->set_rules("teachName", "Teacher Name", "trim|required|alpha");
            $this->form_validation->set_rules("teachSurname", "Teacher Surname", "trim|required|alpha");

            if ($this->form_validation->run() == FALSE)
            {
              //validation fails
              $exception = array(
                'teachID' => form_error('teachID'),
                'teachName' => form_error('teachName'),
                'teachSurname' => form_error('teachSurname')
              );
              $this->load->view('TeacherInsert_view', $exception);
            } else {
                $this->load->model('Teacher_model');
                $this->Teacher_model->insert_teacher();
                redirect('Main_user/profile');
            }
        }else{  
            $this->load->view('TeacherInsert_view');
        }
    }

}
?>
