<?php if(!defined('DINGO')){die('External Access to File Denied');}


// Default Route
route::set('default_route','developer');

//route::set('main/([a-zA-Z]+)/([a-zA-Z]+)',array('controller'=>'$1','function'=>'awesome','arguments'=>array('$2')));
//route::set('one/([a-zA-Z]+)/([a-zA-Z]+)','query/$1/$2' );
//route::set('sweet',array('controller'=>'test/sweet'));

route::set('foo/bar/([a-zA-Z]+)', array(
  'controller'=>'api',
  'function'=>'tree',
  'arguments'=>array('$1')
));

