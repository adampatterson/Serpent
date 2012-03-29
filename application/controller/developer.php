<?

class developer_controller {
	
	// look up developer profiles.
	// List their extensions, stats, descriptions, and socail media links
	public function index()
	{
		if(!user::valid()) 
		{
			load::view ( 'login' );
		} 
		else
		{
			url::redirect ( 'developer/dashboard' );
		}
		
	}

	public function dashboard()
	{
		valid_user();
		
		$github = load::model ( 'git' );

		$git_repos = $github->repos();
		
		load::view ( 'developer/dashboard', array('git_repos'=>$git_repos) );
	}
	
	public function submit_extension ( $repo = '' )
	{
		valid_user();
		
		$github = load::model ( 'git' );

		$git_repos = $github->repos( $repo );
		$git_tags = $github->tags( $repo );
		
		load::view ( 'developer/submit_extension', array( 'repo'=> $git_repos, 'tags'=> $git_tags ) );
	}
	
	public function themes()
	{
		valid_user();
		
		$themes = load::model ( 'extension' );

		$get_themes = $themes->get_themes();
		
		load::view ( 'developer/themes', array( 'themes'=> $get_themes ) );
	}
	
	public function plugins()
	{
		valid_user();
		
		$plugins = load::model ( 'extension' );

		$get_plugins = $plugins->get_plugins();
		
		load::view ( 'developer/plugins', array( 'plugins'=> $get_plugins ) );
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
	
	public function pull()
	{
		load::helper ('git');
		
		echo '<pre>';
		echo pull();
		echo '</pre>';
	}
}