<? load::view ( 'parts/header', array('title'=> 'Core') );?>
	<div class="row-fluid">
		<div class="span3">
			<div class="well sidebar-nav">
				<? load::view ( 'parts/sidebar' );?>
			</div><!--/.well -->
		</div><!--/span-->
		<div class="span9">
			<h1>Core Updates</h1>
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
					foreach ( $core as $core ):?>
					<tr>
						<td><?= $core->extension_name ?></td>
						<td><?= $core->version ?></td>
						<td><?= time_ago_in_words( $core->added_on ); ?></td>
						<td><a href="<?= BASE_URL?>developer/edit/core" class="btn btn-primary"><i class="icon-pencil icon-white"></i> Edit</a> <a href="<?= BASE_URL?>developer/version/core" class="btn btn-success"><i class="icon-refresh icon-white"></i> Version</a></td>
					</tr>
					<? endforeach; ?>
				</tbody>
			</table>
		</div><!--/span-->
	</div><!--/row-->
<? load::view ( 'parts/footer' );
?>