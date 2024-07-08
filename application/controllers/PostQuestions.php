<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PostQuestions extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('QuestionsModel');
	}

	public function index()
	{
		$this->load->view('components/header');
		$this->load->view('postQuestionsView');
	}
	
	//create questions
	public function createQuestions() {
		$useremail = $this->session->user_EmailAddress;
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$question_Title = $this->input->post('question_Title');
			$question_Description = $this->input->post('question_Description');
			
			$data = $this->QuestionsModel->insertQuestions($useremail, $question_Title, $question_Description);
			echo json_encode($data);
			redirect('QuestionsPage/loadData');
		}
	
}
	
}