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
	
}