<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Carbon\Carbon;
use App\Customer;
use Mail;


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

    public function to_forget_password()
    {
        return view('pages.forget_password');
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

    public function recover_pass(Request $request)
    {
        $data = $request->email_account;
        $time_now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $title_mail = "Lấy lại mật khẩu tài khoản ".$time_now;
        $customer = DB::table('tbl_customers')->where('customer_email', $data)->get();
        // foreach($customer as $key => $value){
        //     $customer_id = $value->customer_id;
        // }
        if($customer)
        {
            $count_customer = $customer->count();
            if($count_customer == 0)
            {
                return redirect()->back()->with('error', 'Email chưa được đăng ký');
            }
            else{
                $token_random = Str::random();
                $customer = DB::table('tbl_customers')->where('customer_email', $data)
                            ->update(['customer_token' => $token_random]);
            
                //send mail
                $to_email = $data;//send to this email
                $link_reset_pass = url('/reset-password?email='.$to_email.'&token='.$token_random);
                $data = array("name"=>$title_mail, "body"=>$link_reset_pass, 'email'=>$data); //body of mail.blade.php
                Mail::send('pages.send_mail', $data, function($message) use ($title_mail,$data){
                    $message->to($data['email'])->subject($title_mail);//send this mail with subject
                    $message->from($data['email'], $title_mail);//send from this mail
                });
                //return redirect()->back()->with('message', 'Gửi mail thành công, vui lòng kiểm tra email để đổi mật khẩu');
                //--send 
                return redirect::to('/Home');
            }
        }

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
