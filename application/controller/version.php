<?php

class version_controller
{	
	public function index()
	{
		$version = array();
		
		$version['status'] = 200;
		$version['version'] = 1;
		$version['download'] = 'http://tentaclecms.com/download/';
		
		echo json_encode($version);
	}
}