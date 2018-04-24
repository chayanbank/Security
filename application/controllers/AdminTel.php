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

    public function insert_tel() {
        $status = $this->session->userdata('status');
        if($status === 'ADMIN') {
          if ($this->input->post('Insert') != NULL) {
             //set validations
             $this->form_validation->set_error_delimiters('<div class="error" style="color: red;">', '</div>');
             $this->form_validation->set_rules("tel", "Telephone", "trim|required|regex_match[/^[0]{1}[0-9]{9}$/]|max_length[10]|min_length[10]");

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
      } else {
          if($status === 'USER') {
              if ($this->input->post('Insert') != NULL) {
                    //set validations
                     $this->form_validation->set_error_delimiters('<div class="error" style="color: red;">', '</div>');
                     $this->form_validation->set_rules("tel", "Telephone", "trim|required|regex_match[/^[0]{1}[0-9]{9}$/]|max_length[10]|min_length[10]");

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
          } else {
              redirect('/Main');
          }
      }
    }

    public function insert_tel_user() {
        $status = $this->session->userdata('status');
        if($status === 'ADMIN') {
          $stuID= $this->uri->segment(3);
          if ($this->input->post('Insert') != NULL) {
           //set validations
             $this->form_validation->set_error_delimiters('<div class="error" style="color: red;">', '</div>');
             $this->form_validation->set_rules("tel", "Telephone", "trim|required|regex_match[/^[0]{1}[0-9]{9}$/]|max_length[10]|min_length[10]");

             if ($this->form_validation->run() == FALSE)
             {
                  //validation fails
                  $exception = array(
                    'tel' => form_error('tel'),
                     'stuID' => $stuID
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
        } else {
            if($status === 'USER') {
                if ($this->input->post('Insert') != NULL) {
                    //set validations
                     $this->form_validation->set_error_delimiters('<div class="error" style="color: red;">', '</div>');
                     $this->form_validation->set_rules("tel", "Telephone", "trim|required|regex_match[/^[0]{1}[0-9]{9}$/]|max_length[10]|min_length[10]");

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
            } else {
                redirect('/Main');
            }
        }
    }
}
?>  
