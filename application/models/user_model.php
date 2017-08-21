<?php 
	class User_model extends CI_Model{
		
		public function register($password){					
			$data = array(
				'email' => $this->input->post('email'),
				'password' => $password,
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname')
			);			
			$this->db->insert('users', $data);
			
			$data1 = array(
				'user_id' => $this->db->insert_id(),
				'dob' => $this->input->post('dob'),
				'quotes' => $this->input->post('quotes')
			);
			return $this->db->insert('user_details', $data1);
			
		}
		
		public function login($email, $password){					
			$this->db->where('email', $email);
			$this->db->where('password', $password);
			
			$this->db->join('user_details', 'user_details.user_id = users.id');	
			$result = $this->db->get('users');
			
			if($result->num_rows() == 1){
				$data = array(
					'user_id' => $result->row(0)->id,
					'fname' => $result->row(0)->fname,
					'lname' => $result->row(0)->lname,
					'dob' => $result->row(0)->dob,
					'quotes' => $result->row(0)->quotes,
				);				
				return $data;
			} else {
				return false;
			}			
		}
		
		
	}
?>