<?php

class admin_controller
{	
	public function index()
	{
		load::view ( 'admin/dashboard' );
	}
	
	public function dashboard()
	{
		load::view ( 'admin/dashboard' );
	}
}