<? load::view ( 'parts/header', array('title'=> 'Plugins') );?>
	<div class="row">
		<div class="span3">
			<div class="well sidebar-nav">
				<? load::view ( 'parts/sidebar' );?>
			</div><!--/.well -->
		</div><!--/span-->
		<div class="span9">
			<h1>Your Plugins</h1>
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
					foreach ( $plugins as $plugin ):?>
					<tr>
						<td><?= $plugin->extension_name ?></td>
						<td><?= $plugin->version ?></td>
						<td><?= $plugin->added_on ?></td>
						<td><a href="<?= BASE_URL?>developer/update_extension/<?= $plugin->extension_slug ?>" class="btn btn-primary"><i class="icon-pencil icon-white"></i> Edit</a> <a href="<?= BASE_URL?>developer/version/<?= $plugin->extension_slug ?>" class="btn btn-success"><i class="icon-refresh icon-white"></i> Version</a></td>
					</tr>
					<? endforeach; ?>
				</tbody>
			</table>
			<p><a class="btn btn-primary btn-large" href="<?= BASE_URL ?>/developer/dashboard/">Submit a New Extension</a></p>
		</div><!--/span-->
	</div><!--/row-->
<? load::view ( 'parts/footer' );
?>