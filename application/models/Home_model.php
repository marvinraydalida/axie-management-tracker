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

    public function update_scholar(){
        $this->db->where('scholar_id', $_POST['scholar_id']);
        unset($_POST['update']);
        unset($_POST['file']);
        unset($_POST['scholar_id']);
        $this->db->update($this->db_table, $this->input->post());
    }

    public function remove_scholar(){
        $data = array(
            'name' => 'Assign scholar name',
            'email' => 'Assign scholar email',
            'contact' => 'Assign scholar contact',
            'address' => 'Assign scholar address',
            'image_location' => 'https://www.seekpng.com/png/detail/428-4287240_no-avatar-user-circle-icon-png.png',
            'valid_id' => 'https://images.assetsdelivery.com/compings_v2/photoplotnikov/photoplotnikov1610/photoplotnikov161000024.jpg'
        );
        $this->db->where('scholar_id',$_POST['scholar_id']);
        $this->db->update($this->db_table, $data);
    }

    public function remove_axie_account(){
        $this->db->delete($this->db_table, array('scholar_id' => $_POST['scholar_id']));
    }
}