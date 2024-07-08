<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Help extends CI_Controller {

    function __construct() {
		parent::__construct();
		$this->load->database();
	}

public function index() {
        // Load the help  view
        $this->load->view('components/header');
        $this->load->view('HelpView');
     
    }
}