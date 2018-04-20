<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminTel extends CI_Controller {
    public function __construct()
    {
         parent::__construct();
         $this->load->library('session');
         $this->load->helper('form');
         $this->load->helper('url');
         $this->load->helper('html');
         $this->load->database();
         $this->load->library('form_validation');
         //load the login model
         $this->load->model('AdminTel_model');
    }

    public function insert_tel()
    {
      if ($this->input->post('Insert') != NULL) {
         //set validations
         $this->form_validation->set_error_delimiters('<div class="error" style="color: red;">', '</div>');
         $this->form_validation->set_rules("tel", "Telephone", "trim|required|is_natural");

         if ($this->form_validation->run() == FALSE)
         {
              //validation fails
              $exception = array(
                'tel' => form_error('tel')
              );
              $this->load->view('AdminAddTel_view', $exception);
         }
         else
         {
              $this->load->model('AdminTel_model');
              $this->AdminTel_model->insert_tel();
              redirect('Main_admin');
         }
      } else {
          $this->load->view('AdminAddTel_view');
      }
    }

    public function insert_tel_user() {
      $stuID= $this->uri->segment(3);
        if ($this->input->post('Insert') != NULL) {
         //set validations
         $this->form_validation->set_error_delimiters('<div class="error" style="color: red;">', '</div>');
         $this->form_validation->set_rules("tel", "Telephone", "trim|required|is_natural");

         if ($this->form_validation->run() == FALSE)
         {
              //validation fails
              $exception = array(
                'tel' => form_error('tel')
              );
              $this->load->view('AdminAddTelUser_view', $exception);
         }
         else
         {
              $this->load->model('AdminTel_model');
              $this->AdminTel_model->insert_tel_user($stuID);
              redirect('Main_admin');
         }
      } else {
        $data['stuID'] = $stuID;
          $this->load->view('AdminAddTelUser_view',$data);
      }
    }
}
?>
