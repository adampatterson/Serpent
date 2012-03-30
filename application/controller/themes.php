<?
/**
 * Theme API
 *
 * @package default
 * @author Adam Patterson
 */
class themes_controller {
	public function index( $slug = '' )
	{	
		$extensions = load::model ( 'extension' );
		
		$dirty_themes = $extensions->get_themes();
		
		$depth = 0;
		foreach ( $dirty_themes as $theme ) {				
			
			$extension[$depth]['id'] = $theme->id;
			$extension[$depth]['extension_name'] = $theme->extension_name;
			$extension[$depth]['extension_slug'] = $theme->extension_slug;
			$extension[$depth]['description'] = $theme->description;
			$extension[$depth]['version'] = $theme->version;
			$extension[$depth]['author_id'] = $theme->author_id;
			$extension[$depth]['website'] = $theme->website;
			
			$depth++;
		}
		
		echo json_encode($extension);		
	}
}