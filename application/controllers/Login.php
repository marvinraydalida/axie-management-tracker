<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	private $user_id;
	private $email;
	private $first_name;
	private $last_name;
	private $image;

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
			$_SESSION['first_name'] = $this->first_name;
			$_SESSION['last_name'] = $this->last_name;
			$_SESSION['image'] = $this->image;
			$_SESSION['time'] = time();
			$_SESSION['browser'] = $_SERVER['HTTP_USER_AGENT'];
			$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
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
				$this->image = $user[0]['image_location'];
				return true;
			}
				
			else
				return false;
		}	
		else
			return true;
			//set to true because error result will overflow e.g. "Wrong password" atop "Wrong Credentials or not registered."
			//Another example: sample@email.com is a non-existent account (NEA). Since it's non-existing the count($user) > 0 condition
			//will yield false which will then display "Wrong password" which is a wrong error message if you user entered NEA.
			//If parent if else statement is removed, error will occur if user entered a non-existent email account.
	}
}
