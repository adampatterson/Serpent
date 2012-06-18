<?php if(!defined('DINGO')){die('External Access to File Denied');}

config::set('db',array(
	
	/* Default Connection */
	'default'=>array(
	
		'driver'=>'mysql',       			// Driver
		'host'=>'localhost',     			// Host
		'username'=>'',      			// Username
		'password'=>'',          		// Password
		'database'=>''     	// Database
	
	)
	
));