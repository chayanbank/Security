<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
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
         $this->load->model('Login_model');
    }

    public function index()
    {
        $status = $this->session->userdata('status');
        if($status === null) {
           //get the posted values
           $username = $this->input->post("username");
           $password = $this->input->post("pwd");

           //set validations
           $this->form_validation->set_error_delimiters('<div class="error" style="color: red;">', '</div>');
           $this->form_validation->set_rules("username", "Username", "trim|required|alpha_numeric");
           $this->form_validation->set_rules("pwd", "Password", "trim|required");

           if ($this->form_validation->run() == FALSE)
           {
                //validation fails
                $exception = array(
                  'username' => form_error('username')
                );
                $this->load->view('Login_view', $exception);
           }
           else
           {
                //validation succeeds
                if ($this->input->post('login') == "Login")
                {
                     //check if username and password is correct
                     $usr_result = $this->Login_model->get_user($username, $password);
                     if($usr_result) {
                          foreach($usr_result as $row) {
                              $sessArray = array(
                                  'userName' => $row->userName,
                                  'status' => $row->status,
                                  'stuID' => $row->stuID,
                                  'is_authenticated' => TRUE,
                              );
                              $this->session->set_userdata($sessArray);
                          }
                          if ($row->status == "ADMIN") {
                              redirect('Main_admin');
                          } else {
                              redirect('Main_user');
                          }
                          
                      } else {
                          $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Invalid username and password!</div>');
                          redirect('Login/index');
                     }
                }
                else
                {
                     redirect('Login/index');
                }
           }
        } else {
            if($status === 'ADMIN') {
                redirect('/Main_admin');
            } else {
                redirect('/Main_user');
            }
        }
    }

    public function logout() {
      $status = $this->session->userdata('status');
        if($status !== null) {
          $this->session->unset_userdata('userName');
          $this->session->unset_userdata('status');
          $this->session->unset_userdata('stuID');
          $this->session->unset_userdata('is_authenticated');
          $this->session->sess_destroy();
          $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
          $this->output->set_header("Pragma: no-cache");
          redirect('Main');
        } else {
          redirect('Main');
        }
    }
}
?>
