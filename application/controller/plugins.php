<?
/**
 * Plugin API
 *
 * @package default
 * @author Adam Patterson
 */
class plugins_controller {
	public function index( $slug = '' )
	{
		$extensions = load::model ( 'extension' );

		$dirty_plugins = $extensions->get_plugins();
		
		$depth = 0;
		foreach ( $dirty_plugins as $plugin ) {
			$extension[$depth]['id'] = $plugin->id;
			$extension[$depth]['extension_name'] = $plugin->extension_name;
			$extension[$depth]['extension_slug'] = $plugin->extension_slug;
			$extension[$depth]['description'] = $plugin->description;
			$extension[$depth]['version'] = $plugin->version;
			$extension[$depth]['author_id'] = $plugin->author_id;
			$extension[$depth]['website'] = $plugin->website;
			
			$depth++;
		}

		echo json_encode($extension);
	}
}