<?

class post_controller {
	
	public function index ()
	{
		// Post keys from Github api.tentaclecms.com/post/87ysdf87ysdf/
		// 87ysdf87ysdf == developer polugin name
		
		print_r( $_POST );
		
		// return status code
	}
	
	
	// 
	public function request ()
	{	
		if ( !$_POST ) {
			if ( !defined( 'CHECK_TIMEOUT') ) define( 'CHECK_TIMEOUT', 5 );
			$scc = stream_context_create( array( 'http' => array( 'timeout' => CHECK_TIMEOUT ) ) );

			$json = (array) json_decode( file_get_contents( 'http://localhost/serpent/post/json/', 0, $scc ) );
		
			$result = post_request('http://localhost/serpent/post/', $json);
	/*
			if ($result['status'] == 'ok'){

			    // Print headers 
			    echo $result['header']; 

			    echo '<hr />';

			    // print the result of the whole request:
				echo '<pre>';
			    	echo $result['content'][1];
				echo '</pre>';

			}
			else {
			    echo 'A error occured: ' . $result['error']; 
			}
	*/
		}
	}
	
	
	// 
	public function json ()
	{
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
		?>{
  "after": "90d68f57749e372fec0a11ce96e26fd09dbd098a", 
  "before": "7d4790288996bdceeea6f6fc398ad5ddaf8666fb", 
  "commits": [
    {
      "added": [
        "application\/helper\/get.php", 
        "application\/helper\/is.php"
      ], 
      "author": {
        "email": "hello@adampatterson.ca", 
        "name": "Adam Patterson", 
        "username": "adampatterson"
      }, 
      "committer": {
        "email": "hello@adampatterson.ca", 
        "name": "Adam Patterson", 
        "username": "adampatterson"
      }, 
      "distinct": false, 
      "id": "330f84c7af4ba0bdcbdb3868b8531d1d39f0061b", 
      "message": "Get and Is Functions\n\nget_author()\n\nis_installed()", 
      "modified": [], 
      "removed": [], 
      "timestamp": "2012-03-06T14:12:49-08:00", 
      "url": "https:\/\/github.com\/adampatterson\/Tentacle\/commit\/330f84c7af4ba0bdcbdb3868b8531d1d39f0061b"
    }, 
    {
      "added": [], 
      "author": {
        "email": "hello@adampatterson.ca", 
        "name": "Adam Patterson", 
        "username": "adampatterson"
      }, 
      "committer": {
        "email": "hello@adampatterson.ca", 
        "name": "Adam Patterson", 
        "username": "adampatterson"
      }, 
      "distinct": false, 
      "id": "32754dce63725f9c2c838fcb431a3816c0af2a9c", 
      "message": "Formatting and Sorting code", 
      "modified": [
        "application\/controller\/action.php", 
        "application\/controller\/ajax.php", 
        "application\/model\/snippet.php"
      ], 
      "removed": [], 
      "timestamp": "2012-03-06T14:13:50-08:00", 
      "url": "https:\/\/github.com\/adampatterson\/Tentacle\/commit\/32754dce63725f9c2c838fcb431a3816c0af2a9c"
    }, 
    {
      "added": [], 
      "author": {
        "email": "hello@adampatterson.ca", 
        "name": "Adam Patterson", 
        "username": "adampatterson"
      }, 
      "committer": {
        "email": "hello@adampatterson.ca", 
        "name": "Adam Patterson", 
        "username": "adampatterson"
      }, 
      "distinct": false, 
      "id": "90d68f57749e372fec0a11ce96e26fd09dbd098a", 
      "message": "Added AJAX rout, autoloader new helpers.", 
      "modified": [
        "application\/config\/deployment\/config.php", 
        "application\/config\/deployment\/route.php"
      ], 
      "removed": [], 
      "timestamp": "2012-03-06T14:14:22-08:00", 
      "url": "https:\/\/github.com\/adampatterson\/Tentacle\/commit\/90d68f57749e372fec0a11ce96e26fd09dbd098a"
    }
  ], 
  "compare": "https:\/\/github.com\/adampatterson\/Tentacle\/compare\/7d47902...90d68f5", 
  "created": false, 
  "deleted": false, 
  "forced": false, 
  "head_commit": {
    "added": [], 
    "author": {
      "email": "hello@adampatterson.ca", 
      "name": "Adam Patterson", 
      "username": "adampatterson"
    }, 
    "committer": {
      "email": "hello@adampatterson.ca", 
      "name": "Adam Patterson", 
      "username": "adampatterson"
    }, 
    "distinct": false, 
    "id": "90d68f57749e372fec0a11ce96e26fd09dbd098a", 
    "message": "Added AJAX rout, autoloader new helpers.", 
    "modified": [
      "application\/config\/deployment\/config.php", 
      "application\/config\/deployment\/route.php"
    ], 
    "removed": [], 
    "timestamp": "2012-03-06T14:14:22-08:00", 
    "url": "https:\/\/github.com\/adampatterson\/Tentacle\/commit\/90d68f57749e372fec0a11ce96e26fd09dbd098a"
  }, 
  "pusher": {
    "name": "none"
  }, 
  "ref": "refs\/heads\/master", 
  "repository": {
    "created_at": "2011\/08\/09 23:17:44 -0700", 
    "description": "A CMS", 
    "fork": false, 
    "forks": 1, 
    "has_downloads": true, 
    "has_issues": true, 
    "has_wiki": true, 
    "homepage": "http:\/\/tentaclecms.com", 
    "language": "PHP", 
    "name": "Tentacle", 
    "open_issues": 40, 
    "owner": {
      "email": "adam@mailoutinteractive.com", 
      "name": "adampatterson"
    }, 
    "private": false, 
    "pushed_at": "2012\/03\/22 14:16:53 -0700", 
    "size": 10070, 
    "url": "https:\/\/github.com\/adampatterson\/Tentacle", 
    "watchers": 7
  }
}
		<?
	}
}