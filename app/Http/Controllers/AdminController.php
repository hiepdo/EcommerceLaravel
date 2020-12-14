<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Validator;


class AdminController extends Controller
{
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
    public function admin()
    {
        return view('admin_login');
    }

    public function show()
    {
        $this->AuthenLogin();
        return view('admin.dashboard');
    }
    
    public function dashboard(Request $request)
    {
       
        //$data = $request->all();
        $data = $request->validate([
            //validation laravel 
            'admin_email' => 'required',
            'admin_password' => 'required',
        ]);
        $admin_email = $data['admin_email'];
        $admin_password = md5($data['admin_password']);
        $login = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if($login){ 
            Session::put('admin_name',$login->admin_name);
            Session::put('admin_id',$login->admin_id);
            return Redirect::to('/dashboard');
        }else{
                Session::put('message','Mật khẩu hoặc tài khoản bị sai.Làm ơn nhập lại');
        }       return Redirect::to('/admin');    
    }
}
