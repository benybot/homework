<div class="row">

	<h1>Register</h1>
	<br>
	<h4>Horray! One step closer to access exclusive contents.</h4>
	<br>
	
	<?=form_open('users/register')?>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?=set_value('email'); ?>">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" name="password" id="password" placeholder="Password">		
			<p class="help-block">*min of 8 characters</p>
		</div>
		<div class="form-group">
			<label for="password_confirm">Repeat Password</label>
			<input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Password">
		</div>
		<div class="form-group">
			<label for="fname">First Name</label>
			<input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" value="<?=set_value('fname'); ?>">
		</div>
		<div class="form-group">
			<label for="lname">Last Name</label>
			<input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" value="<?=set_value('lname'); ?>">
		</div>
		
		<div class="form-group">
			<label for="dob">Date Of Birth</label>
			<input type="text" class="form-control" name="dob" id="dob" placeholder="Date Of Birth" value="<?=set_value('dob'); ?>">
		</div>
		
		<div class="form-group">
			<label for="quotes">Favorite Quote</label>
			<textarea class="form-control" rows="3" class="form-control" name="quotes" id="quotes" placeholder="Favorite Quote"><?=set_value('quotes'); ?></textarea>
			
		</div>
	
		<div class="col-md-12 validation_errors">
			<small>
				<?=validation_errors()?>
			</small>	
		</div>	  
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
	
	
	
</div>