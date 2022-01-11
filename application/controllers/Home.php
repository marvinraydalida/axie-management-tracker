<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{	
		session_start();

		if(!isset($_SESSION['user_id'])){
			redirect('/Login');
		}
		$this->load->view('home');

		print_r($_SESSION);

		if($this->input->post('address') != null){
			$this->request_address();
		}

		if(isset($_POST['logout'])){
			session_destroy();
			redirect('/Login');
		}
	}


	public function request_address(){
		$request_url = "https://axie-infinity.p.rapidapi.com/get-update/";
		$ronin_address = "0x" . substr($this->input->post('address'),6);

		#$addresses = array("0x2c4ec27f2c134804eb0b5ef322a3b2594e52931d","0x5e0416928b459f380dde1c078fd41204fb7d209d");
		#$responses = array();
		
		$opts = array(
			'http'=>array(
			  'method'=>"GET",
			  'header'=>"x-rapidapi-host: axie-infinity.p.rapidapi.com\r\n" .
						"x-rapidapi-key: 1c20eb7382msh33adcb36d8c9492p1011a0jsnfbf74b86df31\r\n"
			)
		  );
		$context = stream_context_create($opts);

		/*foreach ($addresses as &$addres) {
			$response_json = file_get_contents($request_url . $addres, false, $context);
			array_push($responses,json_decode($response_json,true));
		}*/

		$response_json = file_get_contents($request_url . $ronin_address, false, $context);
		echo $response_json;

		#print_r($responses);
	}

}
