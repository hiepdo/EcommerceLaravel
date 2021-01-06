<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Customer;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();    

class OrderController extends Controller
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

    public function manage_order()
    {
        $order = Order::orderby('created_at','DESC')->get();
    	return view('admin.manage_order')->with(compact('order'));
    }
    public function view_order($orderId)
    {
        $order_details = OrderDetails::where('order_id',$orderId)->get();
        $order = Order::where('order_id',$orderId)->get();
        foreach($order as $key => $ord)
        {
			$customer_id = $ord->customer_id;
			$shipping_id = $ord->shipping_id;
        }
        $customer = Customer::where('customer_id',$customer_id)->first();
		$shipping = Shipping::where('shipping_id',$shipping_id)->first();

        $order_details = OrderDetails::with('product')->where('order_id', $orderId)->get();
        
        return view('admin.view_order')->with(compact('order_details','customer','order_details','shipping'));
    }

    public function delete_order($orderId)
    {
        /* $this->AuthenLogin();
        DB::table('tbl_order')->where('order_id',$orderId)->delete();
        Session::put('message','Xóa đơn hàng thành công');
        return Redirect::to('manage-order');     */  

        $order = Order::find($orderId);
        $order->delete();
        Session::put('message','Xóa đơn hàng thành công');
        return Redirect::to('manage-order');
    }
}
