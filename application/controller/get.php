<?
/**
 * Theme API
 *
 * @package default
 * @author Adam Patterson
 */
class get_controller {
	
	public function index()
	{
		
	}
	
	
	public function themes( $slug = '' )
	{	
		$extensions = load::model ( 'extension' );
		$user = load::model ( 'user' );
			
		$dirty_themes = $extensions->get_themes();
		
		$depth = 0;
		foreach ( $dirty_themes as $theme ) {				
			
			$author = $user->get_meta($theme->author_id);
			
			$extension[$depth]['id']             = $theme->id;
			$extension[$depth]['extension_name'] = $theme->extension_name;
			$extension[$depth]['extension_slug'] = $theme->extension_slug;
			$extension[$depth]['description']    = $theme->description;
			$extension[$depth]['version']        = $theme->version;
			$extension[$depth]['author_id']      = $theme->author_id;
			$extension[$depth]['website']        = $theme->website;
			//$extension[$depth]['download']     = 'https://github.com/'.$author->git_user.'/'.$theme->repo_name.'/zipball/'.$theme->version;
			$extension[$depth]['download']       = BASE_URL.'get/download/'.$theme->id;

			
			$depth++;
		}
		
		echo json_encode( $extension );
	}
	
	
	public function plugins( $slug = '' )
	{
		$extensions = load::model ( 'extension' );
		$user = load::model ( 'user' );

		$dirty_plugins = $extensions->get_plugins();
		
		$depth = 0;
		foreach ( $dirty_plugins as $plugin ) {
			
			$author = $user->get_meta($plugin->author_id);
			
			$extension[$depth]['id']             = $plugin->id;
			$extension[$depth]['extension_name'] = $plugin->extension_name;
			$extension[$depth]['extension_slug'] = $plugin->extension_slug;
			$extension[$depth]['description']    = $plugin->description;
			$extension[$depth]['version']        = $plugin->version;
			$extension[$depth]['author_id']      = $plugin->author_id;
			$extension[$depth]['website']        = $plugin->website;
			//$extension[$depth]['download']     = 'https://github.com/'.$author->git_user.'/'.$plugin->repo_name.'/zipball/'.$plugin->version;
			$extension[$depth]['download']       = BASE_URL.'get/download/'.$plugin->id;

			
			$depth++;
		}

		echo json_encode($extension);
	}
	
	public function versions( $slug = '' )
	{
		$extensions = load::model ( 'extension' );
		$user = load::model ( 'user' );

		$dirty_plugins = $extensions->get_versions( $slug );	
		
		$depth = 0;
		foreach ( $dirty_plugins as $plugin ) {
			
			$author = $user->get_meta($plugin->author_id);
			
			$extension[$depth]['id']             = $plugin->id;
			$extension[$depth]['extension_name'] = $plugin->extension_name;
			$extension[$depth]['extension_slug'] = $plugin->extension_slug;
			$extension[$depth]['description']    = $plugin->description;
			$extension[$depth]['version']        = $plugin->version;
			$extension[$depth]['author_id']      = $plugin->author_id;
			$extension[$depth]['website']        = $plugin->website;
			//$extension[$depth]['download']     = 'https://github.com/'.$author->git_user.'/'.$plugin->repo_name.'/zipball/'.$plugin->version;
			$extension[$depth]['download']       = BASE_URL.'get/download/'.$plugin->id;

			
			$depth++;
		}

		echo json_encode($extension);
	}
	
	
	// @todo: look up by author username
	public function author( $id = '' )
	{
		$user = load::model ( 'user' );
		
		$author = $user->get( $id );	
		$author_meta = $user->get_meta( $id );
		
		$api_author['username']     = $author->username;
		$api_author['id']           = $author->id;
		$api_author['email']        = $author->email;
		$api_author['first_name']   = $author_meta->first_name;
		$api_author['last_name']    = $author_meta->last_name;
	    $api_author['location']  	= $author_meta->location;
	    $api_author['about_you'] 	= $author_meta->about_you;
	    $api_author['git_user']  	= $author_meta->git_user;
	    $api_author['twitter']   	= $author_meta->twitter;
	    $api_author['linkedin']  	= $author_meta->linkedin;
	    $api_author['forrst']    	= $author_meta->forrst;
	    $api_author['website']   	= $author_meta->website;

		echo json_encode( $api_author );		
	}
	
	
	public function core()
	{
		$extensions = load::model ( 'extension' );

		$core = $extensions->get_core();
		
		$core = $core[0];

		$extension['id']             = $core->id;
		$extension['extension_name'] = $core->extension_name;
		$extension['extension_slug'] = $core->extension_slug;
		$extension['description']    = $core->description;
		$extension['version']        = $core->version;
		$extension['author_id']      = $core->author_id;
		$extension['website']        = $core->website;
		//$extension['download']     = 'https://github.com/adampatterson/Tentacle/zipball/');
		$extension['download']       = BASE_URL.'get/download/'.$core->id;


		echo json_encode($extension);
	}
	
	
	public function download( $id = 41 )
	{
		$extension 	= load::model ( 'extension' );
		$user 		= load::model ( 'user' );
		
		$get 		= $extension->get($id, true);
		$author 	= $user->get_meta($get->author_id);
		
		$stats = load::model( 'stats' )->add($get->id, $get->count);

		$file = 'https://github.com/'.$author->git_user.'/'.$get->repo_name.'/zipball/'.$get->version;	

		// If the files are downloaded and served from Serpent then we can read the file, For now we will redirect back to Github.
		if (file_exists($file)) {
			 header('Content-Description: File Transfer');
			 header('Content-Type: application/octet-stream');
			 //header('Content-Length: ' . filesize($f_location));
			 header('Content-Disposition: attachment; filename=' . basename($get->extension_slug).'.zip');

			readfile($file);
			echo file_get_contents( $file );
		} else {
			header('Location: ' . $file);
		}
	}
}