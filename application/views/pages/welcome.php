<div class="row">

	<h1>Welcome <?=$this->session->userdata['fname']?>!</h1>
	<br>
	<h4>Below are your details:</h4>	
	<ul class="user_details">
		<li>First Name: <span><?=$this->session->userdata['fname']?></span></li>
		<li>Last Name: <span><?=$this->session->userdata['lname']?></span></li>
		<li>Email: <span><?=$this->session->userdata['email']?></span></li>
		<li>Date of Birth: <span><?=$this->session->userdata['dob']?></span></li>
		<li>Favorite Quote: <span><?=$this->session->userdata['quotes']?></span></li>
	</ul>
	<br>
	<h4>User Logs</h4>
	<ul class="user_details">
	<?php
		if(empty($redis_data)){
			echo '<li><span>Redis data not found.</span></li>';
		} else {
			krsort($redis_data);
			foreach($redis_data as $key=>$val){			
				echo '<li><span>#'.($key + 1).'</span></li>';
				
				echo '<li>Action: <span>' . $val['class_name'] . '/' . $val['method_name'] . '</span></li>';
				echo '<li>Time: <span>'. date(DATE_RSS , strtotime($val['time'])) .'</span></li>';
					
				echo '<br>';
			}		
		}
	?>
	</li>

</div>