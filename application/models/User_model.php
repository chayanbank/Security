<?php
class User_model extends CI_Model {

    public function list_profile($stuID) {
        $this->db->where('studentID',$stuID);
		$result = $this->db->get('STD');

		return $result->result_array();
    
    }
    public function update_picture($img_name) {
        $stuID = $this->session->userdata('stuID');
        $data = array(
			'picture' => $img_name
		);
		$this->db->where('studentID',$stuID);
		$this->db->update('Student',$data);
    }

    public function edit($stuID) {
		$data = array(
			'studentID' => $this->input->post('studentID'),
            'Fname' => $this->input->post('Fname'),
            'Lname' => $this->input->post('Lname'),
            'faculty' => $this->input->post('faculty'),
            'major' => $this->input->post('major')
		);
		$this->db->where('studentID',$stuID);
		$this->db->update('Student',$data);
	}
}