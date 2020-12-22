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
    public function to_register()
    {
        return view('pages.register_user');
    }

    public function register_user(Request $request)
    {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_verification_code'] = Str::random();
        $customer_id = Customer::insertGetId($data);
        //send mail
        if($data != null)
        {
            $title_mail = 'Xác nhận tài khoản đăng ký';
            $to_email = $data['customer_email'];//send to this email
            $link_verify = url('/verify?email='.$to_email.'&code='.$data['customer_verification_code']);
            $data = array("body"=>$link_verify, 'email'=>$to_email); //body of mail.blade.php
            Mail::send('pages.register_verify_mail', $data, function($message) use ($title_mail,$data){
                $message->to($data['email'])->subject($title_mail);//send this mail with subject
                $message->from('ltweb1082@gmail.com', 'EcommerceLaravel');//send from this mail
            });
        
            // Session::put('customer_id', $customer_id);
            // Session::put('customer_name', $request->customer_name);
            return redirect()->back()->with('message', 'Đã gửi mail xác nhận, vui lòng kiểm tra email'); 
        }
        else{
            return redirect()->back()->with('error', 'Lỗi đăng ký tài khoản, vui lòng kiểm tra lại');
        }  
    }

    public function verify_user(Request $request){
        $verification_code = \Illuminate\Support\Facades\Request::get('code');
        print_r($verification_code);
        $customer = Customer::where('customer_verification_code', $verification_code)->first();
        if($customer != null)
        {
            $customer->customer_is_verified = 1;
            $customer->save();
            return redirect('/login');
        }
        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);
        // return redirect()->back()->with('message', 'Đăng ký thành công');
        return Redirect('/login');

    }

    public function login_user(Request $request)
    {
    	$email = $request->email_account;
    	$password = md5($request->password_account);
    	$result = Customer::where('customer_email',$email)->where('customer_password',$password)->first();
        if($result != null){
            if($result->customer_is_verified == 1){
                Session::put('customer_id', $result->customer_id);
                Session::put('customer_name', $result->customer_name);
                Session::save();
                return redirect()->back()->with('message', 'Đăng nhập thành công');
            }else{
                return redirect()->back()->with('error', 'Tài khoản của bạn chưa xác nhận, vui lòng kiểm tra email');
            }
        }
        else{
            return redirect()->back()->with('error', 'Sai tên tài khoản hoặc mật khẩu, vui lòng kiểm tra lại');
        }
    	if($result){
    		Session::put('customer_id',$result->customer_id);
            // return redirect()->back()->with('message', 'Đăng nhập thành công');
            return Redirect('/Home');
    	}else{
    		return redirect()->back()->with('error', 'Sai tên tài khoản hoặc mật khẩu, vui lòng kiểm tra lại');
    	}
        Session::save();
    }

    public function recover_pass(Request $request)
    {
        $data = $request->email_account;
        $time_now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $title_mail = "Lấy lại mật khẩu tài khoản ".$data.' '.$time_now;
        $customer = Customer::where('customer_email', $data)->get();
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
                $customer = Customer::where('customer_email', $data)
                            ->update(['customer_token' => $token_random]);
            
                //send mail
                $to_email = $data;//send to this email
                $link_reset_pass = url('/reset-password?email='.$to_email.'&token='.$token_random);
                $data = array("name"=>$title_mail, "body"=>$link_reset_pass, 'email'=>$data); //body of mail.blade.php
                Mail::send('pages.reset_pass_mail', $data, function($message) use ($title_mail,$data){
                    $message->to($data['email'])->subject($title_mail);//send this mail with subject
                    $message->from('ltweb1082@gmail.com', 'EcommerceLaravel');//send from this mail
                });
                return redirect()->back()->with('message', 'Gửi mail thành công, vui lòng kiểm tra email để đổi mật khẩu');
                //--send 
                
            }
        }

    }

    public function reset_password(Request $request)
    {
        return view('pages.reset_password');
    }

    public function update_password(Request $request)
    {
        $data = $request->all();
        $token_random = Str::random();
        $customer = Customer::where('customer_email', $data['email'])->where('customer_token', $data['token'])->get();
        if($customer->count() > 0)
        {
            foreach($customer as $key => $cus){
                $customer_id = $cus->customer_id;
            }
            $reset = Customer::find($customer_id);
            $reset->customer_password = md5($data['new-password']);
            $reset->customer_token = $token_random;
            $reset->save();
            return redirect()->back()->with('message', 'Đổi mật khẩu thành công, quay lại trang đăng nhập');
        }
        else{
            return redirect()->back()->with('error', 'Vui lòng nhập lại email vì đường dẫn đã hết hạn');
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
