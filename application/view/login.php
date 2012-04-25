<? load::view ( 'parts/header', array('title'=> 'Login') );?>
<div class="row-fluid">
	<div class="span12">
		<form action="<?= BASE_URL; ?>action/login" method="post" accept-charset="utf-8" class="form-horizontal">
			<fieldset>
				<legend>Login</legend>
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
						<button type="submit" class="btn btn-primary">Login</button> or <a href="<?= BASE_URL ?>register" class="btn">Register</a>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div><!--/row-->
<? load::view ( 'parts/footer' );?>