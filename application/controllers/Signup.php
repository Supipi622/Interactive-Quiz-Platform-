<?php 

class Signup extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('SignupLoginModel');
	}

	public function index()
	{
		
		$this->load->model('SignupLoginModel');
		$this->load->view('signupLogin_View');
	}
	

	//create an account when user sign in to the system
	public function createAcount() {
		// Validations
		$this->form_validation->set_rules('user_Name', 'user_name', 'required');
		$this->form_validation->set_rules('user_EmailAddress', 'user_emailAddress', 'required|valid_email');
		$this->form_validation->set_rules('user_Password', 'user_password', 'required');
	
		if ($this->form_validation->run() == FALSE) {
			// Validation failed, return the form with errors
			$this->load->view('signupLogin_View');
		} else {
			$this->SignupLoginModel->insertUsers();
			redirect('Login');
		}
	}
	
}