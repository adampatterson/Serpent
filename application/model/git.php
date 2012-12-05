<?
class git_model {
	
	// https://api.github.com/repos/:user/:repo/downloads/:id
	public function download()
	{
		$scc = stream_context_create( array( 'http' => array( 'timeout' => CHECK_TIMEOUT ) ) );

		return json_decode( file_get_contents( 'http://api.tentaclecms.com/version/', 0, $scc ) );
	}
	
	// https://api.github.com/users/:user
	public function user( )
	{
		$cache = new cache();
		$cache_key = 'user_'.user_git();
		
		if ( $cache->look_up($cache_key) == false):		
			$scc = stream_context_create( array( 'http' => array( 'timeout' => CHECK_TIMEOUT ) ) );

			$git_user = file_get_contents( 'https://api.github.com/users/'.user_git(), 0, $scc );	

			return json_decode( $cache->set( $cache_key, $git_user, '+6 hours' ) );
		else:
			return json_decode( $cache->get( $cache_key ) );
		endif;
	}	
	
	// https://api.github.com/users/:user/repos/
	public function repos( $repo = '' )
	{		
		$cache = new cache();
		$cache_key = 'repos_'.user_git().'_'.$repo;
		
		if ( $cache->look_up($cache_key) == false):		
			$scc = stream_context_create( array( 'http' => array( 'timeout' => CHECK_TIMEOUT ) ) );

			$git_repo = file_get_contents( 'https://api.github.com/users/'.user_git().'/repos', 0, $scc );	

			$git_repo =  json_decode( $cache->set( $cache_key, $git_repo, '+6 hours' ) );
		else:
			$git_repo = json_decode( $cache->get( $cache_key ) );
		endif;

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
		$cache = new cache();
		$cache_key = 'refs_'.user_git().'_'.$repo;

		if ( $cache->look_up(cache_key) == false):		
			$scc = stream_context_create( array( 'http' => array( 'timeout' => CHECK_TIMEOUT ) ) );

			$git_tags = file_get_contents( 'https://api.github.com/repos/'.user_git().'/'.$repo.'/git/refs/tags', 0, $scc );

			return json_decode( $cache->set( $cache_key, $git_tags, '+6 hours' ) );
		else:
			return json_decode( $cache->get( $cache_key ) );
		endif;
	}
	
	// https://api.github.com/repos/adampatterson/Tentacle
	function core( ) 
	{
		$cache = new cache();
		$cache_key = 'core_'.user_git();
		
		if ( $cache->look_up($cache_key) == false):		
			$scc = stream_context_create( array( 'http' => array( 'timeout' => CHECK_TIMEOUT ) ) );

			$git_repo = file_get_contents( 'https://api.github.com/repos/adampatterson/Tentacle', 0, $scc );

			return json_decode( $git_repo );
		else:
			return json_decode( $cache->get( $cache_key ) );
		endif;
	}
	
	// https://api.github.com/repos/:user/:repo/tags
	function tags( $repo = '', $sha = '' ) 
	{
		$cache = new cache();
		$cache_key = 'tags_'.user_git().'_'.$repo;

		if ( $cache->look_up($cache_key) == false):		
			$scc = stream_context_create( array( 'http' => array( 'timeout' => CHECK_TIMEOUT ) ) );

			$git_tags = file_get_contents( 'https://api.github.com/repos/'.user_git().'/'.$repo.'/tags'.$sha, 0, $scc );

			return json_decode( $cache->set($cache_key, $git_tags, '+6 hours' ) );
		else:
			return json_decode( $cache->get( $cache_key ) );
		endif;
	}
	
	// https://api.github.com/repos/:user/:repo/tags
	function only_tags( $repo = '' ) 
	{
		$cache = new cache();
		$cache_key = 'only_tags_'.user_git().'_'.$repo;

		if ( $cache->look_up($cache_key) == false):		
			$scc = stream_context_create( array( 'http' => array( 'timeout' => CHECK_TIMEOUT ) ) );

			$git_tags = file_get_contents( 'https://api.github.com/repos/'.user_git().'/'.$repo.'/tags', 0, $scc );

			$git_tags = json_decode( $cache->set( $cache_key, $git_tags, '+6 hours' ) );
		else:
			$git_tags = json_decode( $cache->get( $cache_key ) );
		endif;
		
		foreach ( $git_tags as $tag ) {
			$ordered_tags[] = $tag->name;
		}
		 
		if ( isset( $ordered_tags ) ) {
			natcasesort ( $ordered_tags );
		} else {
			$ordered_tags = NULL;
		}
		
		return $ordered_tags;
	}
}