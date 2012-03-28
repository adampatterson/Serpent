<?php
/*
* Dingo system settings.
*/

define( 'CORE_ROOT'     , __DIR__ );
define( 'APP_PATH'      , CORE_ROOT );
	
	
/*
* Added for Tentacle
*/
if ($_SERVER["SERVER_PORT"] != '80' ):
	$port = ':'.$_SERVER["SERVER_PORT"];
else:
	$port = '';
endif;
	
if ( dirname($_SERVER['PHP_SELF'])  == '/' ):
	$directory = '';
else:
	$directory = dirname($_SERVER['PHP_SELF']);
endif;
	
define( 'DS'				, DIRECTORY_SEPARATOR );
	
// Application's Base URL
define('BASE_URI'      , $_SERVER['REQUEST_URI'].$port );

// @todo BASE_URL may need some testing in other environments
define('BASE_URL'      ,'http://'.$_SERVER["SERVER_NAME"].$port.$directory.'/' );

// Application's Base URL
define('ROOT'		   , BASE_URI );

// Admin's Base URL
define('ASSET_URL'     , BASE_URL.'assets/');
define('ASSET_URI'     , BASE_URI.'/assets/');

define('JS'   , ASSET_URL.'js/');
define('CSS'  , ASSET_URL.'css/');
define('IMG'  , ASSET_URL.'img/');
// Image Size
define('GRAVATAR_SIZE' , "60" );

define('TITLE'	, 'Serpent API');