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
	
	return true;
}

/**
 * Function: checked
 * If $val == 1 (true), outputs ' checked="checked"'
 *
 * Parameters:
 *     $val - Value to check.
 */
function checked( $val1, $val2, $return = false ) 
{
	if ( is_array( $val2 ) ) {
		foreach ($val2 as $value) {
		
			if ( $val1 == $value->id )
				if ($return)
					return ' checked="checked"';
				else
					echo ' checked="checked"';
		}
	} else {
		if ( $val1 == $val2 )
			if ($return)
				return ' checked="checked"';
			else
				echo ' checked="checked"';
	}
}