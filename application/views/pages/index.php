<div class="row">

	<h1>Hello World!</h1>
	<br>
	
	<?php
		if(!empty($this->session->userdata['logged_in']) && $this->session->userdata['logged_in']){
		?>
			<h4>What's up <?=$this->session->userdata['fname']?>, how is your day so far?</h4>
			<br>
			<p>
				We are cooking something up, so please come back soon.
			</p>		
		<?php
		} else {
		?>
			<h4>Want to see more? Register to access exclusive contents.</h4>
			<br>
			<p>
			<a href="<?=base_url()?>users/login">Login</a>
			&nbsp;&nbsp;|&nbsp;&nbsp;
			<a href="<?=base_url()?>users/register">Register</a>
			</p>		
		<?php
		}	
	?>	
	

</div>