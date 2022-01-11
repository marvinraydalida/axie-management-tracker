<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	
	public function index()
	{   
        session_start();
        if(isset($_SESSION['user_id'])){
			redirect('/Home');
		}

        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->load->model('Register_model');
        $this->config->load('rules');


        
        $this->form_validation->set_rules($this->config->item('signup'));
        if ($this->form_validation->run() == FALSE){
            $this->load->view('register');
        }
        else{
            if(count($this->Register_model->get_user()) > 0){
                $this->load->view('register');
            }
            else{
                $this->Register_model->create_user();
                redirect('/Login');
            } 
        }
	}

    public function validate_first_name($str){
        if (!preg_match("/^[a-zA-Z-' ]*$/",$str)) {
            return false;
        }

        return true;
    }

    public function validate_last_name($str){
        if (!preg_match("/^[a-zA-Z-' ]*$/",$str)) {
            $this->form_validation->set_message("Only letters and white space allowed");
            return false;
        }

        return true;
    }

    public function validate_password($str){
        $uppercase = preg_match('@[A-Z]@', $str);
        $lowercase = preg_match('@[a-z]@', $str);
        $number    = preg_match('@[0-9]@', $str);
        $specialChars = preg_match('@[^\w]@', $str);

        
        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($str) < 8) {
            return false;
        }
        return true;
    }


}
