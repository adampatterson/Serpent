<?

class confirm_controller {
	
	public function index( $hash = '' )
	{
		$user = load::model ( 'user' );

		$confirm_user = $user->get_hash( $hash );
		
		$message = '';
		
		if ( $confirm_user = $user->get_hash( $hash ) == TRUE )
		{
			load::view( 'confirm' );
			
			$confirmed_user = $user->remove_hash( $hash );
			
		} else {
			load::view( 'error' );
		}
		
		
	}
}