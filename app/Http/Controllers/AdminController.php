<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Models\Statistic;
session_start();


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
        $admin_password = $data['admin_password'];
        $login = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if($login){ 
            Session::put('admin_name',$login->admin_name);
            Session::put('admin_id',$login->admin_id);
            return Redirect::to('/dashboard');
        }else{
                Session::put('message','Mật khẩu hoặc tài khoản bị sai.Làm ơn nhập lại');
                return Redirect::to('/admin');
        }
    }           

    public function logout()
    {
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        Session::put('logged', false);
        return Redirect::to('/admin');
    }

    public function filter_by_date(Request $request)
    {
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
        $get = Statistic::whereBetween('order_date', [$from_date, $to_date])->orderBy('order_date', 'ASC')->get();
        foreach($get as $key => $val)
        {
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
            );
        }
        echo $data = json_encode($chart_data);
    }
}
