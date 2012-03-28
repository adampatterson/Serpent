<?

class logout_controller {
	public function index ()
	{
		user::logout();
		url::redirect('/');
	}
}