<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SignupLoginModel extends CI_Model {

    //function to insert users to the database
	 public function insertUsers() {
		$data = array(
			'user_Name' => $this->input->post('user_Name'),
			'user_EmailAddress' => $this->input->post('user_EmailAddress'),
			'user_Password' => password_hash($this->input->post('user_Password'), PASSWORD_DEFAULT)
		);
		// Insert the new user into the database
		$this->db->insert('user', $data);

	}
	
    //get user data from the database
    public function getUsers($user_EmailAddress,$user_Password){
        $response = $this->db->get_where('user',array('user_EmailAddress' => $user_EmailAddress));
        if ($response->num_rows() != 1) {
            return false;
        }
        else {
            $row = $response->row();
            if (password_verify($user_Password,$row->user_Password)) {
                $session_id = $this->session->session_id;
                $ip_address = $this->input->ip_address();
                $date = date_create();
                $timestamp = date_timestamp_get($date);
                $this->db->insert('ci_sessions', array('id' => $session_id, 'ip_address' => $ip_address, 'timestamp' => $timestamp, 'data' => $session_id));
                return true;
            }
            else {
                return false;
            }
        }
        
    }

    public function userDetails(){
        $response = $this->db->get_where('user',array('user_EmailAddress' => $user_EmailAddress),array('user_Name' => $user_Name));
		$query = $this->db->get();
		return $query->result();
		$num_data_returned = $query->num_rows;
		if ($num_data_returned < 1) {
			echo "There is no data in the database";
			exit(); 	    
        }
    }


    //check whether if user logging to the system
	public function is_loggedin(){
        $session_id = $this->session->session_id;
        $res = $this->db->get_where('ci_sessions', array('id' => $session_id));
        if ($res->num_rows() == 1) {
            return True;
        }
        else {
            return False;
        }
    }

}
	
	
