<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class OrderProduct extends Controller
{
    public function manage_order()
    {
        $all_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_customers.customer_id','=','tbl_order.customer_id')
        ->select('tbl_order.*','tbl_customers.customer_name')
        ->orderby('tbl_order.order_id','desc')->get();
    	$manager_order = view('admin.manage_order')->with('all_order',$all_order);
    	return view('admin_layout')->with('admin.manage_order', $manager_order);
    }
    public function view_order($orderId)
    {
        $order_by_id = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->select('tbl_order.*','tbl_customers.*', 'tbl_shipping.*', 'tbl_order_details.*')->first();
    	$manager_order_by_id = view('admin.view_order')->with('order_by_id',$order_by_id);
    	return view('admin_layout')->with('admin.view_order', $manager_order_by_id);
    }
}
