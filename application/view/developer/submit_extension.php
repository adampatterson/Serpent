<? load::view ( 'parts/header', array('title'=> 'Submit an Extension') );?>
<div class="row-fluid">
	<div class="span3">
		<div class="well sidebar-nav">
			<? load::view ( 'parts/sidebar' );?>
		</div>
		<!--/.well --> 
	</div>
	<!--/span-->
	<div class="span9">
		<h1>Submit an Extension</h1>
			<form action="<?= BASE_URL ?>action/submit_extension" method="post" accept-charset="utf-8" class="form-horizontal">
			<input type="hidden"  name="repo_name" value="<?= $repo->name ?>" >
			<div class="row-fluid">
				<div class="span4">
					<fieldset>
						<legend>Details</legend>
						<div class="control-group">
							<label class="control-label" for="extension_name">Extension Name</label>
							<div class="controls">
								<input type="text" class="input-xlarge" id="extension_name" name="extension_name" value="<?= $repo->name ?>" >
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="website">Website</label>
							<div class="controls">
								<input type="text" class="input-xlarge" id="website" name="website" value="<?= $repo->html_url ?>">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Extension Type</label>
							<div class="controls">
								<label class="radio">
									<input type="radio" name="extension_type" id="theme" value="theme" checked="">
									Theme
								</label>
								<label class="radio">
									<input type="radio" name="extension_type" id="plugin" value="plugin">
									Plugin
								</label>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="description">Description</label>
							<div class="controls">
								<textarea class="input-xlarge" id="description" name="description"><?= $repo->description ?></textarea>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Version</label>
							<div class="controls">
								<? foreach ( $tags as $tag ): ?>
									<label class="radio">
										<input type="radio" name="version" id="theme" value="<?= $tag ?>" checked="">
										<?= $tag ?>
									</label>
								<?  endforeach; ?>
								<p class="help-block"><small>The version number is set via <a href="http://learn.github.com/p/tagging.html" target="_blank">Git tags</a>, and should follow the <strong>&lt;major&gt;.&lt;minor&gt;.&lt;patch&gt;</strong> convention.</small></p>
							</div>
						</div>
					</fieldset>
				</div>
			</div>
			<div class="form-actions">
				<button class="btn btn-success btn-large">Add a new Extension</button>
			</div>
		</form>
	</div><!--/span-->
</div><!--/row-->
<? load::view ( 'parts/footer' );
?>