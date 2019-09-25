<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Admin_Controller 
{

	// public function __construct()
	// {
	// 	parent::__construct();

	// }

	/* 
		Check if the login form is submitted, and validates the user credential
		If not submitted it redirects to the login page
	*/
	public function login(){

		$this->logged_in();

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == TRUE) {
            // true case
           	$username_exists = $this->model_auth->check_username($this->input->post('username'));

           	if($username_exists == TRUE) {
           		$login = $this->model_auth->login($this->input->post('username'), $this->input->post('password'));

           		if($login) {

					   // Check if user's account has been activated or not
					   if($login['active'] == 0){
							//  account not activated, display error message with redirect link to payment page.
							$this->session->set_flashdata('account_inactive', 'Your account is yet to be activated, Kindly pay for your registration to activate your account');
							redirect('account/payregistration/'.$login['username'].'', 'refresh');

					   }elseif($login['active'] == 1) {
							//  account activated, create session variables, loggin user
							$logged_in_sess = array(
							'id' => $login['id'],
								'username'  => $login['username'],
								// 'email'     => $login['email'],
								'logged_in' => TRUE
							);
		
							$this->session->set_userdata($logged_in_sess);
							redirect('dashboard', 'refresh');
					   }
           		}
           		else {
					$this->data['title'] = 'Login';
           			$this->data['errors'] = 'Incorrect username/password combination';
           			$this->load->view('login', $this->data);
           		}
           	}
           	else {
				$this->data['title'] = 'Login';

           		$this->data['errors'] = 'Username does not exists';
				
           		$this->load->view('login', $this->data);
           	}	
        }
        else {
			$this->data['title'] = 'Login';
            // false case
            $this->load->view('login', $this->data);
        }	
	}

	/*
		clears the session and redirects to login page
	*/
	public function logout(){
		$this->session->sess_destroy();
		redirect('auth/login', 'refresh');
	}


	// ===================================================
	// Admin Related
	// ===================================================
	public function admin_login(){

		// $this->admin_logged_in();

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == TRUE) {
            // true case
           	$username_exists = $this->Model_auth->check_admin_username($this->input->post('username'));

           	if($username_exists == TRUE) {
           		$login = $this->Model_auth->admin_login($this->input->post('username'), $this->input->post('password'));

           		if($login) {

					$logged_in_sess = array(
						'admin_id' => $login['id'],
						'admin_username'  => $login['username'],
							// 'email'     => $login['email'],
						'admin_logged_in' => TRUE
					);
	
						$this->session->set_userdata($logged_in_sess);
						redirect('admin', 'refresh');
           		}
           		else {
					$this->data['title'] = 'Admin Login';
           			$this->data['errors'] = 'Incorrect username/password combination';
           			$this->load->view('admin/login', $this->data);
           		}
           	}
           	else {
				$this->data['title'] = 'Admin Login';

           		$this->data['errors'] = 'Username does not exists';
				
           		$this->load->view('admin/login', $this->data);
           	}	
        }
        else {
			$this->data['title'] = 'Admin Login';
            // false case
            $this->load->view('admin/login', $this->data);
        }	
	}

	public function admin_logout(){
		$this->session->sess_destroy();
		redirect('auth/admin_login', 'refresh');
	}

	

}
