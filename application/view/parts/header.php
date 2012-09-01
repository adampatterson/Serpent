<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?= TITLE ?> - <?= $title ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Le styles -->
<link href="<?= CSS ?>bootstrap.css" rel="stylesheet">
<style type="text/css">
body {
padding-top: 60px;
padding-bottom: 40px;
}
.sidebar-nav {
padding: 9px 0;
}
</style>
<link href="<?= CSS ?>bootstrap-responsive.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<link rel="shortcut icon" href="../assets/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
</head>

<body>
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="<?= BASE_URL ?>"><?= TITLE ?></a>
			<div class="nav-collapse">
				
				<ul class="nav">
					<li><a href="https://github.com/adampatterson/Serpent/wiki" target="_blank">Help</a></li>
<? /* 
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
*/?>
				</ul>
				<? if ( user::valid() ): ?>
				<p class="navbar-text pull-right">Logged in as <a href="<?= BASE_URL ?>developer/profile"><?= user_name(); ?></a></p>
				<? endif; ?>		  
			</div><!--/.nav-collapse -->
		</div>
	</div>
</div>
<div class="container-fluid">