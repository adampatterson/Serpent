<?

function valid_user ()
{
	if(!user::valid()) 
	{
		//note::set("error","session",NOTE_SESSION);
		note::set('error','session',CURRENT_PAGE);
		url::redirect('developer'); 
	}
}

function current_page ( $page, $alt = '' ) 
{
	if (CURRENT_PAGE == $page)
		echo 'active';
}

function icon ( $page ) 
{
	if (CURRENT_PAGE == $page)
		echo 'icon-white';
	else
		echo 'icon-black';
}

function hide_extension( $extension = '' )
{
	$user = load::model( 'user' );
	$hidden_extensions = (array)$user->get_hidden_repo();
	
	foreach ( $hidden_extensions as $hidden ) {
		
		if ( $hidden->extension == $extension ):
			return true;
		endif;
	}
	
	//return $extension;
}