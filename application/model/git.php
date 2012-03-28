<?
class git_model {
	
	// https://api.github.com/repos/:user/:repo/downloads/:id
	public function download()
	{
		if ( !defined( 'CHECK_TIMEOUT') ) define( 'CHECK_TIMEOUT', 5 );
		$scc = stream_context_create( array( 'http' => array( 'timeout' => CHECK_TIMEOUT ) ) );

		$git_downloads = file_get_contents( 'http://api.tentaclecms.com/version/', 0, $scc );

		$git_downloads = json_decode( $git_downloads );
		
		return $git_downloads;
	}
	
	// https://api.github.com/users/:user
	public function user( )
	{
		if ( !defined( 'CHECK_TIMEOUT') ) define( 'CHECK_TIMEOUT', 5 );
		$scc = stream_context_create( array( 'http' => array( 'timeout' => CHECK_TIMEOUT ) ) );

		$git_user = file_get_contents( 'https://api.github.com/users/'.user_git(), 0, $scc );

		$git_user = json_decode( $git_user );
		
		return $git_user;
	}	
	
	// https://api.github.com/users:user/repos/
	public function repos( )
	{
		if ( !defined( 'CHECK_TIMEOUT') ) define( 'CHECK_TIMEOUT', 5 );
		$scc = stream_context_create( array( 'http' => array( 'timeout' => CHECK_TIMEOUT ) ) );

		$git_repo = file_get_contents( 'https://api.github.com/users/'.user_git().'/repos', 0, $scc );

		$git_repo = json_decode( $git_repo );
		
		return $git_repo;
	}
	
	// https://api.github.com/repos/:user/:repo/git/refs/tags
	function tags( $repo = '' ) 
	{
		if ( !defined( 'CHECK_TIMEOUT') ) define( 'CHECK_TIMEOUT', 5 );
		$scc = stream_context_create( array( 'http' => array( 'timeout' => CHECK_TIMEOUT ) ) );

		$git_tags = file_get_contents( 'https://api.github.com/repos/'.user_git().'/'.$repo.'/git/refs/tags', 0, $scc );

		$git_tags = json_decode( $git_tags );
		
		return $git_tags;
	}
}