<? load::view ( 'parts/header', array('title'=> 'Register') );?>
	<div class="row">
		<div class="span9">
			<h1>Register a new Account</h1>
				<form action="<?= BASE_URL ?>action/add_profile" method="post" accept-charset="utf-8">
				<div class="row">
					<div class="span4 offset1">
						<fieldset>
							<legend>Account Details</legend>
							<div class="control-group">
								<label class="control-label" for="first_name">First Name</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="first_name" name="first_name">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="last_name">Last Name</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="last_name" name="last_name">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="email">Email</label>
								<div class="controls">
									<input type="email" class="input-xlarge" id="email" name="email" required="required">
									<p class="help-block"><small>This should match the email used in Github.</small></p>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="username">Username</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="username" name="username" required="required">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="password">Password</label>
								<div class="controls">
									<input type="password" class="input-xlarge" id="password" name="password" required="required">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="password2">Re-Type Password</label>
								<div class="controls">
									<input type="password" class="input-xlarge" id="password2" name="password2" required="required">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="location">Location</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="location" name="location">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="about_you">About You</label>
								<div class="controls">
									<textarea class="input-xlarge" id="about_you" name="about_you"></textarea>
								</div>
							</div>
						</fieldset>
					</div>
					<div class="span4">
						<fieldset>
							<legend>Github</legend>
							<div class="control-group">
								<label class="control-label" for="git_user">Username</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="git_user" name="git_user">
									<p class="help-block"><small>http://github.com/:username</small></p>
								</div>
							</div>
						</fieldset>
						<fieldset>
							<legend>Social Media</legend>
							<div class="control-group">
								<label class="control-label" for="twitter">Twitter Username</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="twitter" name="twitter">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="linkedin">Linkedin</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="linkedin" name="linkedin">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="forrst">Forrst</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="forrst" name="forrst">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="website">Website</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="website" name="website">
								</div>
							</div>
						</fieldset>
					</div>
				</div>
				<div class="form-actions">
					<button class="btn btn-success btn-large">Save</button>
				</div>
			</form>
		</div><!--/span-->
	</div><!--/row-->
<? load::view ( 'parts/footer' );
?>