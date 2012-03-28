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