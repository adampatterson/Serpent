<? load::view ( 'parts/header', array('title'=> 'Themes') );?>
	<div class="row">
		<div class="span3">
			<div class="well sidebar-nav">
				<? load::view ( 'parts/sidebar' );?>
			</div><!--/.well -->
		</div><!--/span-->
		<div class="span9">
			<h1>Your Themes</h1>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Name</th>
						<th>Version</th>
						<th>Added</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<? 
					foreach ( $themes as $theme ):?>
					<tr>
						<td><?= $theme->extension_name ?></td>
						<td><?= $theme->version ?></td>
						<td><?= $theme->added_on ?></td>
						<td><a href="<?= BASE_URL?>developer/update_extension/<?= $theme->extension_slug ?>" class="btn btn-primary"><i class="icon-pencil icon-white"></i> Edit</a> <a href="<?= BASE_URL?>developer/update_extension/<?= $theme->extension_slug ?>" class="btn btn-success"><i class="icon-refresh icon-white"></i> Version</a></td>
					</tr>
					<? endforeach; ?>
				</tbody>
			</table>
			<p><a class="btn btn-primary btn-large" href="<?= BASE_URL ?>/developer/dashboard/">Submit an Extension &raquo;</a></p>
		</div><!--/span-->
	</div><!--/row-->
<? load::view ( 'parts/footer' );
?>