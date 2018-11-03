<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\AdminModel;

use App\UserModel;

use App\User;

use App\Account;

use App;

use Session;

use View;

use Redirect;

use Input;

use Response;

use Mail;

class adminController extends Controller {

	//Summary
	public static function summary()
	{
		if(Session::get('user_id'))
		{
			if(Session::get('account_type') == 'admin')
			{
				$data = AdminModel::getSummaryData();
				return View::make('admin.summary')->with(array('data'=>$data));
			}
			App::abort(403);
		}
		App::abort(403);
	}

	//Transactions
	public static function transactions()
	{
		if(Session::get('user_id'))
		{
			if(Session::get('account_type') == 'admin' )
			{
				$data = AdminModel::getTransactions();
				return View::make('admin.transactions')->with('data',$data);
			}
			App::abort(403);
		}
		App::abort(403);
	}

	//View Transaction
	public static function viewTransaction($id)
	{
		if(Session::get('user_id'))
		{
			
			if( Session::get('account_type') == 'admin' )
			{
				$data = AdminModel::viewTransaction($id);
				return View::make('admin.viewTransaction')->with('data',$data);
			}
			App::abort(403);
		}
		App::abort(403);
	}

	//Accounts
	public static function accounts()
	{
		if(Session::get('user_id'))
		{
			if(Session::get('account_type') == 'admin' )
			{
				$data = AdminModel::getAccounts();
				return View::make('admin.accounts')->with('data',$data);
			}
			App::abort(403);
		}
		App::abort(403);
	}

	//View Account
	public static function viewAccount($id)
	{
		if(Session::get('user_id'))
		{
			
			if( Session::get('account_type') == 'admin' )
			{
				$data = AdminModel::viewAccount($id);
				return View::make('admin.viewAccount')->with('data',$data);
			}
			App::abort(403);
		}
		App::abort(403);
	}


	//Accounts
	public static function users()
	{
		if(Session::get('user_id'))
		{
			if(Session::get('account_type') == 'admin' )
			{
				$data = AdminModel::getUsers();
				return View::make('admin.users')->with('data',$data);
			}
			App::abort(403);
		}
		App::abort(403);
	}

	//View User
	public static function viewUser($id)
	{
		if(Session::get('user_id'))
		{
			
			if( Session::get('account_type') == 'admin' )
			{
				$data = AdminModel::viewUser($id);
				return View::make('admin.viewUser')->with('data',$data);
			}
			App::abort(403);
		}
		App::abort(403);
	}

	public static function changeUserStatus($user_id)
	{
		if (Session::get('user_id')) {
			if (Session::get('account_type') == 'admin') {
				$status = Input::get('status');
				$data = AdminModel::changeUserStatus($user_id, $status);

				if ($data) {
					Session::flash('user_success_message','User Status changed!');
					return Redirect::to('/admin/users');
				} else {
					Session::flash('user_failed_message','User Status could not be changed!');
					return Redirect::to('/admin/users/'.$user_id);
				}
			}
			App::abort(403);
		}
		App::abort(403);
	}
	
	//Reports Veiw
	public static function reports()
	{
		if(Session::get('user_id'))
		{
			if(Session::get('account_type') == 'admin')
			{
				return  View::make('admin.reports');
			}
			App::abort(403);
		}
		App::abort(403);

	}

	//Reports 
	public static function getReports()
	{
		if(Session::get('user_id'))
		{
			if(Session::get('account_type') == 'admin' )
			{
				$data = AdminModel::getReports();
				return $data;
			}
			App:abort(403);
		}
		App::abort(403);
	}

	//Settings View
	public static function settings()
	{
		if(Session::get('user_id'))
		{
			if(Session::get('account_type') == 'admin' )
			{
				$user_id = Session::get('user_id');
		 		$data = AdminModel::getUserData($user_id);
				return View::make('admin.settings')->with('data',$data);
			}
			App::abort(403);
		}
		App::abort(403);
	}


	//Edit informations 
	public function editInfo()
	{
		if(Session::get('user_id'))
		{
			if(Session::get('account_type')=='admin')
			{
				$user_id = Session::get('user_id');
				$validator = AdminModel::validateInfo();

				if($validator->passes())
				{
					AdminModel::editUserInfo($user_id);
					Session::flash('editInfo_message','Changes were successful');
					return Redirect::to('/admin/settings');
				}
				else
				{
	             	Session::flash('editInfo_message','Something went wrong, please correct your inputs.');
					return Redirect::to('/admin/settings')->withErrors($validator)->withInput();   
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
			if(Session::get('account_type')=='admin')
				{
					$user_id = Session::get('user_id');
					$validator = AdminModel::validatePassword();

				 	if($validator->passes())
					{
						AdminModel::editPassword($user_id);
						Session::flash('editPassword_message','Transaction was successfully done, an SMS/Email will be sent to you shortly');
						return Redirect::to('/admin/settings');
					}
					else
					{
		             	Session::flash('editPassword_message','Error');
						return Redirect::to('/admin/settings')->withErrors($validator)->withInput();   
					}
				}
				App::abort(403);
 		}
 		App::abort(403);
 	}

 	//Search View
 	public function adminSearch()
	{
          return View::make('admin.search');	
	}

	//Messages
	public static function messages()
	{
		if(Session::get('user_id'))
		{
			if(Session::get('account_type') == 'admin' )
			{
				$data = AdminModel::getMessages();
				return View::make('admin.messages')->with('data',$data);
			}
			App::abort(403);
		}
		App::abort(403);
	}

	//View Message
	public static function viewMessage($message_id)
	{
		if(Session::get('user_id'))
		{
			
			if( Session::get('account_type') == 'admin' )
			{
				$data = AdminModel::viewMessage($message_id);
				return View::make('admin.viewMessage')->with('data',$data);
			}
			App::abort(403);
		}
		App::abort(403);
	}

	//Delete User
	public static function deleteUser($user_id)
	{
		if (Session::get('user_id')) {
			if (Session::get('account_type') == 'admin' ) {
				$data = AdminModel::deleteUser($user_id);

                                if($data) {
                           	  Session::flash('user_message','User deleted!');
                                } else {
				  Session::flash('user_message','User could not be deleted!');
                                }
				return Redirect::to('/admin/users');
			}
			App::abort(403);
		}
		App::abort(403);
	}

	//Edit User
    public static function editUser($user_id)
	{
		if (Session::get('user_id')) {
			if (Session::get('account_type') == 'admin' ) {
                $inputs = Input::all();
				$data = AdminModel::editUserInfo($user_id, $inputs);
                if($data) {
                	Session::flash('user_message','User edited!');
                } else {
					Session::flash('user_message','User could not be edited!');
                                }
				return Redirect::to('/users');
			}
			App::abort(403);
		}
		App::abort(403);
	}

	//Add User
    public static function addUser()
	{
		if (Session::get('user_id')) {
			if (Session::get('account_type') == 'admin' ) {
                $inputs = Input::all();
				$validator = AdminModel::userValidate($inputs);

				if($validator->passes())
				{
					AdminModel::addUser($inputs);
					Session::flash('user_message','User added');
					return Redirect::to('/users'); 
				}
				else
				{
	             	Session::flash('user_message','Something went wrong, please correct your inputs.');
					return Redirect::to('/createuser')->withErrors($validator)->withInput(); 
				}
				return Redirect::to('/users');
			}
			App::abort(403);
		}
		App::abort(403);
	}

	//Add User - View
    public static function addUserView()
	{
		if (Session::get('user_id')) {
			if (Session::get('account_type') == 'admin' ) {
               return View::make('admin.createUser');
			}
			App::abort(403);
		}
		App::abort(403);
	}

	//Edit User - View
    public static function editUserView($user_id)
	{
		if (Session::get('user_id')) {
			if (Session::get('account_type') == 'admin' ) {
                $data = AdminModel::getUserDetails($user_id);
                return View::make('admin.editUser')->with('data',$data);
			}
			App::abort(403);
		}
		App::abort(403);
	}

	//Delete Account
	public static function deleteAccount($account_id)
	{
		if (Session::get('user_id')) {
			if (Session::get('account_type') == 'admin' ) {
				$data = AdminModel::deleteAccount($account_id);

                                if($data) {
                           	  Session::flash('account_message','Account deleted!');
                                } else {
				  Session::flash('account_message','Account could not be deleted!');
                                }
				return Redirect::to('/admin/accounts');
			}
			App::abort(403);
		}
		App::abort(403);
	}

	//Edit Account
    public static function editAccount($account_id)
	{
		if (Session::get('user_id')) {
			if (Session::get('account_type') == 'admin' ) {
                $inputs = Input::all();
				$data = AdminModel::editAccount($account_id, $inputs);
                if($data) {
                	Session::flash('account_message','Account edited!');
                } else {
					Session::flash('account_message','Account could not be edited!');
                                }
				return Redirect::to('/accounts');
			}
			App::abort(403);
		}
		App::abort(403);
	}

	//Add Account
    public static function addAccount()
	{
		if (Session::get('user_id')) {
			if (Session::get('account_type') == 'admin' ) {
                $inputs = Input::all();
				$validator = AdminModel::accountValidate($inputs);

				if($validator->passes())
				{
					AdminModel::addAccount($inputs);
					Session::flash('account_message','Account added');
					return Redirect::to('/accounts'); 
				}
				else
				{
	             	Session::flash('account_message','Something went wrong, please correct your inputs.');
					return Redirect::to('/createaccount')->withErrors($validator)->withInput(); 
				}
				return Redirect::to('/accounts');
			}
			App::abort(403);
		}
		App::abort(403);
	}

	//Add Account - View
    public static function addAccountView()
	{
		$beneficiaries = Beneficiary::all();
		if (Session::get('user_id')) {
			if (Session::get('account_type') == 'admin' ) {
               return View::make('admin.addAccount');
			}
			App::abort(403);
		}
		App::abort(403);
	}

	//Edit Account - View
    public static function editAccountView($account_id)
	{
		if (Session::get('user_id')) {
			if (Session::get('account_type') == 'admin' ) {
                $data = AdminModel::getAccountDetails($account_id);
                return View::make('admin.editAccount')->with('data',$data);
			}
			App::abort(403);
		}
		App::abort(403);
	}

	//Delete Transaction
	public static function deleteTransaction($tx_id)
	{
		if (Session::get('user_id')) {
			if (Session::get('account_type') == 'admin' ) {
				$data = AdminModel::deleteTransaction($tx_id);
                if($data) {
                    Session::flash('tx_message','Transaction deleted!');
                    } else {
				  	Session::flash('tx_message','Transaction could not be deleted!');
                }
				return Redirect::to('/admin/transactions');
			}
			App::abort(403);
		}
		App::abort(403);
	}

	//Edit Transaction
    public static function editTransaction($tx_id)
	{
		if (Session::get('user_id')) {
			if (Session::get('account_type') == 'admin' ) {
                $inputs = Input::all();
				$data = AdminModel::editTransaction($tx_id, $inputs);
                if($data) {
                	Session::flash('tx_message','Transaction edited!');
                } else {
					Session::flash('tx_message','Transaction could not be edited!');
                                }
				return Redirect::to('/transactions');
			}
			App::abort(403);
		}
		App::abort(403);
	}

	//Add Transaction
    public static function addTransaction()
	{
		if (Session::get('user_id')) {
			if (Session::get('account_type') == 'admin' ) {
                $inputs = Input::all();
				$validator = AdminModel::transactionValidate($inputs);

				if($validator->passes())
				{
					AdminModel::addTransaction($inputs);
					Session::flash('tx_message','Transaction added');
					return Redirect::to('/transactions'); 
				}
				else
				{
	             	Session::flash('tx_message','Something went wrong, please correct your inputs.');
					return Redirect::to('/createtransaction')->withErrors($validator)->withInput(); 
				}
				return Redirect::to('/transactions');
			}
			App::abort(403);
		}
		App::abort(403);
	}

	//Add Transaction - View
    public static function addTransactionView()
	{
		if (Session::get('user_id')) {
			if (Session::get('account_type') == 'admin' ) {
               return View::make('admin.addTransaction');
			}
			App::abort(403);
		}
		App::abort(403);
	}

	//Edit Transaction - View
    public static function editTransactionView($tx_id)
	{
		if (Session::get('user_id')) {
			if (Session::get('account_type') == 'admin' ) {
                $data = AdminModel::getTransactionDetails($tx_id);
                return View::make('admin.editTransaction')->with('data',$data);
			}
			App::abort(403);
		}
		App::abort(403);
	}
}
