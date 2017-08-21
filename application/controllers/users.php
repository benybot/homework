<?php
	class Users extends CI_Controller{
		
		function __construct() {
			parent::__construct();
						
			//call the activity logger helper
			$activity = logger();
		}		
		
		public function login(){
			
			if (!empty($this->session->userdata['logged_in']) && $this->session->userdata['logged_in']){				
				redirect('welcome');
			}		
			
			//validation rules			
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required');

			//data execution	
			if ($this->form_validation->run() == FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/login');
				$this->load->view('templates/footer');
			} else {
				//get email
				$email = $this->input->post('email');				
				//get password				
				//$password = md5($this->input->post('password'));
				$password = hash('sha256', $this->input->post('password'));
				
				//login user
				$user_data = $this->user_model->login($email, $password);
				if(!empty($user_data)){
					//create session
					$user_data = array(
						'user_id' => $user_data['user_id'],
						'email' => $email,
						'fname' => ucfirst($user_data['fname']),
						'lname' => ucfirst($user_data['lname']),
						'dob' => ucfirst($user_data['dob']),
						'quotes' => ucfirst($user_data['quotes']),
						'logged_in' => true,
						'login_time' => date('Y-m-d H:i:s')
					);
										
					$this->session->set_userdata($user_data);
															
					// setting redis data
/* 					$redis_key = $user_data['email'];
					$logs = array(						
						'login' => $this->session->userdata['login_time'],
						'logout' => null						
					);															
					$this->redis->rpush($redis_key, json_encode($logs)); */
					
					
					//set the flash message
					$this->session->set_flashdata('user_loggedin', 'You are now logged in.');
					redirect(base_url().'welcome');	
				} else {
					//set the flash message
					$this->session->set_flashdata('login_failed', 'Login failed.');
					redirect(base_url().'users/login');					
				}
				
				
			}

		}
		
		
		public function logout(){
/* 			// setting redis data
			$redis_key = $this->session->userdata['email'];
			$logs = array(						
				'login' => $this->session->userdata['login_time'],
				'logout' => date('Y-m-d H:i:s'),		
			);	 */		
			$this->redis->rpop($redis_key);			
			$this->redis->rpush($redis_key, json_encode($logs));			
			
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('logged_in');
			
			//set the flash message
			$this->session->set_flashdata('logged_out', 'You are now logged out.');
			redirect(base_url().'users/login');	
			
		}
		
		public function register(){
				
			if (!empty($this->session->userdata['logged_in']) && $this->session->userdata['logged_in']){				
				redirect('welcome');
			}	
			
			//validation rules
			$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');			
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');			
			$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|required|matches[password]');
			
			//data execution	
			if ($this->form_validation->run() == FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/register');
				$this->load->view('templates/footer');
			} else {				
				//$password = md5($this->input->post('password'));
				$password = hash('sha256', $this->input->post('password'));
				
				$this->user_model->register($password);
				
				//set the flash message
				$this->session->set_flashdata('user_registered', 'You are now registered.');
				redirect(base_url().'users/login');
			}
			
			
			
			
		}		
		
		
	}

?>