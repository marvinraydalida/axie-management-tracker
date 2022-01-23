<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
{

    public function index()
    {
        session_start();
        session_regenerate_id();

        if (!isset($_SESSION['user_id'])) {
            redirect('/Login');
        }
        $this->load->model('Account_model');
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->config->load('rules');

        if (isset($_POST['update']))
            $this->form_validation->set_rules($this->config->item('update_account'));
        else if (isset($_POST['change']))
            $this->form_validation->set_rules($this->config->item('change_password'));

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('account', $_SESSION);
        } else {
            $_SESSION['success'] = true;
            if (isset($_POST['update'])) {
                $this->upload_image();
                $this->Account_model->update_account();
                $query = $this->Account_model->get_user($_SESSION['user_id']);
                $_SESSION['first_name'] = $query[0]['first_name'];
                $_SESSION['last_name'] = $query[0]['last_name'];
                $_SESSION['email'] = $query[0]['email'];
                $_SESSION['image'] = $query[0]['image_location'];
            }
            else if (isset($_POST['change'])){
                $this->Account_model->change_password($_SESSION['user_id']);
            }
            redirect('/Account');
        }
    }

    public function is_registered($str)
    {
        $query = $this->Account_model->get_user();
        if ($query) {
            if ($query[0]['user_id'] != $_SESSION['user_id'])
                return false;
            else
                return true;
        }
        return true;
    }

    public function validate_first_name($str)
    {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $str)) {
            return false;
        }

        return true;
    }

    public function validate_last_name($str)
    {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $str)) {
            return false;
        }

        return true;
    }


    public function upload_image()
    {
        if (isset($_FILES)) {
            if (isset($_FILES['user_profile'])) {
                switch ($_FILES['user_profile']['type']) {
                    case "image/jpeg":
                    case "image/svg+xml":
                    case "image/png":
                        $image_file = $_FILES['user_profile']['name'];
                        $file_extension = pathinfo($image_file, PATHINFO_EXTENSION);
                        $url = "http://localhost/axie-management-tracker/Home/get_image/?path=";
                        move_uploaded_file($_FILES['user_profile']['tmp_name'], 'uploads/profile/' . $_POST['user_id'] . "." . $file_extension);
                        $_POST['image_location'] = $url . 'uploads/profile/' . $_POST['user_id'] . "." . $file_extension;
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

    public function validate_password($str)
    {
        $uppercase = preg_match('@[A-Z]@', $str);
        $lowercase = preg_match('@[a-z]@', $str);
        $number    = preg_match('@[0-9]@', $str);
        $specialChars = preg_match('@[^\w]@', $str);


        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($str) < 8) {
            return false;
        }
        return true;
    }

    public function check_password($str)
    {
        $user = $this->Account_model->get_user($_SESSION['user_id']);
        $string = $str . $user[0]['user_id'];
        if (password_verify($string, $user[0]['password'])) {
            return true;
        } else
            return false;
    }
}
