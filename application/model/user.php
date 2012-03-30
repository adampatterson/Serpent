<?
class user_model
{
	/**
	* Add User
	* ----------------------------------------------------------------------------------------------*/
	public function add () 
	{		
		$user_name    = input::post ( 'username' );
		$password     = input::post ( 'password' );
		$email        = input::post ( 'email' );
		$type         = 2;
		
		$first_name   = input::post ( 'first_name' );
		$last_name    = input::post ( 'last_name' );
		$location     = input::post ( 'location' );
		$about_you    = input::post ( 'about_you' );
		
		$git_user      = input::post ( 'git_user' );
		
		$twitter       = input::post ( 'twitter' );
		$linkedin      = input::post ( 'linkedin' );
		$forrst        = input::post ( 'forrst' );
		
		$website       = input::post ( 'website' );

		user::create(array(
			'username'=>$user_name,
			'email'=>$email,
			'password'=>$password,
			'type'=>$type
		));

		user::update($email)
			->data('first_name',$first_name)
			->data('last_name',$last_name)
			->data('activity_key','activation_key')
			->data('location',$location)
			->data('about_you',$about_you)
			->data('git_user',$git_user)
			->data('twitter',$twitter)
			->data('linkedin',$linkedin)
			->data('forrst',$forrst)
			->data('website',$website)
			->save();
			
		$hashed_ip = sha1($_SERVER['REMOTE_ADDR'].time());	
		
		$users  = db( 'users' );
		
		$users->update(array(
				'registered'=> time(),
				'confirm_key'=>$hashed_ip
			))
			->where( 'email', '=', $email )
			->execute();

        // Attach that Hash to the users email address.
        $mail = new email();
        $mail->to($username);
		$mail->from('Adam Patterson <hello@tentaclecms.com>');
        $hash_address = BASE_URL.'confirm/'.$hashed_ip;
        // @todo get install admings email address
        $mail->from('Serpent API Developer Registration');
        $mail->subject('Missing Password');
        $mail->content('<strong>Click the link to reset your password.</strong><br />'.$hash_address);
        $mail->send();	
			
			
		note::set('success','user_add','User Added!');
	}
	
	
	/**
	* Update User
	* ----------------------------------------------------------------------------------------------*/
	public function update ( )
	{
		$user_name    = input::post ( 'username' );
		$password     = input::post ( 'password' );
		$old_email    = input::post ( 'old_email' );
		$new_email    = input::post ( 'email' );
		$type         = 2;
		
		$first_name   = input::post ( 'first_name' );
		$last_name    = input::post ( 'last_name' );
		$location     = input::post ( 'location' );
		$about_you    = input::post ( 'about_you' );
		
		$git_user      = input::post ( 'git_user' );
		
		$twitter       = input::post ( 'twitter' );
		$linkedin      = input::post ( 'linkedin' );
		$forrst        = input::post ( 'forrst' );
		
		$website       = input::post ( 'website' );
		
		// need to set the users old email address before you update it.

		user::update($old_email)
			->email($new_email)
			->username($user_name)
			->type($type)	
			->data('first_name',$first_name)
			->data('last_name',$last_name)
			->data('activity_key','activation_key')
			->data('location',$location)
			->data('about_you',$about_you)
			->data('git_user',$git_user)
			->data('twitter',$twitter)
			->data('linkedin',$linkedin)
			->data('forrst',$forrst)
			->data('website',$website)
			
			->save();
		
		if ($password != '') 
		{
			user::update($new_email)
				->password($old_email)
				->save();
		}
	
		note::set('success','user_updated','User Updated!');
	
		return TRUE;
	}
	
	
	/**
	* Get User
	* ----------------------------------------------------------------------------------------------*/
	public function get_users ( )
	{
		$users_table = db ( 'users' );

		// Get Comments Database
		$users = $users_table->select( '*' )
			->order_by ( 'username', 'DESC' )
			->execute ();
	}
	
	public function get ( $id='' )
	{
		$users_table = db ( 'users' );

		if ($id=='') {
			// Get Loggedin User
			$users = $users_table->select( '*' )
				->where ( 'id', '=', user::id() )
				->execute();				

			return $users[0];

		} else {
			// Get user by ID
			$users = $users_table->select( '*' )
				->where ( 'id', '=', $id)
				->execute();				

			return $users[0];	
		}
	}

	
	/**
	* Get user Meta
	* ----------------------------------------------------------------------------------------------*/
	public function get_meta( $id = '' )
	{
		$user_meta = db ( 'users' );
		
		if ($id=='') {
			$user_meta = $user_meta->select( 'data' )
				->where ( 'id', '=', user::id() )
				->execute();
			
			$user_meta = json_decode($user_meta[0]->data);
			
			return $user_meta;
		} else {	
			$user_meta = $user_meta->select( 'data' )
				->where ( 'id', '=', $id )
				->execute();
			
			$user_meta = json_decode($user_meta[0]->data);
			
			return $user_meta;
		}
	}
	
	
	/**
	* Delete User
	* ----------------------------------------------------------------------------------------------*/
	public function delete ( $id  ) 
	{
		#@todo dont allow the user to delete all accounts! One must be left.
		
		user::delete( $id );
		note::set('success','user_delete','User Deleted!');
		
		return TRUE;
	}
	
	
	/**
	* Unique User
	* ----------------------------------------------------------------------------------------------*/
	public function unique ( $username )
	{
		if( user::unique( $username ) ):
			echo '0';
		else:
			echo '1';
		endif;
	}
	
	/**
	* Account Creation and Lost password
	* ----------------------------------------------------------------------------------------------*/	
	public function get_hash( $hash = '' )
	{
		$users_table = db ( 'users' );

		$confirm_user = $users_table->select( '*' )
			->where ( 'confirm_key', '=', $hash)
			->execute();
			
		if ( isset( $confirm_user[0] ) ) 
		{				
			return TRUE;
			
		} else {
			return FALSE;
		}
	}
	
	public function remove_hash( $hash = '' )
	{
		$users_table = db ( 'users' );
			
		$users_table->update(array(
				'confirm_key'=>''
			))
			->where( 'confirm_key', '=', $hash )
			->execute();
	}
}