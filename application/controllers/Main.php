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
            $this->load->model('Main_model');
			$this->Main_model->sign_up();
			redirect('Main');
        }else{  
            $this->load->view('SignUp_view');
        }
    }
}
?>
