<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Comment;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
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

    public function thankyou_customer()
    {
        return view('pages.checkout.thankyou');
    }
}
