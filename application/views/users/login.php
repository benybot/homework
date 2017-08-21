<div class="row">

	<h1>Hello World!</h1>
	<br>

	<h4>Please login here</h4>	
	<br>
	<?=form_open('users/login')?>
		<div class="form-group">
			<label for="email">Email address</label>
			<input type="email" class="form-control" id="email" name="email" placeholder="Email">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Password">
		</div>		
		<div class="col-md-12 validation_errors">
			<small>
				<?=validation_errors()?>
			</small>	
		</div>	 		
		<button type="submit" class="btn btn-default">Sign in</button>
	</form>	
	<p>		
		<a href="<?=base_url()?>users/register">Register</a>
	</p>	

</div>


