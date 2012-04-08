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
	
	// https://api.github.com/users/:user/repos/
	public function repos( $repo = '' )
	{

		if ( !defined( 'CHECK_TIMEOUT') ) define( 'CHECK_TIMEOUT', 5 );
		$scc = stream_context_create( array( 'http' => array( 'timeout' => CHECK_TIMEOUT ) ) );

		$git_repo = file_get_contents( 'https://api.github.com/users/'.user_git().'/repos', 0, $scc );

		$git_repo = json_decode( $git_repo );
		
		if ( $repo ):
			
			foreach ( $git_repo as $single_repo ):		
				if ($single_repo->name == $repo ):
					return $single_repo;
				endif;
			endforeach;
		else:
			return $git_repo;
		endif;
	}
	
	// https://api.github.com/repos/:user/:repo/git/refs/tags
	function refs( $repo = '' ) 
	{
		if ( !defined( 'CHECK_TIMEOUT') ) define( 'CHECK_TIMEOUT', 5 );
		$scc = stream_context_create( array( 'http' => array( 'timeout' => CHECK_TIMEOUT ) ) );

		$git_tags = file_get_contents( 'https://api.github.com/repos/'.user_git().'/'.$repo.'/git/refs/tags', 0, $scc );

		$git_tags = json_decode( $git_tags );

		return $git_tags;
	}
	
	// https://api.github.com/repos/adampatterson/Tentacle
	function core( ) 
	{
		if ( !defined( 'CHECK_TIMEOUT') ) define( 'CHECK_TIMEOUT', 5 );
		$scc = stream_context_create( array( 'http' => array( 'timeout' => CHECK_TIMEOUT ) ) );

		$git_repo = file_get_contents( 'https://api.github.com/repos/adampatterson/Tentacle', 0, $scc );

		$git_repo = json_decode( $git_repo );
		
		return $git_repo;

	}
	
	// https://api.github.com/repos/:user/:repo/tags
	function tags( $repo = '', $sha = '' ) 
	{
		if ( !defined( 'CHECK_TIMEOUT') ) define( 'CHECK_TIMEOUT', 5 );
		$scc = stream_context_create( array( 'http' => array( 'timeout' => CHECK_TIMEOUT ) ) );

		$git_tags = file_get_contents( 'https://api.github.com/repos/'.user_git().'/'.$repo.'/tags'.$sha, 0, $scc );

		$git_tags = json_decode( $git_tags );
		
		return $git_tags;
	}
	
	// https://api.github.com/repos/:user/:repo/tags
	function only_tags( $repo = '' ) 
	{
		if ( !defined( 'CHECK_TIMEOUT') ) define( 'CHECK_TIMEOUT', 5 );
		$scc = stream_context_create( array( 'http' => array( 'timeout' => CHECK_TIMEOUT ) ) );

		$git_tags = file_get_contents( 'https://api.github.com/repos/'.user_git().'/'.$repo.'/tags', 0, $scc );

		$git_tags = json_decode( $git_tags );
		
		foreach ( $git_tags as $tag ) {
			$ordered_tags[] = $tag->name;
		}
		
		natcasesort ( $ordered_tags );
		
		return $ordered_tags;
	}
}