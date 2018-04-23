<?php
class Login_model extends CI_Model {
    function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     //get the username & password from tbl_usrs
     public function get_user($usr, $pwd)
     {
        $salt = 'GG';
        $pass = MD5($pwd.$salt);
        $this->db->select('*');
        $this->db->from('Account');
        $this->db->where('userName like binary', $usr);
        $this->db->where('pass like binary', $pass);
        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
     }
}