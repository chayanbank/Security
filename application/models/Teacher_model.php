<?php
class Teacher_model extends CI_Model {

    public function list_teacher() {
		$result = $this->db->get('TeachView');

		return $result->result_array();
    
    }
    public function insert_teacher() {
        $data = array(
			'teachID' => $this->input->post('teachID'),
            'teachName' => $this->input->post('teachName'),
            'teachSurname' => $this->input->post('teachSurname'),
		);
		$this->db->insert('Teacher',$data);
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
    
    public function delete($stuID) {
		$this->db->where('studentID', $stuID);
		$this->db->delete('Student');
    }

}