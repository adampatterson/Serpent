<?

class action_controller {
	
	public function add_profile ()
	{			
		$user = load::model( 'user' );
		$user_single = $user->add();

		$history = input::post ( 'history' );

		// Check for return True.
		// Log error

		//url::redirect($history); 
		url::redirect('dashboard/profile/');
	}
	
	public function update_profile ()
	{
		valid_user();

		$user 				= load::model( 'user' );
		$user_single 		= $user->update();
		
		$history = input::post ( 'history' );

		url::redirect($history);
	}
	
	public function delete_profile ()
	{
		valid_user();
		
		$user = load::model( 'user' );
		$user_delete = $user->delete( $id );
		
		url::redirect('admin/users_manage/');
	}
	
	public function login ()
	{
		$username = input::post ( 'username' );
	    $password = input::post ( 'password' );
	
		$history = input::post ( 'history' );

	    user::login($username, $password);

	    if(user::valid()) {

			if ($history != '') {
				url::redirect($history);
			} else {
				url::redirect('developer/dashboard');
			}
			
	    } else {
	       note::set("error","login",NOTE_PASSWORD);
	       url::redirect('login'); 
	    }
	}
}