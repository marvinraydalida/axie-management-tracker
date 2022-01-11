<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		$this->load->view('home');

		if($this->input->post('address') != null){
			$this->request_address();
		}
	}


	public function request_address(){
		$request_url = "https://axie-infinity.p.rapidapi.com/get-update/";
		$ronin_address = "0x" . substr($this->input->post('address'),6);
		
		$opts = array(
			'http'=>array(
			  'method'=>"GET",
			  'header'=>"x-rapidapi-host: axie-infinity.p.rapidapi.com\r\n" .
						"x-rapidapi-key: 1c20eb7382msh33adcb36d8c9492p1011a0jsnfbf74b86df31\r\n"
			)
		  );
		$context = stream_context_create($opts);
		$response_json = file_get_contents($request_url . $ronin_address, false, $context);

		echo $response_json;
	}

}
