<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account_model extends CI_Model
{

    private $db_table = 'users';

    public function get_user($user_id = null)
    {
        if ($user_id == null) {
            $this->db->where('email', $this->input->post('email'));
        }
        else{
            $this->db->where('user_id', $user_id);
        }
        $query = $this->db->get($this->db_table);
        return $query->result_array();
    }

    public function update_account()
    {
        $this->db->where('user_id', $_POST['user_id']);
        unset($_POST['update']);
        unset($_POST['user_id']);

        $this->db->update($this->db_table, $_POST);
    }
}
