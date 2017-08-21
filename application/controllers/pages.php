<?php
	class Pages extends CI_Controller{
		
		
		function __construct() {
			parent::__construct();
						
			//call the activity logger helper
			$activity = logger();
		}	
		
		
		public function index(){			
			
			$this->load->view('templates/header');
			$this->load->view('pages/index');
			$this->load->view('templates/footer');			
		}
		
		public function welcome(){				
			
			if (!$this->session->userdata['logged_in']){				
				redirect('users/login');
			}
			
			//display redis data
			$redis_data = $this->redis->lrange($this->input->ip_address(), 0, $this->redis->llen($this->input->ip_address()));	
			$arr_data = array();
			foreach($redis_data as $data){				
				$arr_data['redis_data'][] = json_decode($data, true);				
			}
			
			$this->load->view('templates/header');
			$this->load->view('pages/welcome', $arr_data);
			$this->load->view('templates/footer');
			
		}		
		
		
	}

?>