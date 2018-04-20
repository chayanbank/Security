<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tel extends CI_Controller {
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
         $this->load->model('Tel_model');
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
              $this->load->view('AddTel_view', $exception);
         }
         else
         {
              $this->load->model('Tel_model');
              $this->Tel_model->insert_tel();
              redirect('Main_user');
         }
      } else {
          $this->load->view('AddTel_view');
      }
    }
}
?>
