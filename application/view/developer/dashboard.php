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
					</tr>
				</thead>
				<tbody>
					<? foreach ($git_repos as $repo):?>
					<tr>
						<td><?= $repo->name ?></td>
						<td><?= $repo->description ?></td>
						<td><?= $repo->pushed_at ?></td>
					</tr>
					<? endforeach; ?>
				</tbody>
			</table>
		</div><!--/span-->
	</div><!--/row-->
<? load::view ( 'parts/footer' );
?>