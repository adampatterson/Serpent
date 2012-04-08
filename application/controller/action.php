<?

class action_controller {
	
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
	       url::redirect('confirm'); 
	    }
	}
	
	public function add_profile ()
	{			
		$user = load::model( 'user' );
		$user_single = $user->add();

		$history = input::post ( 'history' );

		//url::redirect($history); 
		url::redirect('confirm');
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
		
		url::redirect('developer/');
	}
	
	public function version_extension()
	{
		valid_user();
		
		$extension 		= load::model( 'extension' );
		$extension_add 	= $extension->version( );
		
		$extension = load::model ( 'extension' );

		$old_extension = $extension->version_old( input::post( 'old_id' ), input::post ( 'extension_type' ) );
		
		url::redirect('developer/dashboard/');
	}
	
	public function submit_extension()
	{
		valid_user();
		
		$extension = load::model( 'extension' );
		$extension_add = $extension->add( );
		
		url::redirect('developer/dashboard/');
	}
	
	public function hide_extension( $id = '' )
	{
		valid_user();

		$user = load::model ( 'user' );

		$hide_repo = $user->hide_repo( $id );
		
		url::redirect('developer/dashboard/');
	}
}