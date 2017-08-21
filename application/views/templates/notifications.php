<?php
	if($this->session->flashdata('login_failed')){
		echo '<h4 class="alert alert-danger">'.$this->session->flashdata('login_failed').'</h4>';
	}
	
	if($this->session->flashdata('user_loggedin')){
		echo '<h4 class="alert alert-info">'.$this->session->flashdata('user_loggedin').'</h4>';
	}	

	if($this->session->flashdata('user_registered')){
		echo '<h4 class="alert alert-info">'.$this->session->flashdata('user_registered').'</h4>';
	}	

	if($this->session->flashdata('logged_out')){
		echo '<h4 class="alert alert-info">'.$this->session->flashdata('logged_out').'</h4>';
	}	
	
?>


