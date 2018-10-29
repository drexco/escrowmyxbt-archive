<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\UserModel;

use App\Account;

use App\Beneficiary;

use App;

use Session;

use View;

use Redirect;

use Input;

use Response;

use Mail;

class userController extends Controller {

	//Summary View
	public function summary()
	{
		if(Session::get('user_id'))
		{
			if(Session::get('account_type')=='customer')
			{
				$user_id = Session::get('user_id');
				$data = UserModel::getSummaryData($user_id);
				return View::make('user.summary')->with(array('data'=>$data));	
			}
			App::abort(403);
		}
		return Redirect::guest('/login');
	}

	//Transactions
	public function transactions()
	{
		if(Session::get('user_id'))
		{
			if(Session::get('account_type')=='customer')
			{
				$user_id = Session::get('user_id');
				$data = UserModel::getTransactions($user_id);
				return View::make('user.transactions')->with('data',$data);
			}
			App::abort(403);
		}
		return Redirect::guest('/login');
	}

	//Transaction View
	public function viewTransaction($transaction_id)
	{
		if(Session::get('user_id'))
		{
			if(Session::get('account_type')=='customer')
			{
				$user_id = Session::get('user_id');
				$data = UserModel::getTransaction($user_id, $transaction_id);
				return View::make('user.transactionView')->with('data',$data);
			}
			App::abort(403);
		}
		return Redirect::guest('/login');
	}

	//Settings View
	public function userSettingsView()
	{

		if(Session::get('user_id'))
		{
			if(Session::get('account_type')=='customer')
			{
				$user_id = Session::get('user_id');
		 		$data = UserModel::getUserData($user_id);
		 		return View::make('user.profile')->with('data',$data);
		 	}
			App::abort(403);
		}
		App::abort(403);
	}
	
	//Account Details View
	public function accountDetailsView()
	{

		if(Session::get('user_id'))
		{
			if(Session::get('account_type')=='customer')
			{
				$user_id = Session::get('user_id');
		 		$data = UserModel::getAccountDetails($user_id);
		 		return View::make('user.accountdetails')->with('data',$data);
		 	}
			App::abort(403);
		}
		App::abort(403);
	}
	
	//Add Beneficiary
    public static function addBeneficiary()
	{
		if (Session::get('user_id')) {
			if (Session::get('account_type') == 'customer' ) {
                $inputs = Input::all();
				$validator = UserModel::beneficiaryValidate($inputs);

				if($validator->passes())
				{
					UserModel::addBeneficiary($inputs);
					Session::flash('beneficiary_message','Beneficiary added');
					return Redirect::to('/transfer'); 
				}
				else
				{
	             	Session::flash('beneficiary_message','Something went wrong, please correct your inputs.');
					return Redirect::to('/transfer')->withErrors($validator)->withInput(); 
				}
				return Redirect::to('/transfer');
			}
			App::abort(403);
		}
		App::abort(403);
	}
	
	//Add Beneficiary - View
    public static function addBeneficiaryView()
	{
		if (Session::get('user_id')) {
			if (Session::get('account_type') == 'customer' ) {
               return View::make('user.beneficiary');
			}
			App::abort(403);
		}
		App::abort(403);
	}
	
	
	//Bill Pay Details View
	public function billPayView()
	{
        $accounts = Account::all();
		if(Session::get('user_id'))
		{
			if(Session::get('account_type')=='customer')
			{
				$user_id = Session::get('user_id');
		 		$data = UserModel::getBillDetails($user_id);
		 		return View::make('user.billpay')->with('data',$data)->with('accounts',$accounts);
		 	}
			App::abort(403);
		}
		App::abort(403);
	}
	
	//Transfer Details View
	public function transferDetailsView()
	{
        $beneficiaries = Beneficiary::all();
		if(Session::get('user_id'))
		{
			if(Session::get('account_type')=='customer')
			{
				$user_id = Session::get('user_id');
		 		$data = UserModel::getTransferDetails($user_id);
		 		return View::make('user.transfer')->with('beneficiaries',$beneficiaries);
		 	}
			App::abort(403);
		}
		App::abort(403);
	}
	
	//Change Password View
	public function userPasswordView()
	{

		if(Session::get('user_id'))
		{
			$user_id = Session::get('user_id');
		 	return View::make('user.password');
		}
		App::abort(403);
	}


	//Edit Users informations 
	public function editInfo()
	{
		if(Session::get('user_id'))
		{
			if(Session::get('account_type')=='customer')
			{
				$user_id = Session::get('user_id');
				$validator = UserModel::validateInfo();

				if(!$validator->passes())
				{
					$data = UserModel::editUserInfo($user_id);
					if ($data) {
					    Session::flash('editInfo_message','Changes were successful.');
					    return Redirect::to('/userprofile');   
					} else {
					    Session::flash('editInfo_message','Something went wrong, please correct your inputs.');
					    return Redirect::to('/userprofile')->withErrors($validator)->withInput();  
					}
				}
				else
				{
	             	Session::flash('editInfo_message','Something went wrong, please correct your inputs.');
					return Redirect::to('/userprofile')->withErrors($validator)->withInput();   
				}
			}
			App::abort(403);
		}
		App::abort(403);
	}

	//Edit Password
	public function editPassword()
	{
		if(Session::get('user_id') )
		{
		    $user_id = Session::get('user_id');
					$validator = UserModel::validatePassword();

				 	if($validator->passes())
					{
						$data = UserModel::editPassword($user_id);
						if($data)
						{
							Session::flash('editPassword_message','Password is updated.');
							return Redirect::to('/changepassword');
													
						}
						else
						{
							Session::flash('editPassword_message','Oops, The old password provided is wrong.');
							return Redirect::to('/changepassword')->withErrors($validator)->withInput();
						}
						
					}
					else
					{
		             	Session::flash('editPassword_message','Something went wrong, please correct your inputs.');
						return Redirect::to('/changepassword')->withErrors($validator)->withInput();   
					}
 		}
 		App::abort(403);
 	}

 	//Search View
 	public function userSearch()
	{
          return View::make('user.search');	
	}

	//Search View
 	public function userSearchView()
	{
          return View::make('user.search');	
	}
}
