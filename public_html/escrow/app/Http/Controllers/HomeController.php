<?php
	
	namespace App\Http\Controllers;

	use App\Http\Controllers\Controller;

	use App\HomeModel;

	use App\Country;

	use App\State;

	use App;

	use View;

	use Session;
		
	use Input;

	use Redirect;

	use Response;

	use Mail;

	class homeController extends Controller {
	
	//Home Page View
	public function index()
	{
		return View::make('home.index');
	}

	//login form view
	public function loginView()
	{
		if(Session::get('user_id'))
		{
			if(Session::get('account_type')=='customer')
			{
				return Redirect::to('/usersummary');
			}
			else
			{
				return Redirect::to('/summary');
			}
		}
		return View::make('home.login');
	}

	//process login
	public function login()
	{
		$inputs = Input::all();
		$validator = HomeModel::loginValidate($inputs);

		if($validator->passes())
			{
				$user = HomeModel::check($inputs);
				 if (!is_null($user))
					{
						HomeModel::setLoginSession($user);

						if(!Session::get('account_status')=='Enabled')
							{
								if(Session::get('account_type')=='customer')
								{
									return Redirect::to('/usersummary');
								}
								else
								{
									return Redirect::to('/summary');
								}
							}
						else
							{
								Session::flash('login_message','Account has been suspended/Disabled!');
								return Redirect::to('/login');
							}
					}
				else
					{
						Session::flash('login_message','The access code or password is incorrect');
			        	return Redirect::to('/login');
			        }
			 }
		 else
		 	{
				return Redirect::to('/login')->withErrors($validator);	
		 	}

	}

	//Process log out
	public function logOut()
	{
		if(Session::get('user_id'))
		{
			Session::flush();
			Session::flash('login_message','you are successfully disconnected');
			return Redirect::to('/login');			
		}
		return Redirect::to('/login');
	}

	//Password recovery new Password process
	public function newPasswordView()
	{
		if(Session::get('token'))
		{
			return View::make('password.reset');
		}
		App::abort(403);		
	}

	//Password recovery new Password process
	public function newPassword()
	{
		$valid = HomeModel::newPassword();

		if($valid['validator']->passes() AND $valid['status']==true)
		{
			Session::flash('recovery_message','Your password has been reset, so try and login now!');
			return Redirect::to('/login/password-recovery/status');
		}
		elseif($valid['validator']->passes() AND $valid['status']==false)
		{
			Session::flash('recovery_message','Something went wrong, click the reset link from your email');
			return Redirect::to('/login/password-recovery/status');
		}
		elseif ($valid['validator']->fails() AND $valid['status']==false)
		{
			return Redirect::to('/login/password-recovery/new-password')->withErrors($valid['validator']);
		}
	}

	public function sitemap()
	{
		$xml = public_path().'/sitemap.xml';
		header('Content-Description: File Transfer');
		header('Content-Type: text/xml');
		header('Expires: 0');
		header('Content-Length: '.filesize($xml).'');
		readfile($xml);		
	}

	public function robots()
	{
		$txt = public_path().'/robots.txt';
		header('Content-Description: File Transfer');
		header('Content-Type: text/plain');
		header('Expires: 0');
		header('Content-Length: '.filesize($txt).'');
		readfile($txt);
	}

}
