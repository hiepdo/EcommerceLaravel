<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Comment;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
session_start();

class CheckoutController extends Controller
{

    public function show_checkout()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','0') ->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')  ->orderby('brand_id','desc')->get();

        return view('pages.checkout.show_checkout')->with('category', $cate_product)->with('brand',$brand_product);
    }

    public function save_checkout_customer(Request $request)
    {
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_notes'] = $request->shipping_notes;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        Session::put('shipping_id', $shipping_id);

        return Redirect('/payment');
    }

    public function payment()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','0') ->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')  ->orderby('brand_id','desc')->get();

        return view('pages.checkout.payment')->with('category', $cate_product)->with('brand',$brand_product);
    }

    public function order_place(Request $request)
    {
        //insert payment
        $data = array();
        $data['payment_method'] = $request->payment_option;
        if($data['payment_method'] == 1)
        {
            $data['payment_method'] = 'ATM';
        }
        else if($data['payment_method'] == 2)
        {
            $data['payment_method'] = 'VISA';
        }
        else
        {
            $data['payment_method'] = 'HandCash';
        }
        $data['payment_status'] = 'Đang chờ xử lý';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        //insert order
        $total = 0;
        foreach(Session::get('cart') as $key => $cart)       
        {
            $subtotal = $cart['product_qty'] * $cart['product_price'];
            $total += $subtotal;
        }

        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $order_date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');

        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = $total;
        $order_data['order_status'] = 'Chờ xử lý';
        $order_data['order_date'] = $order_date;
        $order_data['created_at'] = $today;
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //insert order_detail
        foreach(Session::get('cart') as $key => $cart)
        {
            $order_detail_data = array();
            $order_detail_data['order_id'] = $order_id;
            $order_detail_data['product_id'] = $cart['product_id'];
            $order_detail_data['product_name'] = $cart['product_name'];
            $order_detail_data['product_price'] = $cart['product_price'];
            $order_detail_data['product_sales_quantity'] = $cart['product_qty'];
            DB::table('tbl_order_details')->insert($order_detail_data);
        }
        if($data['payment_method']==1)
        {
            Session::forget('cart');
            Session::forget('shipping_id');
            return view('pages.checkout.thankyou');
        }
        else if($data['payment_method']==2)
        {
            Session::forget('cart');
            Session::forget('shipping_id');
            return view('pages.checkout.thankyou');
        }
        else
        {
            Session::forget('cart');
            Session::forget('shipping_id');
            return view('pages.checkout.thankyou');
        }
    }
}
