<?php

namespace App;

use DB;

use Validator;

use Session;

use Input;

class HomeModel {

	public static function newPassword()
	{

		$rules = array(
						'password'=>'required|confirmed|alpha_num',
						'password_confirmation'=>'required'
					  );	

		$validator = Validator::make(Input::all(),$rules);
		
		if($validator->passes())
		{
			$update = DB::table('users')
						  ->where('email',Input::get('email'))	
						  ->where('recovery_token',Input::get('token'))	
						  ->update(
									array(
											'password' => md5(Input::get('password')),
											'recovery_token' => ' '
										 )
								  );

			if($update)
			{
				$data['validator'] = $validator;
				$data['status'] = true;
				return $data;
			}
			else
			{
				$data['validator'] = $validator;
				$data['status'] = false;
				return $data;
			}
			
		}
		else
		{
			$data['validator'] = $validator;
			$data['status'] = false;
			return $data;
		}
	}

	public static function loginValidate($inputs)
	{

		$rules = array(
			'email'=>'required|email',
			'password'=>'required'
		);

		$validator = Validator::make($inputs,$rules);
		return $validator;
		
	}

	
	public static function setLoginSession($user)
	{

		Session::put('account_type', $user->account_type) ;
		Session::put('user_id', $user->id);
		Session::put('email', $user->email);
		Session::put('first_name', $user->first_name);
		Session::put('last_name', $user->last_name);
		Session::put('account_status', $user->status);
		Session::put('last_login', $user->last_login);

	}

	public static function check($inputs)
	{

		$user = DB::table('users')
							->where('email',$inputs['email'])
							->where('password',md5($inputs['password']))
							->select('first_name','last_name','account_type','id','email','last_login','status')
							->first();

		if(!is_null($user))
		{
			DB::table('users')
					->where('email',$inputs['email'])
					->where('password',md5($inputs['password']))
					->where('status','Enabled')
					->update(array('last_login' => date('Y-m-d H:i:s')));
		}
		
		return $user;
	}

	public static function contactSupport($inputs)
	{
		$insert_data = array(
				'first_name'=>$inputs['first_name'],
				'last_name'=>$inputs['last_name'],
				'email'=>$inputs['email'],
				'message'=> $inputs['message'],
				'intel'=>$inputs['intel']
			);
		
		$insert = DB::table('support')->insert($insert_data);
		return $insert_data;
		

	}

}
