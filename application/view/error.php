<? load::view ( 'parts/header', array('title'=> 'Thanks!') );?>
<div class="row-">
	<div class="span12">
		<form action="<?= BASE_URL; ?>action/login" method="post" accept-charset="utf-8" class="form-horizontal">
			<div class="alert alert-error">
				<h1>Busted!</h1>
				<p><strong>We did our best but something has gone wrong :(</strong></p>
				<p>If you got this after refreshing a confirmation page then yon simply login <a href="<?= BASE_URL ?>login">here</a>.</p>
				<a href="mailto:hello@tentaclecms.com" class="btn btn-danger">Contact us for help</a>
			</div>
		</form>
	</div>
</div><!--/row-->
<? load::view ( 'parts/footer' );?>