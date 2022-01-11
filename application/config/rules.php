<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$config = array(
    'signup' => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|callback_validate_email',
            'errors' => array(
                'validate_email' => 'Invalid email format'
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
                'validate_password' => 'Password should be at least 8 characters in length 
                and should include at least one upper case letter, one number, and one special character.'
            )
        ),
        array(
            'field' => 'cpassword',
            'label' => 'Confirm password',
            'rules' => 'required|matches[password]'
        )
    )
);



