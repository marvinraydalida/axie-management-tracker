<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    private $db_table = 'scholar';

    public function get_scholars($manager_id){
        $this->db->where('manager_id',$manager_id);   
        $query = $this->db->get($this->db_table);
        return $query->result_array();
    }

    public function add_scholar($ronin_address, $manager_id){
        $data = array(
            'manager_id' => $manager_id,
            'ronin_address' => $ronin_address
        );
        $this->db->where($data);
        $query = $this->db->get($this->db_table);
        if(count($query->result_array()) == 0){
            $this->db->insert($this->db_table, $data);
            print_r("inserted");
            return true;
        }
        return false;
    }
}