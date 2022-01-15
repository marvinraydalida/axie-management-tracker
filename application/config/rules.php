<?php
defined('BASEPATH') or exit('No direct script access allowed');
$config = array(
    'signup' => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email|callback_is_registered',
            'errors' => array(
                'is_registered' => 'The email is already registered.'
            )
        ),
        array(
            'field' => 'first_name',
            'label' => 'First name',
            'rules' => 'required|callback_validate_first_name|min_length[2]|max_length[26]',
            'errors' => array(
                'validate_first_name' => 'Only letters and white space allowed in first name'
            )
        ),
        array(
            'field' => 'last_name',
            'label' => 'Last name',
            'rules' => 'required|callback_validate_last_name|min_length[2]|max_length[26]',
            'errors' => array(
                'validate_last_name' => 'Only letters and white space allowed in last name'
            )
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|callback_validate_password',
            'errors' => array(
                'validate_password' => 'Password must contain at least 8 charactes, including UPPER/lower case, number and special characters.'
            )
        ),
        array(
            'field' => 'cpassword',
            'label' => 'Confirm password',
            'rules' => 'required|matches[password]'
        )
    ),
    'login' => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|callback_registered_email',
            'errors' => array(
                'registered_email' => 'Wrong Credentials or not registered.'
            )
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'callback_check_password',
            'errors' => array(
                'check_password' => 'Wrong password.'
            )
        ),
    )

);
