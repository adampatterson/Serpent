<? load::view ( 'parts/header', array('title'=> 'Submit a new Version') );?>
<div class="row">
	<div class="span3">
		<div class="well sidebar-nav">
			<? load::view ( 'parts/sidebar' );?>
		</div>
		<!--/.well --> 
	</div>
	<!--/span-->
	<div class="span9">
		<h1>Version an Extension</h1>
			<form action="<?= BASE_URL ?>action/version_extension" method="post" accept-charset="utf-8" class="form-horizontal">
			<input type="hidden" name="exension_revision" value="<?= $extension->revision ?>">
			<input type="hidden" name="old_id" value="<?= $extension->id ?>">
			<input type="hidden" name="added_on" value="<?= $extension->added_on ?>">
			<input type="hidden" name="repo_name" value="<?= $extension->repo_name ?>">
			<input type="hidden" name="extension_slug" value="<?= $extension->extension_slug ?>">
			<div class="row">
				<div class="span4">
					<fieldset>
						<legend>Details</legend>
						<div class="control-group">
							<label class="control-label" for="extension_name">Extension Name</label>
							<div class="controls">
								<input type="text" class="input-xlarge" id="extension_name" name="extension_name" value="<?= $extension->extension_name ?>" >
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="website">Website</label>
							<div class="controls">
								<input type="text" class="input-xlarge" id="website" name="website" value="<?= $extension->website ?>">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Extension Type</label>
							<div class="controls">
								<label class="radio">
									<input type="radio" name="extension_type" id="theme" value="theme" <?= checked( 'theme', $extension->extension_type ) ?>>
									Theme
								</label>
								<label class="radio">
									<input type="radio" name="extension_type" id="plugin" value="plugin" <?= checked( 'plugin', $extension->extension_type ) ?>>
									Plugin
								</label>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="description">Description</label>
							<div class="controls">
								<textarea class="input-xlarge" id="description" name="description"><?= $extension->description ?></textarea>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Version</label>
							<div class="controls">
								<? foreach ( $tags as $tag ): ?>
									<label class="radio">
										<input type="radio" name="version" id="theme" value="<?= $tag ?>" <?= checked( $tag, $extension->version ) ?>>
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
				<button class="btn btn-success btn-large">Add a new Version</button>
			</div>
		</form>
	</div><!--/span-->
</div><!--/row-->
<? load::view ( 'parts/footer' );
?>