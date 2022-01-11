<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{	
		session_start();

		if(!isset($_SESSION['user_id'])){
			redirect('/Login');
		}

		$scholars = $this->get_scholars();
		#print_r($scholars);
		$data['scholars'] = $this->get_scholar_details($scholars);
		#print_r($data['scholars']);

		
		$this->load->view('home',$data);


		if(isset($_POST['address'])){
			$this->request_address($this->input->post('address'));
		}

		if(isset($_POST['logout'])){
			session_destroy();
			redirect('/Login');
		}
	}


	public function get_scholars(){
		$this->load->model('Home_model');
		return $this->Home_model->get_scholars($_SESSION['user_id']);
	}

	public function get_scholar_details($scholars){
		$scholars_details = array();
		foreach($scholars as $scholar){
			array_push($scholars_details,$this->request_address($scholar['ronin_address'],"fetch"));
		}
		return $scholars_details;
	}

	public function request_address($address, $mode = 'search'){
		$this->load->model('Home_model');
		$request_url = "https://axie-infinity.p.rapidapi.com/get-update/";
		$ronin_address = $address;
		if(strcmp($mode,'search') == 0)
			$ronin_address = "0x" . substr($address,6);

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
		  
		if(strcmp($mode,'search') == 0){
			if(isset($result_array['leaderboard']['name']))
				$this->Home_model->add_scholar($ronin_address, $_SESSION['user_id']);
		}
		else{
			return $result_array;
		}
	}

}
