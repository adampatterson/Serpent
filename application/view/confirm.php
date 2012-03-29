<? load::view ( 'parts/header', array('title'=> 'Thanks!') );?>
<div class="row-">
	<div class="span12">
		<form action="<?= BASE_URL; ?>action/login" method="post" accept-charset="utf-8" class="form-horizontal">
			<fieldset>
				<div class="alert alert-success">
					<h1>You're all set!</h1>
					<p><strong>Login to submit your extensions.</strong></p>
				</div>
				<div class="control-group">
					<div class="controls">
						<input class="span3" id="appendedPrependedInput" size="16" placeholder="Username" name="username">
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<input class="span3" id="appendedPrependedInput" size="16" type="password" placeholder="Password" name="password">
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<button type="submit" class="btn btn-primary">Login</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div><!--/row-->
<? load::view ( 'parts/footer' );?>