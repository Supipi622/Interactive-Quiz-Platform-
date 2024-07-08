<?php

class AnswersModel extends CI_Model {

	public function insertAnswers($question_Id, $answer_Description) {
		$this->db->set('question_Id', $question_Id);
		$this->db->set('answer_Description', $answer_Description);
		$this->db->insert('answer');
	}

	//get answers from question id
	public function getAnswerbyQuestionId($quesId){
		$this->db->select('*');
		$this->db->from('answer');
		$this->db->join('question','answer.question_Id=question.question_Id');
		$this->db->where('question.question_Id',$quesId);

		$query = $this->db->get();
		return $query->result();
    	$num_data_returned = $query->num_rows();
		if ($num_data_returned < 1) {
			echo "There is no data in the database";
			exit(); 
		}
	}

	//delete answers
	public function deleteAnswers($answer_Id) {
		$this->db->where('answer_Id', $answer_Id);
		$this->db->delete('answer');
	}

	//up vote answers function
	public function upVoteAnswer($answer_Id) {
		$count_upvote = $this->db->select('up_Vote')->get_where('answer', array('answer_Id' => $answer_Id))->result()[0]->up_Vote;
		$count_upvote = $count_upvote + 1;
			$this->db->where(array('answer_Id' => $answer_Id));
			if ($this->db->update('answer', array('up_Vote' => $count_upvote))){
				return True;
			}
			else {
				return False;
			}
	}

	//down vote function
	public function downVoteAnswer($answer_Id) {
		$count_downvote = $this->db->select('down_Vote')->get_where('answer', array('answer_Id' => $answer_Id))->result()[0]->down_Vote;
		$count_downvote =$count_downvote + 1;
		$this->db->where(array('answer_Id' => $answer_Id));
		if ($this->db->update('answer', array('down_Vote' =>$count_downvote))){
			 return True;
		
		} else {
			return False;
		}
	}

	//get answers from id
	public function getAnswersById($answerId){
		$this->db->where('answer_Id', $answerId);
		$query = $this->db->get('answer');
		return $query->result();

		$num_data_returned = $query->num_rows();
		if ($num_data_returned < 1) {
			echo "There is no data in the database";
			exit(); }
	}

	//update answers
	public function updateAnswers($answerId,$answerDescription){
		$this->db->where('answer_Id', $answerId);
		$this->db->set( 'answer_Description',$answerDescription);
		$this->db->update('answer');
		
	}

	public function getanswers($answerId){
		$ques_id = $this->db->select('question_Id')->get_where('answer', array('answer_Id' => $answerId))->result()[0]->question_Id;
		$this->db->select('*');
		$this->db->from('answer');
		$this->db->join('question','answer.question_Id=question.question_Id');
		$this->db->where('question.question_Id',$ques_id);
		$query = $this->db->get();
		
		return $query->result();
	
    	$num_data_returned = $query->num_rows();
		if ($num_data_returned < 1) {
			echo "There is no data in the database";
			exit(); }
	}

	}
	
	
