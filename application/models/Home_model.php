<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{

    private $db_table = 'scholar';
    private $db_time = 'time';


    public function get_time()
    {
        return $this->db->get($this->db_time)->result_array();
    }

    public function change_time($new_diff, $scholar_status, $manager_id){
        $this->db->where('id',1);
        $this->db->update($this->db_time,array('difference' => $new_diff));
        $this->db->where('manager_id',$manager_id);
        $query = $this->db->get($this->db_table);
        $result_array = $query->result_array();
        $index = 0;
        foreach($result_array as $result){
            $lst = json_decode($result['slp_chart'],true);
            array_shift($lst);
            array_push($lst,array(
                'slp' => $scholar_status[$index]['slp']['yesterdaySLP'],
                'time' => strtotime('today 12am')
            ));
            $this->db->where('scholar_id',$result['scholar_id']);
            $this->db->update($this->db_table,array('slp_chart' => json_encode($lst)));
            $index++;
        }
    }

    public function get_scholars($manager_id)
    {
        $this->db->where('manager_id', $manager_id);
        $query = $this->db->get($this->db_table);
        return $query->result_array();
    }

    public function add_scholar($ronin_address, $manager_id)
    {
        $data = array(
            'manager_id' => $manager_id,
            'ronin_address' => $ronin_address
        );
        $this->db->where('ronin_address', $ronin_address);
        $query = $this->db->get($this->db_table);
        if (count($query->result_array()) == 0) {
            $slp_chart = array(0, 1, 2, 3, 4, 5, 6);
            $init_value = array(
                'slp' => 0, 
                'time' => 1640995200
            );
            $slp_chart = array_fill_keys($slp_chart, $init_value);
            $data['slp_chart'] = json_encode($slp_chart);

            $this->db->insert($this->db_table, $data);
            print_r("inserted");
            return true;
        }
        return false;
    } //1640995200)

    // public function add_scholar($ronin_address, $manager_id)
    // {
    //     $data = array(
    //         'manager_id' => $manager_id,
    //         'ronin_address' => $ronin_address
    //     );
    //     $this->db->where($data);
    //     $query = $this->db->get($this->db_table);
    //     if (count($query->result_array()) == 0) {
    //         $slp_chart = array(0, 1, 2, 3, 4, 5, 6);
    //         $init_value = array(
    //             'slp' => 0, 
    //             'time' => 1640995200
    //         );
    //         $slp_chart = array_fill_keys($slp_chart, $init_value);
    //         $data['slp_chart'] = json_encode($slp_chart);

    //         $this->db->insert($this->db_table, $data);
    //         print_r("inserted");
    //         return true;
    //     }
    //     return false;
    // } //1640995200)

    public function update_scholar()
    {
        $this->db->where('scholar_id', $_POST['scholar_id']);
        unset($_POST['update']);
        unset($_POST['file']);
        unset($_POST['scholar_id']);

        //xss filter enabled
        $data = $this->security->xss_clean($this->input->post());
        $this->db->update($this->db_table, $data);
        return $this->db->affected_rows();

        //xss filter disabled
        // $this->db->update($this->db_table, $this->input->post());
    }

    public function remove_scholar()
    {
        $data = array(
            'name' => 'Assign scholar name',
            'email' => 'Assign scholar email',
            'contact' => 'Assign scholar contact',
            'address' => 'Assign scholar address',
            'image_location' => 'https://www.seekpng.com/png/detail/428-4287240_no-avatar-user-circle-icon-png.png',
            'valid_id' => 'https://images.assetsdelivery.com/compings_v2/photoplotnikov/photoplotnikov1610/photoplotnikov161000024.jpg'
        );
        $this->db->where('scholar_id', $_POST['scholar_id']);
        $this->db->update($this->db_table, $data);
    }

    public function remove_axie_account()
    {
        $this->db->delete($this->db_table, array('scholar_id' => $_POST['scholar_id']));
    }
}
