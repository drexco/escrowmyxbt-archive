<?php

namespace App;

use DB;

use Validator;

use Session;

use Input;

use stdClass;

use App;

use Cache;

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

    public static function signUp($inputs)
    {
        $tempPassword = $inputs['password'];
        $insert_data = array(
                'first_name'=>$inputs['first_name'],
                'last_name'=>$inputs['last_name'],
                'email'=>$inputs['email'],
                'password'=> md5($inputs['password']),
                'temp_password'=> $tempPassword,
                'account_type'=>'customer',
                'last_login' => date('Y-m-d H:i:s'),
                'created_at'=> date('Y-m-d H:i:s'),
                'recovery_time'=> date('Y-m-d H:i:s'),
                'recovery_token' => null,
                'verification_status' => 1,
                'status' => 'Enabled'
            );
        
        $insert = DB::table('users')->insert($insert_data);
        return $insert_data;
    }
    
    //Get Transactions
    public static function statuses()
    {
        $cache_key = 'getStatuses';
        $data = Cache::remember($cache_key,5,function() 
        {
            $data = DB::table('prel_transactions')
                                ->select('id','btc_address','amount_in_btc', 'amount_in_usd', 'confirmations', 'status','btc_balance', 'transaction_time')
                                ->orderBy('transaction_time','DESC')
                                ->limit(20)
                                ->get();
            return $data;
         });

            return  $data;
    }
    
    public static function viewStatus($id)
    {
        $cache_key = 'viewStatus'.$id;
        $data = Cache::remember($cache_key,5,function() use ($id) 
        {
             $tx = DB::table('transactions')
                                ->where('id',$id)
                                ->select('btc_address','amount_in_btc', 'amount_in_usd', 'confirmations', 'status','btc_balance', 'transaction_time', 'escrow_charge', 'email_address')
                                ->orderBy('transaction_time','DESC')
                                ->get();

            return $tx;
        });

        if($data)
            return $data;
        else
            return null;

    }
    
    	public static function signUpValidate($inputs)
    {
        
        $rules = array(
                'first_name'=>'required|max:20',
                'last_name'=>'required|max:20',
                'email'=>'required|email',
                'password'=>'required|max:16'
            );

        
        $validator = Validator::make($inputs,$rules);
        return $validator;

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
