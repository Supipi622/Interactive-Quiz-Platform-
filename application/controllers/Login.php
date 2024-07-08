<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login  extends CI_Controller {

    public function index() {
        $this->load->view('loginView');
        $this->load->model('SignupLoginModel');
    }

public function loginValidation() {
        // Load the Login model
        $this->load->model('SignupLoginModel');

       // Validate the form submission
       $this->form_validation->set_rules('user_EmailAddress', 'user_emailAddress', 'required|valid_email');
       $this->form_validation->set_rules('user_Password', 'user_password', 'required');

       $msg['error_message'] = "";

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, return the form with errors
            $this->load->view('loginView');
        } else {
            // Validation succeeded, check the user's credentials
            $user_EmailAddress = $this->input->post('user_EmailAddress');
            $user_Password = $this->input->post('user_Password');

			 if ($this->SignupLoginModel->getUsers($user_EmailAddress,$user_Password)){
                $this->session->is_logged_in = true;
                $this->session->user_EmailAddress = $user_EmailAddress;
                redirect('QuestionsPage/loadData');
                echo "successfully logging to the system";
                
            } else {
                // Login failed, display an error message
                $this->session->login_error = True;
                $msg['error_message'] = "Invalid email or password";
                
            }
        }
        $this->load->view('loginView', $msg);  
    }
    
    //logout function
	public function logout(){
        $this->session->sess_destroy();
        redirect('Login');
    }
      
}