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
    public function save_cart(Request $request)
    {
        $product_id = $request->product_id_hidden; 
       
        $quantity = $request->product_quatity;

        $product_info = DB::table('tbl_product')->where('product_id',$product_id)->first();

        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = '100';
        $data['options']['image'] = $product_info->product_image;
        
        Cart::add($data);
        return Redirect::to('/show-cart');
    }

    public function show_cart()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        return view('pages.cart.show_cart')->with('category', $cate_product)->with('brand',$brand_product);
    }
}
