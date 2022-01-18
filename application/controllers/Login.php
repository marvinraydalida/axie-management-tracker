<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	private $user_id;
	private $email;
	private $first_name;
	private $last_name;

	public function index()
	{	
		
		session_start();
		if(isset($_SESSION['user_id'])){
			redirect('/Home');
		}

		$this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->config->load('rules');


        
        $this->form_validation->set_rules($this->config->item('login'));
        if ($this->form_validation->run() == FALSE){
            $this->load->view('login');
        }
        else{
			$_SESSION['user_id'] = $this->user_id;
			$_SESSION['email'] = $this->email;
			$_SESSION['first_Name'] = $this->first_name;
			$_SESSION['last_name'] = $this->last_name;
			$_SESSION['time'] = time();
			$this->load->view('loader');
        }

	}

	public function registered_email($str){
		$this->load->model('Login_model');
		$user = $this->Login_model->get_user($_POST['email']);
		if(count($user) > 0 && $user[0]['status'] == 'ACTIVE')
			return true;
		else
			return false;
	}

	public function check_password($str){
		$user = $this->Login_model->get_user($_POST['email']);
		if(count($user) > 0){
			$string = $str . $user[0]['user_id'];
			if(password_verify($string, $user[0]['password'])){
				$this->user_id = $user[0]['user_id'];
				$this->email = $user[0]['email'];
				$this->first_name = $user[0]['first_name'];
				$this->last_name = $user[0]['last_name'];
				return true;
			}
				
			else
				return false;
		}	
		else
			return true;
	}
}
