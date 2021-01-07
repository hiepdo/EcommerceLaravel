<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Validator;
use Carbon\Carbon;
use App\Models\Customer;
use Mail;
use App\Models\Social;
/*use App\Social; //sử dụng model Social*/
use Socialite; //sử dụng Socialite
// use App\Login; //sử dụng model Login
use App\Models\Login;
session_start();




class HomeController extends Controller
{
    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook(){
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        if($account){
            $account_name = Login::where('customer_id',$account->user)->first();
            if($account_name)
            {
                Session::put('customer_id', $account_name->customer_id);
                Session::put('customer_name', $account_name->customer_name);
                Session::put('logged', true);
                return redirect(Session::get('previousUrl'));            
            } 
        }else{

            $customer_new = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook'
            ]);

            $orang = Login::where('customer_email',$provider->getEmail())->first();

            if(!$orang){
                $orang = Login::create([
                    'customer_name' => $provider->getName(),
                    'customer_email' => $provider->getEmail(),
                    'customer_password' => '',
                    'customer_phone' => ''
                ]);
            }
            $customer_new->login()->associate($orang);
            $customer_new->save();
            $account_name = Login::where('customer_id',$customer_new->user)->first();
            if($account_name)
            {
                Session::put('customer_id', $account_name->customer_id);
                Session::put('customer_name', $account_name->customer_name);               
                Session::put('logged', true);
                return redirect(Session::get('previousUrl'));
            }
            else
                return redirect('/login')->with('message', 'Đăng nhập không thành công');    
        } 
        return redirect('/login')->with('message', 'Đăng nhập không thành công');
    }
    public function login_google(){
        return Socialite::driver('google')->redirect();
    }
    public function callback_google(){
        $users = Socialite::driver('google')->stateless()->user(); 
        // return $users->id;
        $authUser = $this->findOrCreateUser($users,'google');
        if($authUser)
        {
            $account_name = Login::where('customer_id',$authUser->user)->first();
            if($account_name)
            {
                Session::put('customer_id',$account_name->customer_id);
                Session::put('customer_name',$account_name->customer_name);
                Session::put('logged', true);
                return redirect(Session::get('previousUrl'));
            }
            
        }else if($customer_new)
        {
            $account_name = Login::where('customer_id',$authUser->user)->first();
            if($account_name)
            {
                Session::put('customer_id',$account_name->customer_id);
                Session::put('customer_name',$account_name->customer_name);
                Session::put('logged', true);
                return redirect(Session::get('previousUrl'));
            }
        }
        return redirect('/login')->with('message', 'Đăng nhập không thành công');
      
    }
    public function findOrCreateUser($users,$provider){
        $authUser = Social::where('provider_user_id', $users->id)->first();
        if($authUser){

            return $authUser;
        }
        else{
            $customer_new = new Social([
                'provider_user_id' => $users->id,
                'provider' => strtoupper($provider)
            ]);
    
            $orang = Login::where('customer_email',$users->email)->first();
    
                if(!$orang){
                    $orang = Login::create([
                        'customer_name' => $users->name,
                        'customer_email' => $users->email,
                        'customer_password' => '',
                        'customer_phone' => '',
                    ]);
                }
            $customer_new->login()->associate($orang);
            $customer_new->save();
            
            return $customer_new;
        }
        $account_name = Login::where('customer_id',$authUser->user)->first();
        Session::put('customer_name',$account_name->customer_name);
        Session::put('customer_id)',$account_name->customer_id);
        return redirect('/Home')->with('message', 'Đăng nhập thành công');
    }


    public function home()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','0') ->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')  ->orderby('brand_id','desc')->get();
        
        $all_product  = DB::table('tbl_product')->where('product_status','0')  ->orderby('product_id','desc')->limit(6  )->get();
        return view('pages.home')->with('category', $cate_product)->with('brand',$brand_product)->with('all_product',$all_product);
    }

    public function to_login()
    {
        $preUrl = URL::previous();
        Session::put('previousUrl', $preUrl);
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
        
        return Redirect('/login');

    }

    public function login_user(Request $request)
    {
    	$email = $request->email_account;
    	$password = md5($request->password_account);
    	$result = Customer::where('customer_email',$email)->where('customer_password',$password)->first();
    	
    	if($result){
            Session::put('customer_id', $result->customer_id);
            Session::put('customer_name', $result->customer_name);
            Session::put('logged', true);
            return redirect(Session::get('previousUrl'));
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
        $cate_product = DB::table('tbl_category_product')->where('category_status','0') ->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')  ->orderby('brand_id','desc')->get();
        
        $all_product  = DB::table('tbl_product')->where('product_status','0')  ->orderby('product_id','desc')->limit(6  )->get();
        return view('pages.product')->with('category', $cate_product)->with('brand',$brand_product)->with('all_product',$all_product);
    }

    public function logout()
    {
        Session::put('customer_id',null);
        Session::put('customer_name',null);
        Session::put('logged', false);
        Session::forget('cart');
        return Redirect::to('/Home');
    }

    public function all_customer_account(){
        $this->AuthenLogin();
        $all_customer_account = DB::table('tbl_customers')->get();
        $manager_customer_account  = view('admin.all_customer_account')->with('all_customer_account',$all_customer_account);
        return view('admin_layout')->with('admin.all_customer_account', $manager_customer_account);
    }

    public function about_us()
    {
        return view('pages.about_us');
    }

    public function contact_us()
    {
        return view('pages.contact_us');
    }

    public function AuthenLogin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id)
        {
           return Redirect::to('dashboard');
        }
        else
        {
           return Redirect::to('admin')-> send();
        }
    }
}
