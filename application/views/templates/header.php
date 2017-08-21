<html>
	<head>
		<title>Hello World</title>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<link rel="stylesheet" href="/resources/demos/style.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script>
		$( function() {
		$( "#dob" ).datepicker({
			  showAnim: "slideDown",
			  dateFormat: "yy-mm-dd"
			});
		} );
		</script>		
		<link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
	</head>
	<body>
	
		<nav class="navbar navbar-inverse">
			<div class="container">
				<div id="navbar">
					<ul class="nav navbar-nav">
						<li>
							<a href="<?=base_url()?>">Home</a>
						</li>
						<li>
							<a href="<?=base_url()?>welcome">Members Only</a>
						</li>
					</ul>
				</div>
				
				<?php
					if(!empty($this->session->userdata['logged_in']) && $this->session->userdata['logged_in']){
						echo '<li class="btn btn-info">';
							echo '<a href="'.base_url().'users/logout">Logout</a>';
						echo '</li>';
					}	
				?>
			</div>
		</nav>
		<div class="container">
		
		<?php 
			$this->view('templates/notifications');
		?>