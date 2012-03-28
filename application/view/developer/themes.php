<? load::view ( 'parts/header', array('title'=> 'Themes') );?>
	<div class="row">
		<div class="span3">
			<div class="well sidebar-nav">
				<? load::view ( 'parts/sidebar' );?>
			</div><!--/.well -->
		</div><!--/span-->
		<div class="span9">
			<h1>Hello, world!</h1>
			<p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
			<p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>
		</div><!--/span-->
	</div><!--/row-->
<? load::view ( 'parts/footer' );
?>