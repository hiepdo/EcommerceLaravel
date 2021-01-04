<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Comment;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;
session_start();

class CartController extends Controller
{
    
    //Cart Ajax
    public function add_cart_ajax(Request $request)
    {
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true)
        {
            $is_avaiable = 0;
            foreach($cart as $key => $val)
            {
                if($val['product_id']==$data['cart_product_id']){
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0)
            {
                $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
                );
                Session::put('cart',$cart);
            }
        }
        else
        {
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],

            );
            Session::put('cart',$cart);
        }
        Session::save();
    }

    public function show_cart_ajax()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        return view('pages.cart.cart_ajax')->with('category', $cate_product)->with('brand',$brand_product);
    }

    public function delete_cart_ajax($session_id)
    {
        $cart = Session::get('cart');
        if($cart == true)
        {
            foreach($cart as $key => $val)
            {
                if($val['session_id']==$session_id)
                {
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return Redirect()->back()->with('message', 'Delete product successfully');
        }
        else
        {
            return Redirect()->back()->with('message', 'Delete product failed');
        }
    }

    public function update_cart_ajax(Request $request)
    {
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart==true)
        {
            foreach($data['cart_quatity'] as $key => $qty)
            {
                foreach($cart as $session => $val)
                {
                    if($val['session_id'] == $key)
                    {
                        $cart[$session]['product_qty'] = $qty;
                    }
                }
            }
            Session::put('cart', $cart);
            return Redirect()->back()->with('message', 'Update cart successfully');
        }
        else
        {
            return Redirect()->back()->with('message', 'Update cart failed');
        }
    }

    public function clear_all_cart_ajax()
    {
        $cart = Session::get('cart');
        if($cart == true)
        {
            Session::forget('cart');
            return Redirect()->back()->with('message', 'Clear cart successfully');
        }
        else
        {
            return Redirect()->back()->with('message', 'Clear cart failed');
        }
    }
}
