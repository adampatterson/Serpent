<?php

class api_controller
{
	// Index
	public function index()
	{
		http_status('405');
	}
	
	// REST API
	public function rest()
	{
		$api = api::get();
		$args = func_get_args();
		
		
		// Normal request
		if(!$api)
		{
			print_r($args);
		}
		
		// JSON API request
		else
		{
			echo json_encode($args,TRUE);
		}
	}
}