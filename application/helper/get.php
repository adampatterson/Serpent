<?
class get {
	
	/**
     * Function: get::url_contents
     * Wrapper function for CURL, alternative to the some times disabled function file_get_contents() on some hosting environments.
     *
     * Parameters:
     *	$url - string
     *
     * Returns:
     *	$output - curl contents
     */
    public static function url_contents ( $url ) {
        if (!function_exists('curl_init'))
            die('CURL is not installed!');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }

	/**
	* Function: get::option
	*	Takes the $option key and queries the DB Option table for a result.
	*	If nothing is found then the $default value is returned.
	*
	* Parameters:
	*	$options - String
	*	$default - String
	*
	* Returns:
	*	String
	*/
	public static function option( $key, $default = false )
	{
        $settings = load::model( 'settings' );
        $get = $settings->get( $key );

		if ( $get != false ) {
			return $get;
		} else {
			return $default;
		}
	}

	
}

class set {
    /**
     * Function: option
     *	Set a new option ( Key Value ) if the option exists it will be updated.
     *
     * Parameters:
     *	$key - String
     *	$value - String
     *
     * Returns:
     *	$value - String
     */
    public static function option( $key = '', $value = '' )
    {
        $settings = load::model( 'settings' );

        $add = $settings->update( $key, $value );

        return $value;
    }
}