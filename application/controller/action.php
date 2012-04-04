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
	
	public function submit_extension()
	{
		valid_user();
		
		$extension = load::model( 'extension' );
		$extension_add = $extension->add( );
		
		/*
		$extension_tags = input::post( 'tags' );
		$extension_tags = explode(',', $post_tags );
		$tags = load::model( 'tags' );
		
		foreach ( $extension_tags as $tag ) {
			$tag_single = $tags->add( $tag );
			
			$tag_relations = $tags->relations( $extension_add, $tag_single );
		}	
		
		*/
		
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