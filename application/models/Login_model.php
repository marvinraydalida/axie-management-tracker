<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    private $db_table = 'users';

    public function get_user($email){
        $this->db->where('email',$email);   
        $query = $this->db->get($this->db_table);
        return $query->result_array();
    }
}