<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{	
		session_start();
		session_regenerate_id();

		if(!isset($_SESSION['user_id'])){
			redirect('/Login');
		}

		if(isset($_COOKIE['json_scholars'])){
			print_r("henlo");
			$data['scholars'] = json_decode($_COOKIE['json_scholars'],true);
		}
		else if(!isset($_COOKIE['json_scholars'])){
			print_r("alo");
			$scholars = $this->get_scholars();
			$scholar_details = $this->get_scholar_details($scholars);
			$data['scholars'] = $scholar_details;
		}
		//$this->load->view('templates/header');
		$this->load->view('home',$data);
		//$this->load->view('templates/footer');

		if(isset($_POST['submit'])){
			$this->add_scholar($this->valid_address($_POST['address']));
			redirect('/Home');
		}

		if(isset($_POST['logout'])){
			session_destroy();
			setcookie('json_scholars', '', time() - 3600);
			redirect('/Login');
		}

		if(isset($_POST['refresh'])){
			setcookie('json_scholars', '', time() - 3600);
			redirect('/Home');
		}
	}

	public function valid_address($address){
		if(strcmp(substr($address,0,6),'ronin:') == 0)
			$ronin_address = "0x" . substr($address,6);
		else
			$ronin_address = $address;
		return $ronin_address;
	}

	public function get_scholars(){
		$this->load->model('Home_model');
		return $this->Home_model->get_scholars($_SESSION['user_id']);
	}

	public function add_scholar($address){
		$scholar = $this->request_address($address);
		
		if(isset($scholar['leaderboard']['name'])){
			if($this->Home_model->add_scholar($address, $_SESSION['user_id'])){;
				if(isset($_COOKIE['json_scholars'])){
					$scholars = json_decode($_COOKIE['json_scholars'],true);
					array_push($scholars,$scholar);
					setcookie('json_scholars', json_encode($scholars), time() + 1200);
				}
			}
		}			
	}

	public function get_scholar_details($scholars){
		$scholars_details = array();
		foreach($scholars as $scholar){
			array_push($scholars_details,$this->request_address($scholar['ronin_address']));
		}
		setcookie('json_scholars', json_encode($scholars_details), time() + 1200);
		return $scholars_details;
	}


	public function request_address($address){
		$this->load->model('Home_model');
		$request_url = "https://axie-infinity.p.rapidapi.com/get-update/";
		
		$ronin_address = $address;

		$opts = array(
			'http'=>array(
			  'method'=>"GET",
			  'header'=>"x-rapidapi-host: axie-infinity.p.rapidapi.com\r\n" .
						"x-rapidapi-key: 1c20eb7382msh33adcb36d8c9492p1011a0jsnfbf74b86df31\r\n"
			)
		  );
		$context = stream_context_create($opts);


		$response_json = file_get_contents($request_url . $ronin_address, false, $context);
		$result_array = json_decode($response_json,true);

		return $result_array;
	}
}
