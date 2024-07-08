<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;
require APPPATH . '/libraries/REST_Controller.php';

class QuestionsPage extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('QuestionsModel');
		$this->load->model('SignupLoginModel');
	}

	public function index(){
		$this->load->view('questionsView.php');
		
	}
	
	//load questions
	public function loadData(){
		$this->load->view('components/QuestionPageheader');
		$this->load->view('components/sidebar');
		$this->data['names'] = $this->QuestionsModel->displayQuestions();
		$this->load->view('questionsView', $this->data);
		
	}

	public function displayLoadData(){
		$this->data['details'] = $this->SignupLoginModel->userDetails();
		$this->load->view('questionsView', $this->data);
		
	}

	//delete questions
	public function deleteRecords($id){
		$this->load->model('QuestionsModel');
		$this->QuestionsModel->deleteQuestions($id);
		redirect('QuestionsPage/loadData/');
		return true;
	}

	//display questions
	public function getQuestion($questionId){
		$this->load->model('QuestionsModel');
		$this->data['questions'] = $this->QuestionsModel->getQuestionsById($questionId);
		$this->load->view('components/header');
		$this->load->view('editQuestions',$this->data);
	}

	//update questions function
	public function editQuestion($questionId){
		$this->load->view('components/header');
			$useremail = $this->session->user_EmailAddress;
	    	$questionTitle = $this->input->post('question_Title');
			$questionDescription = $this->input->post('question_Description');
			$data['questions'] = $this->QuestionsModel->updateQuestion($useremail,$questionId, $questionTitle, $questionDescription);
			$this->load->view('editQuestions');
			redirect('QuestionsPage/loadData');
	}

	//search questions function
	public function search() {
		$this->load->view('components/header');
		$keywords = $this->input->post('keywords');
		$this->load->model('QuestionsModel');
		$data['results'] = $this->QuestionsModel->searchQuestion($keywords);
		$this->load->view('searchContents', $data);
	}
	
}