<?php

namespace App;

use DB;

use Cache;

use Input;

use Session;

use stdClass;

use Validator;

use App;

class UserModel {


     //Get Summary Data
    public static function getSummaryData($user_id)
    {
        $cache_key = 'getUserSummary'.$user_id;
        $data = [];
        
        $transactions = Cache::remember($cache_key,5,function() use($user_id){
            $transactions = DB::table('transactions')
                                ->join('accounts', 'transactions.account_id', '=', 'accounts.id')
                                ->where('accounts.user_id',$user_id)
                                ->where('transactions.status', 'Enabled')
                                ->select('transactions.id','accounts.account_number','transactions.amount','transactions.description','transactions.charges','transactions.transaction_date', 'transactions.status')
                                ->take(5)
                                ->orderBy('transactions.transaction_date','DESC')
                                ->get();

            return $transactions;
        });

        $account_details = DB::table('accounts')
                            ->where('user_id',$user_id)
                            ->select('account_balance', 'account_type', 'account_number')
                            ->get();

        $data['first_name'] = Session::get('first_name');
        $data['last_name'] = Session::get('last_name');
        $data['last_login'] = Session::get('last_login');
        $data['account_details'] = $account_details;
        $data['transactions'] = $transactions;

        return $data;
    }

    //Get Transactions
    public static function getTransactions($user_id)
    {

        $cache_key = 'getUserTransactions'.$user_id;
        $data = Cache::remember($cache_key,5,function() use($user_id)
        {
            $data = DB::table('transactions')
                                ->join('accounts', 'transactions.account_id', '=', 'accounts.id')
                                ->where('user_id',$user_id)
                                ->where('status', '<>', 'Enabled')
                                ->select('id','accounts.account_number','amount','description','charges','transaction_date')
                                ->orderBy('transaction_date','DESC')
                                ->limit(20)
                                ->get();
            return $data;
        });
        return $data; 
    }

    //Get Transaction
    public static function getTransaction($user_id, $transaction_id)
    {
        $data = DB::table('transactions')
                                ->join('accounts', 'transactions.account_id', '=', 'accounts.id')
                                ->where('user_id',$user_id)
                                ->where('status','<>', 'Initiated')
                                ->where('id',$transaction_id)
                               ->select('id','accounts.account_number','amount','description','charges','transaction_date')
                                ->orderBy('transaction_date','DESC')
                                ->first();
        return $data;
    }

    //Get User Data
    public static function getUserData($user_id)
    {
        $data = DB::table('users')
                            ->where('id',$user_id)
                            ->select('id', 'first_name', 'last_name','email','phone_no', 'middle_name', 'address_one', 'address_two', 'ssn', 'dob', 'occupation', 'next_of_kin')
                            ->first();
        return $data;
    }

    //Edit User Information
    public static function editUserInfo($user_id)
    {

        $update_data = array(
                         'first_name' => Input::get('first_name'),
                         'last_name' => Input::get('last_name'),
                         'middle_name' => Input::get('middle_name'),
                         'phone_no' => Input::get('phone_no'),
                         'email' => Session::get('email'),
                         'address_one' => Input::get('address_one'),
                         'address_two' => Input::get('address_two'),
                         'dob' => Input::get('dob'),                              
                         'occupation' => Input::get('occupation'),
                         'ssn' => Input::get('ssn'),
                         'next_of_kin' => Input::get('next_of_kin')
                        );

       $update = DB::table('users')
                    ->where('id',$user_id)
                    ->update($update_data);  

        Session::put('first_name',Input::get('first_name'));
        Session::put('last_name',Input::get('last_name'));
        Session::put('phone_no',Input::get('phone_no'));
        Session::put('email',Session::get('email'));

        return $update_data;
    }
    
    public static function getAccountDetails($user_id)
    {
        $cache_key = 'getAccount'.$user_id;
        $data = Cache::remember($cache_key, 5, function() use ($user_id) {
            $accounts = DB::table('accounts')
                ->join('users', 'accounts.user_id', '=', 'users.id')
                ->where('accounts.user_id', $user_id)
                ->select('accounts.id','accounts.account_name', 'accounts.account_number', 'accounts.account_balance', 'accounts.account_type', 'accounts.status')
                ->first();
            return $accounts;
        });
        if ($data) {
            return $data;
        }
        return null;
    }
    
    public static function getBillDetails($user_id)
    {
        $cache_key = 'getBill'.$user_id;
        $data = Cache::remember($cache_key, 5, function() use ($user_id) {
            $accounts = DB::table('accounts')
                ->join('users', 'accounts.user_id', '=', 'users.id')
                ->where('accounts.user_id', $user_id)
                ->select('accounts.id','accounts.account_name', 'accounts.account_number', 'accounts.account_balance', 'accounts.status')
                ->first();
            return $accounts;
        });
        if ($data) {
            return $data;
        }
        return null;
    }
    
    public static function getTransferDetails($user_id)
    {
        $cache_key = 'getTransferDetail'.$user_id;
        $data = Cache::remember($cache_key, 5, function() use ($user_id) {
            $accounts = DB::table('accounts')
                ->join('users', 'accounts.user_id', '=', 'users.id')
                ->where('accounts.user_id', $user_id)
                ->select('accounts.id','accounts.account_name', 'accounts.account_number', 'accounts.account_balance', 'accounts.status')
                ->first();
            return $accounts;
        });
        if ($data) {
            return $data;
        }
        return null;
    }

    public static function viewAccount($id)
    {
        $cache_key = 'viewAccount'.$id;
        $data = Cache::remember($cache_key,5,function() use ($id) 
        {
             $account = DB::table('accounts')
                                ->join('users', 'accounts.user_id', '=', 'users.id')
                                ->select('accounts.id','accounts.account_name','accounts.account_number','accounts.account_balance','accounts.account_type', 'users.email', 'accounts.status', 'accounts.updated_at', 'accounts.created_at')
                                ->orderBy('accounts.created_at','DESC')
                                ->get();

            return $account;
        });

        if($data)
            return $data;
        else
            return null;
    }

     //Validate User Information
    public static function validateInfo()
    {
        $rules = array(
                        'first_name'=>'required|max:20|min:3',
                        'last_name'=>'required|max:20|min:3',
                        'phone_no'=>'required|max:20|min:11', 
                        'address_one'=>'required|max:100|min:11',
                        'dob'=>'required|max:50|min:11',
                        'occupation'=>'required|max:20|min:6',
                        'ssn'=>'required|max:20|min:10',
                        'next_of_kin'=>'required|max:50|min:30',
                      );

        $data = Input::except('email','edit_info');
        $validator = Validator::make($data,$rules);
        return $validator;
    }

    //Edit Password
    public static function editPassword($user_id)
    {
    
        $new_password = Input::get('new_password');
        $old_password = Input::get('old_password');

        $get_password = DB::table('users')->where('id',$user_id)->select('password')->first();

        $update_data = array(
                         'password' =>md5($new_password),
                         'first_name' => Session::get('first_name'),
                         'last_name' => Session::get('last_name'),
                         'email' => Session::get('email')
                        );

        if(md5($old_password)==$get_password->password)
        {
            $update = DB::table('users')->where('id',$user_id)->update($update_data);
            return true; 
        }
        else
        {
            return false;
        }

        Session::put('email',Session::get('email'));
        Session::put('first_name',Session::get('first_name'));
        Session::put('last_name',Session::get('last_name'));
    }

    //Edited Password
    public static function editedPassword($user_id)
    {
        $updated_data = array(
                         'first_name' => Session::get('first_name'),
                         'last_name' => Session::get('last_name'),
                         'email' => Session::get('email')
                        );

        $update = DB::table('users')->where('id',$user_id)->update($updated_data); 

        Session::put('email',Session::get('email'));
        Session::put('first_name',Session::get('first_name'));
        Session::put('last_name',Session::get('last_name'));

        return $updated_data;
    }

    //Validate Password
    public static function validatePassword()
    {
        $rules = array(
                        'old_password'=>'required',
                        'new_password'=>'required|min:8|max:20',
                      );

        $validator = Validator::make(Input::all(),$rules);
        return $validator;

    }
    
    public static function addBeneficiary($inputs)
    {
        $insert_data = array(
                'account_number'=>$inputs['account_number'],
                'name'=>$inputs['name'],
                'created_at'=> date('Y-m-d H:i:s'),
                'status' => 'Enabled'
            );
        
        $insert = DB::table('beneficiaries')->insert($insert_data);
        return $insert_data;
    }

    public static function beneficiaryValidate($inputs)
    {
        
        $rules = array(
                'name'=>'required|max:20',
                'account_number'=>'required|max:16'
            );

        
        $validator = Validator::make($inputs,$rules);
        return $validator;

    }
    
    //Get Beneficiaries
    public static function getBeneficiaries()
    {
        $cache_key = 'getBeneficiaries';
        $data = Cache::remember($cache_key,5,function() 
        {
            $data = DB::table('beneficiaries')
                                ->select('name','account_number','created_at','status')
                                ->orderBy('created_at','DESC')
                                ->get();
            return $data;
         });

            return  $data;
    }

}