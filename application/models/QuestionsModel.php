<?php

class QuestionsModel extends CI_Model {

	//insert questions to the database
	public function insertQuestions($useremail, $question_Title, $question_Description) {
		$user_Id = $this->db->select('user_Id')->get_where('user', array('user_EmailAddress' => $useremail))->result()[0]->user_Id;
		$this->db->set('user_Id', $user_Id);
		$this->db->set('question_Title', $question_Title);
		$this->db->set('question_Description', $question_Description);
		$this->db->insert('question');
	}

	//function to display the questions
	public function displayQuestions() {
		$this->db->select("*");
		$this->db->from('question');

		$query = $this->db->get();
		
		return $query->result();
		
		$num_data_returned = $query->num_rows;
		
		if ($num_data_returned < 1) {
			
			echo "There is no data in the database";
			exit(); }
	}

	//delete questions
	public function deleteQuestions($question_Id) {
		$this->db->select('*');
		$this->db->from('question');
		$this->db->join('answer','question.question_Id=answer.question_Id');
		$this->db->where('question.question_Id',$question_Id);
		$this->db->delete('question');
		
	}

	//get questions from id
	public function getQuestionsById($questionId){
		$this->db->where('question_Id', $questionId);
		$query = $this->db->get('question');
		return $query->result();
		$num_data_returned = $query->num_rows();
		
		if ($num_data_returned < 1) {
			
			echo "There is no data in the database";
			exit(); }
	}

	//update questions
	public function updateQuestion($useremail,$questionId,$questionTitle, $questionDescription){
		$user_Id = $this->db->select('user_Id')->get_where('user', array('user_EmailAddress' => $useremail))->result()[0]->user_Id;
		$this->db->where('question_Id', $questionId);
		$this->db->set('user_Id',$user_Id);
		$this->db->set( 'question_Title',$questionTitle);
		$this->db->set( 'question_Description',$questionDescription);
		$this->db->update('question');
		
	}

	

	//search function
	public function searchQuestion($keywords) {
        $this->db->like('question_Title', $keywords);
        $this->db->or_like('question_Description', $keywords);
        $query = $this->db->get('question');
        return $query->result();
    }
	
}
	
	
