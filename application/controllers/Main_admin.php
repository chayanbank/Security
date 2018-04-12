<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_admin extends CI_Controller {

	public function index() {
        $this->load->model('Main_model');
        $data['main'] = $this->Main_model->list_main();
		$this->load->view('Admin_view',$data);
    }

}
?>
