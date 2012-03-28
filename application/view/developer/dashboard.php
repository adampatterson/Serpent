<? load::view ( 'parts/header', array('title'=> 'Dashboard') );?>
	<div class="row">
		<div class="span3">
			<div class="well sidebar-nav">
				<? load::view ( 'parts/sidebar' );?>
			</div><!--/.well -->
		</div><!--/span-->
		<div class="span9">
			<h1>Hello, <?= user_name();?>!</h1>
			<h3>Public Repositories</h3>
				<?
				$github = load::model ( 'git' );

				$git_user = $github->repos();
				
				echo '<pre>';
				print_r($git_user);
				echo '</pre>';
				?>
		</div><!--/span-->
	</div><!--/row-->
<? load::view ( 'parts/footer' );
?>