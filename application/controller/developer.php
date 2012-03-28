<?

class developer_controller {
	
	public function index()
	{
		if(!user::valid()) 
		{
			load::view ( 'login' );
		} 
		else
		{
			load::view ( 'developer/dashboard' );
		}
		
	}

	public function dashboard()
	{
		valid_user();
		load::view ( 'developer/dashboard' );
	}
	
	public function themes()
	{
		valid_user();
		load::view ( 'developer/themes' );
	}
	
	public function plugins()
	{
		valid_user();
		load::view ( 'developer/plugins' );
	}
	
	public function statistics()
	{
		valid_user();
		load::view ( 'developer/statistics' );
	}
	
	public function profile()
	{
		valid_user();
		$user = load::model ( 'user' );

		$user_meta = $user->get_meta();
		$user = $user->get();

		load::view ( 'developer/profile', array( 'user' => $user, 'user_meta' => $user_meta ) );
	}
}