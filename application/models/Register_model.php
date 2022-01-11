<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {

    private $db_table = 'users';

    public function get_user(){
        $this->db->where('email',$this->input->post('email'));   
        $query = $this->db->get($this->db_table);
        return $query->result_array();
    }

    public function create_user(){
        unset($_POST['submit']);
        unset($_POST['cpassword']);
        $this->db->insert($this->db_table, $this->input->post());
        $string = $_POST['password'] . $this->db->insert_id();
        $hash = password_hash($string, PASSWORD_BCRYPT);
        $this->db->where('user_id', $this->db->insert_id());
        $this->db->update($this->db_table, array('password' => $hash));
        
    }
}