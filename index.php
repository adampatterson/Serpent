<?php

error_reporting(E_STRICT|E_ALL);

require_once('system-variables.php');

// Application configuration
//----------------------------------------------------------------------------------------------

// Configuration
define('CONFIGURATION','development');

// Dingo Location
define('SYSTEM','system');

// Application Location
define('APPLICATION','application');

// Config Directory Location (in relation to application location)
define('CONFIG','config');

// Allowed Characters in URL
define('ALLOWED_CHARS','/^[ \!\,\~\&\.\:\+\@\-_a-zA-Z0-9]+$/');

define( 'CHECK_TIMEOUT', 5 );

define( 'CACHE_TIMEOUT', 2160 );

// End of configuration
//----------------------------------------------------------------------------------------------
define('DINGO',1);
require_once(SYSTEM.'/dingo.php');
bootstrap::run();