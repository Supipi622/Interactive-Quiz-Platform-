<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PostAnswers extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('AnswersModel');
	}

	public function index()
	{
		$this->load->view('components/header');
		// $this->load->view('components/sidebar');
		$this->load->model('AnswersModel');
		$this->load->view('postAnswersView');
	}

	//create answers
	public function createAnswers() {
		$question_Id = $this->session->question_Id;
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			
			$question_Id = $this->input->post('question_Id');
			$answer_Description = $this->input->post('answer_Description');
			
			$data = $this->AnswersModel->insertAnswers($question_Id, $answer_Description);
			echo json_encode($data);
			redirect('ViewAnswers/displayAnswers/'.$question_Id);
		}	
	}

	//get answers from the database
	public function getAnswers($answerId){
		$this->load->model('AnswersModel');
		//$this->load->view('components/sidebar');
		$this->data['names'] = $this->AnswersModel->getAnswersById($answerId);
		$this->load->view('components/header');
		$this->load->view('editAnswers',$this->data);
	}

	//update answers 
	public function updateAnswer($answerId){
		$this->load->model('AnswersModel');
		$answer_Description = $this->input->post('answer_Description');
		$data['names'] = $this->AnswersModel->updateAnswers($answerId,$answer_Description);
		$this->load->view('editAnswers');
	}


	

	//up vote functions
	public function upvote($answer_Id) {
		$vote = $this->session->vote;
		$this->load->model('SignupLoginModel');
		if($this->SignupLoginModel->is_logged_in() == true) {
			$response = $this->AnswersModel->upVoteAnswers($answer_Id);
			$this->load->view('components/header');
			if(!$response) {
				$res = "204 HTTP_NO_CONTENT";
			} else {
				$res = "201 HTTP CREATED";
			}
		} else {
		$res = "401 Unauthorized";	
		}	
	}

	//down vote functions
	public function downvote($answer_Id) {
		$vote = $this->session->vote;
		$this->load->model('SignupLoginModel');
		if($this->SignupLoginModel->is_logged_in() == true) {
			$response = $this->AnswersModel->downVoteAnswers($answer_Id);
			$this->load->view('components/header');
			if(!$response) {
				$res = "204 HTTP_NO_CONTENT";
			} else {
				$res = "201 HTTP CREATED";
			}
		} else {
		$res = "401 Unauthorized";	
		}	
	}
	
}