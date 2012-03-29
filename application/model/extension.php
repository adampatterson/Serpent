<?

class extension_model {
	public function add()
	{
		$extension_name 	= input::post ( 'extension_name' );
		$extension_type 	= input::post ( 'extension_type' );
		$description 		= input::post ( 'description' );
		$version 			= input::post ( 'version' );
		$requires			= '';
		$tested				= '';
		$author_id			= user::id( );
		$website			= input::post ( 'website' );
			
		$inflector = new inflector( );
		$extension_slug = $inflector->camelize( $extension_name );
		$extension_slug = $inflector->underscore( $extension_name );
		
		$extension  = db( 'extension' );

		$extension_id = $extension->insert(array(
			'extension_name'=>$extension_name,
			'extension_slug'=>$extension_slug,
			'extension_type'=>$extension_type,
			'added_on'=>time(),
			'description'=>$description,
			'version'=>$version,
			'author_id'=>$author_id,
			'website'=>$website
		));

		note::set('success','extension_add','Extension Added!');
		
		return $extension_id ;
	}
	
	public function get_themes( $slug = '' )
	{
		$extension_table = db ( 'extension' );

		$get_themes = $extension_table->select( '*' )
			->where ( 'extension_type', '=', 'theme')
			->execute();
			
		return $get_themes;
	}
	
	public function get_plugins( $slug = '' )
	{
		$extension_table = db ( 'extension' );
		
		$get_plugins = $extension_table->select( '*' )
			->where ( 'extension_type', '=', 'plugin')
			->execute();
			
		return $get_plugins;
	}
}