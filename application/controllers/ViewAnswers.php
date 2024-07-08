<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ViewAnswers extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('AnswersModel');
		$this->load->view('components/Questionpageheader');
		$this->load->view('components/sidebar');
	}

	//display answers in the system
	public function displayAnswers($id)
	{
		$this->load->model('AnswersModel');
        $result= $this->data['names'] = $this->AnswersModel->getAnswerbyQuestionId($id);
		$this->load->view('answersView',$this->data);
	}
	
	//delete answers
	public function deleteRecords($id){
		$this->load->model('AnswersModel');
		$this->AnswersModel->deleteAnswers($id);
		redirect('QuestionsPage/loadData/');
		return true;
	}

	//up  vote 
	public function upvote($answerId) {
		$vote = $this->session->vote;
		$this->load->model('SignupLoginModel');
		$this->load->model('AnswersModel');
		$result = $this->data['names'] = $this->AnswersModel->getanswers($answerId);
		$response = $this->AnswersModel->upVoteAnswer($answerId);
		$this->load->view('answersView');
		redirect('QuestionsPage/loadData/');
	}

	//down  vote 
	public function downvote($answerId) {
		$vote = $this->session->vote;
		$this->load->model('SignupLoginModel');
		$result = $this->data['names'] = $this->AnswersModel->getanswers($answerId);
		$response = $this->AnswersModel->downVoteAnswer($answerId);
		$this->load->view('answersView');
		redirect('QuestionsPage/loadData/');
	}	

	//update answers 
	public function editAnswer($answerId){
		$this->load->view('components/header');
		$this->load->model('AnswersModel');
		$answer = $this->input->post('answer_Description');
		$data['names'] = $this->AnswersModel->updateAnswers($answerId,$answer);
		$this->load->view('editAnswers');
	}
			
}