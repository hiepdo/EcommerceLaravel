<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Validator;


class HomeController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function to_login()
    {
        return view('pages.login_user');
    }

    public function register_user(Request $request)
    {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);
        $data['customer_phone'] = $request->customer_phone;

        $customer_id = DB::table('tbl_customers')->InsertGetId($data);
        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);
        return Redirect('/login');
    }

    public function login_user(Request $request)
    {
    	$email = $request->email_account;
    	$password = md5($request->password_account);
    	$result = DB::table('tbl_customers')->where('customer_email',$email)->where('customer_password',$password)->first();
    	
    	if($result){
    		Session::put('customer_id',$result->customer_id);
    		return Redirect::to('/Home');
    	}else{
    		return Redirect::to('/login');
    	}
        Session::save();

    }

    public function logout_checkout(){
    	Session::forget('customer_id');
    	return Redirect::to('/login');
    }

    public function products()
    {
        return view('pages.productdetail');
    }
    
    public function shop()
    {
        return view('pages.product');
    }

}
