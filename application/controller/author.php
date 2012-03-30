<?
/**
 * Author API
 *
 * @package default
 * @author Adam Patterson
 */
class author_controller {
	public function index( $id = '' )
	{
		$user = load::model ( 'user' );
		
		$author = $user->get( $id );	
		$author_meta = $user->get_meta( $id );
		
		$api_author['username'] = $author->username;
		$api_author['id'] = $id;
		$api_author['email'] = $author->email;
		$api_author['first_name'] = $author_meta->first_name;
		$api_author['last_name'] = $author_meta->last_name;
	    $api_author['location'] =  $author_meta->location;
	    $api_author['about_you'] =  $author_meta->about_you;
	    $api_author['git_user'] =  $author_meta->git_user;
	    $api_author['twitter'] =  $author_meta->twitter;
	    $api_author['linkedin'] =  $author_meta->linkedin;
	    $api_author['forrst'] =  $author_meta->forrst;
	    $api_author['website'] =  $author_meta->website;
		
		echo json_encode( $api_author );
	}
}