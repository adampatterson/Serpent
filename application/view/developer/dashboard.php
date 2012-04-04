<? load::view ( 'parts/header', array('title'=> 'Dashboard') );?>
	<div class="row">
		<div class="span3">
			<div class="well sidebar-nav">
				<? load::view ( 'parts/sidebar' );?>
			</div><!--/.well -->
		</div><!--/span-->
		<div class="span9">
			<h2>Public Repositories</h2>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Name</th>
						<th>Description</th>
						<th>Last Updated</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<? foreach ($git_repos as $repo):?>

					<? if ( !hide_extension( $repo->name ) ) { ?>
						<tr>
							<td><?= $repo->name ?></td>
							<td><?= $repo->description ?></td>
							<td><?= $repo->pushed_at ?></td>
							<td><a href="<?= BASE_URL?>action/hide_extension/<?= $repo->name ?>" class="btn"><i class="icon-exclamation-sign"></i> Hide This</a> <a href="<?= BASE_URL?>developer/submit_extension/<?= $repo->name ?>" class="btn btn-primary"><i class="icon-plus icon-white"></i> Add This</a></td>
						</tr>
					<?	} ?>
					<? endforeach; ?>
				</tbody>
			</table>
		</div><!--/span-->
	</div><!--/row-->
<? load::view ( 'parts/footer' );
?>