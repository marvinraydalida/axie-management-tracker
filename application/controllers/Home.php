<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		session_start();
		session_regenerate_id();

		if (!isset($_SESSION['user_id'])) {
			redirect('/Login');
		}
		$this->load->model('Home_model');

		if (isset($_COOKIE['json_scholars'])) {
			print_r("henlo");
			$data['scholars'] = $this->get_scholars();
			//print_r($data['scholars']);
			$data['scholars_status'] = json_decode($_COOKIE['json_scholars'], true);
		} else if (!isset($_COOKIE['json_scholars'])) {
			print_r("alo");
			$scholars = $this->get_scholars();
			$scholar_details = $this->get_scholar_details($scholars);
			$data['scholars'] = $scholars;
			$data['scholars_status'] = $scholar_details;
		}

		$data['currencies'] = $this->get_currencies();
		if (!isset($_SESSION['eth'])) {
			$_SESSION['eth'] = $data['currencies'][0];
			$_SESSION['eth_status'] = '';

			$_SESSION['axs'] = $data['currencies'][1];
			$_SESSION['axs_status'] = '';

			$_SESSION['slp'] = $data['currencies'][2];
			$_SESSION['slp_status'] = '';
		} else {
			$this->update_currencies($data['currencies']);
		}

		$this->load->view('home', $data);

		if (isset($_POST['submit'])) {
			$this->add_scholar($this->valid_address($_POST['address']));
			redirect('/Home');
		}

		if (isset($_POST['logout'])) {
			unset($_SESSION);
			session_destroy();
			unset($_COOKIE);
			setcookie('json_scholars', '', time() - 3600);
			redirect('/Login');
		}

		if (isset($_POST['refresh'])) {
			setcookie('json_scholars', '', time() - 3600);
			redirect('/Home');
		}

		if (isset($_POST['update'])) {
			$this->upload_image();
			$this->Home_model->update_scholar();
			print_r($_FILES);
			redirect('/Home');
		}

		if(isset($_POST['delete'])){
			$this->Home_model->remove_axie_account();
			setcookie('json_scholars', '', time() - 3600);
			redirect('/Home');
		}

		if(isset($_POST['remove'])){
			$this->Home_model->remove_scholar();
			redirect('/Home');
		}
	}

	public function get_currencies()
	{
		$end_point = 'https://api.coinbase.com/v2/exchange-rates?currency=';
		$eth_json = file_get_contents($end_point . 'ETH');
		$axs_json = file_get_contents($end_point . 'AXS');
		$slp_json = file_get_contents($end_point . 'SLP');
		$eth = json_decode($eth_json, true);
		$axs = json_decode($axs_json, true);
		$slp = json_decode($slp_json, true);
		$currencies = array();
		array_push($currencies, $eth['data']['rates']['PHP']);
		array_push($currencies, $axs['data']['rates']['PHP']);
		array_push($currencies, $slp['data']['rates']['PHP']);
		return $currencies;
	}

	public function update_currencies($data)
	{
		if ($_SESSION['eth'] < $data[0]) {
			$_SESSION['eth_status'] = "up";
		} else if ($_SESSION['eth'] > $data[0]) {
			$_SESSION['eth_status'] = "down";
		} else {
			$_SESSION['eth_status'] = "same";
		}

		if ($_SESSION['axs'] < $data[1]) {
			$_SESSION['axs_status'] = "up";
		} else if ($_SESSION['axs'] > $data[1]) {
			$_SESSION['axs_status'] = "down";
		} else {
			$_SESSION['axs_status'] = "same";
		}

		if ($_SESSION['slp'] < $data[2]) {
			$_SESSION['slp_status'] = "up";
		} else if ($_SESSION['slp'] > $data[2]) {
			$_SESSION['slp_status'] = "down";
		} else {
			$_SESSION['slp_status'] = "same";
		}


		$_SESSION['eth'] = $data[0];
		$_SESSION['axs'] = $data[1];
		$_SESSION['slp'] = $data[2];
	}

	public function valid_address($address)
	{
		if (strcmp(substr($address, 0, 6), 'ronin:') == 0)
			$ronin_address = "0x" . substr($address, 6);
		else
			$ronin_address = $address;
		return $ronin_address;
	}

	public function get_scholars()
	{
		return $this->Home_model->get_scholars($_SESSION['user_id']);
	}

	public function add_scholar($address)
	{
		$scholar = $this->request_address($address);

		if (isset($scholar['leaderboard']['name'])) {
			if ($this->Home_model->add_scholar($address, $_SESSION['user_id'])) {;
				if (isset($_COOKIE['json_scholars'])) {
					$scholars = json_decode($_COOKIE['json_scholars'], true);
					array_push($scholars, $scholar);
					setcookie('json_scholars', json_encode($scholars), time() + 1200);
				}
			}
		}
	}

	public function upload_image()
	{
		if (isset($_FILES)) {
			if (isset($_FILES['scholar_profile'])) {
				switch ($_FILES['scholar_profile']['type']) {
					case "image/jpeg":
					case "image/svg+xml":
					case "image/png":
						$image_file = $_FILES['scholar_profile']['name'];
						$file_extension = pathinfo($image_file, PATHINFO_EXTENSION);
						$url = "http://localhost/axie-management-tracker/Home/get_image/?path=";
						move_uploaded_file($_FILES['scholar_profile']['tmp_name'], 'uploads/scholar/' . $_POST['scholar_id'] . "." . $file_extension);
						$_POST['image_location'] = $url . 'uploads/scholar/' . $_POST['scholar_id'] . "." . $file_extension;
						break;
				}
			}
			if (isset($_FILES['valid_id'])) {
				switch ($_FILES['valid_id']['type']) {
					case "image/jpeg":
					case "image/svg+xml":
					case "image/png":
						$image_file = $_FILES['valid_id']['name'];
						$file_extension = pathinfo($image_file, PATHINFO_EXTENSION);
						$url = "http://localhost/axie-management-tracker/Home/get_image/?path=";
						move_uploaded_file($_FILES['valid_id']['tmp_name'], 'uploads/id/' . $_POST['scholar_id'] . "." . $file_extension);
						$_POST['valid_id'] = $url . 'uploads/id/' . $_POST['scholar_id'] . "." . $file_extension;
						break;
				}
			}
		}
	}


	public function get_image()
	{
		$this->load->helper('file');
		$filename = $this->input->get('path');
		header('Content-type: ' . get_mime_by_extension($filename));
		echo file_get_contents($filename);
	}

	public function get_scholar_details($scholars)
	{
		$scholars_details = array();
		foreach ($scholars as $scholar) {
			array_push($scholars_details, $this->request_address($scholar['ronin_address']));
		}
		setcookie('json_scholars', json_encode($scholars_details), time() + 1200);
		return $scholars_details;
	}


	public function request_address($address)
	{
		$request_url = "https://axie-infinity.p.rapidapi.com/get-update/";

		$ronin_address = $address;

		$opts = array(
			'http' => array(
				'method' => "GET",
				'header' => "x-rapidapi-host: axie-infinity.p.rapidapi.com\r\n" .
					"x-rapidapi-key: 1c20eb7382msh33adcb36d8c9492p1011a0jsnfbf74b86df31\r\n"
			)
		);
		$context = stream_context_create($opts);


		$response_json = file_get_contents($request_url . $ronin_address, false, $context);
		$result_array = json_decode($response_json, true);

		return $result_array;
	}
}
