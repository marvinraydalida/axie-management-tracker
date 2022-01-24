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
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->config->load('rules');
		$this->form_validation->set_rules($this->config->item('update_scholar'));

		if (!isset($_SESSION['json_scholars']) || (time() - $_SESSION['time'] > 1200)) {
			$scholars = $this->get_scholars();
			$scholar_details = $this->get_scholar_details($scholars);
			$data['scholars_status'] = $scholar_details;
			$data['scholars'] = $scholars;
			if ($this->check_time($data['scholars_status'])) {
				$data['scholars'] = $this->get_scholars();
			}
		} else {
			$data['scholars_status'] = json_decode($_SESSION['json_scholars'], true);
			$this->check_time($data['scholars_status']);
			$data['scholars'] = $this->get_scholars();
		}

		if (isset($_SESSION['success'])) {
			$data['update_success'] = $_SESSION['success'];
			unset($_SESSION['success']);
		}

		$data['average_asc'] = $this->generate_top_three($data['scholars_status']);
		$data['user'] = $_SESSION;

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('home', $data);
		} else {
			$this->upload_image();
			$affected_rows = $this->Home_model->update_scholar();
			if ($affected_rows > 0)
				$_SESSION['success'] = true;
			else
				$_SESSION['success'] = false;
			redirect('/Home');
		}

		if (isset($_POST['submit'])) {
			$this->add_scholar($this->valid_address($_POST['address']));
			redirect('/Home');
		}

		if (isset($_POST['logout'])) {
			unset($_SESSION);
			session_destroy();
			redirect('/Login');
		}

		if (isset($_POST['refresh'])) {
			$_SESSION['time'] -= 1200;
			redirect('/Home');
		}

		if (isset($_POST['delete'])) {
			$this->Home_model->remove_axie_account();
			$_SESSION['time'] -= 1200;
			redirect('/Home');
		}

		if (isset($_POST['remove'])) {
			$this->Home_model->remove_scholar();
			redirect('/Home');
		}
	}

	public function check_time($scholar_status)
	{
		$db = $this->Home_model->get_time();
		$time_today = date_create(date('Y-m-d', time()));
		$init_time = date_create(date('Y-m-d', 	1640995200));
		$difference = (array)date_diff($time_today, $init_time, true);
		if ($db[0]['difference'] < $difference['d']) {
			$this->Home_model->change_time($difference['d'], $scholar_status);
			return true;
		}
		return false;
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
				if (isset($_SESSION['json_scholars'])) {
					$scholars = json_decode($_SESSION['json_scholars'], true);
					array_push($scholars, $scholar);
					$_SESSION['json_scholars'] = json_encode($scholars);
					$_SESSION['time'] = time();
				}
			}
		}
	}
	// public function add_scholar($address)
	// {
	// 	$scholar = $this->request_address($address);

	// 	if (isset($scholar['leaderboard']['name'])) {
	// 		if ($this->Home_model->add_scholar($address, $_SESSION['user_id'])) {;
	// 			if (isset($_SESSION['json_scholars'])) {
	// 				$scholars = json_decode($_SESSION['json_scholars'], true);
	// 				array_push($scholars, $scholar);
	// 				$_SESSION['json_scholars'] = json_encode($scholars);
	// 				$_SESSION['time'] = time();
	// 			}
	// 		}
	// 	}
	// }

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
		$_SESSION['json_scholars'] = json_encode($scholars_details);
		$_SESSION['time'] =  time();
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

	public function generate_top_three($scholar_status)
	{
		$average = array();
		$index = array();
		for ($i = 0; $i < count($scholar_status); $i++) {
			array_push($index, $i);
		}

		foreach ($scholar_status as $status) {
			array_push($average, $status['slp']['average']);
		}

		array_multisort($average, SORT_DESC, $index);

		return $index;
	}

	public function validate_full_name($str)
	{
		if (!preg_match("/^[a-zA-Z-' ]*$/", $str)) {
			return false;
		}

		return true;
	}
}
