<?php
class Main_model extends CI_Model {
    public function list_main() {
		$result = $this->db->get('STD');

		return $result->result_array();
    }

    public function list_profile($stuID) {
        $this->db->where('studentID',$stuID);
		$result = $this->db->get('STD');

		return $result->result_array();
    }

    public function sign_up() {
        $salt = 'GG';
        $dataStudent = array(
            'studentID' => $this->input->post('studentID'),
			'Fname' => $this->input->post('fname'),
			'Lname' => $this->input->post('lname'),
            'faculty' => $this->input->post('faculty'),
            'major' => $this->input->post('major')
		);
        $this->db->insert('Student',$dataStudent);
        $dataAccount = array(
			'userName' => $this->input->post('username'),
            'pass' => MD5($this->input->post('pwd').$salt),
            'status' => "USER",
			'stuID' => $this->input->post('studentID')
        );
        $this->db->insert('Account',$dataAccount);
        $dataTel = array(
            'studentID' => $this->input->post('studentID')
        );
        $this->db->insert('Tel',$dataTel);
    }

    public function search($keyword){
        $this->db->like('studentID',$keyword);
        $this->db->or_like('Fname',$keyword);
        $this->db->or_like('Lname',$keyword);
        $query = $this->db->get('Student');
        return $query->result_array();
    }

    public function about() {
		$result = $this->db->get('About');

		return $result->result_array();
    }
}