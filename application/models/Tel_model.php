<?php
class Tel_model extends CI_Model {

    public function insert_tel() {
        $data = array(
            'tel' => $this->input->post('tel')
		);
        $this->db->where('studentID',$this->session->userdata('stuID'));
        $this->db->update('Tel',$data);
    }

}