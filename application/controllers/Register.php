<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	
	public function index()
	{   
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->config->load('rules');


        
        $this->form_validation->set_rules($this->config->item('signup'));
        if ($this->form_validation->run() == FALSE){
            $this->load->view('register');
        }
        else{
            $this->load->view('login');
        }
	}

    public function validate_email($str){
        if (!filter_var($str, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
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
        else if(strlen($str) < 2){
            $this->form_validation->set_message("Last name must be atleast 2 characters.");
            return false;
        }
        else if(strlen($str) > 26){
            $this->form_validation->set_message("Last name must be below 26 characters.");
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
