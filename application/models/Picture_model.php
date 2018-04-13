<?php
class Picture_model extends CI_Model {

    public function list_profile($stuID) {
        $this->db->where('studentID',$stuID);
		$result = $this->db->get('STD');

		return $result->result_array();
    
    }
    public function update_picture($img_name,$stuID) {
        $data = array(
			'picture' => $img_name
		);
		$this->db->where('studentID',$stuID);
		$this->db->update('Student',$data);
    }
}