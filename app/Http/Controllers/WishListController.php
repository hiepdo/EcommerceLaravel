<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Comment;
use App\Models\Wishlist;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class WishListController extends Controller
{
    //WishList Ajax
    public function add_wishlist_ajax(Request $request)
    {
        $customer = Session::get('customer_id');
        if($customer!=null){
            $data = $request->all();
            $wishList = new WishList();
            $wishList->customers_id =  Session::get('customer_id');
            $wishList->product_id = $data['product_id'];
            $wishList->save();
            Session::put('message','Thêm yêu thích thành công');
            
        }else{
            Session::put('message','Bạn chưa đăng nhập, Bạn nên đăng nhập để yêu thích được lưu');
        }
    }
    public function delete_wishlist_ajax(Request $request){
        $customer = Session::get('customer_id');
        if($customer!=null){
            $data = $request->all();
            $product_id = $data['product_id'];

            // $wishlist = array();
            // $wishlist['customers_id'] = Session::get('customer_id');
            // $wishlist['product_id'] = $data['product_id'];
            $wishList =  WishList::where('customers_id',$customer)->where('product_id',$product_id);
            $wishList->delete();
            Session::put('message','Xóa yêu thích thành công');
        }else{
            Session::put('message','Bạn chưa đăng nhập, Bạn nên đăng nhập để yêu thích được lưu');
        }
    }
    public function show_wishlist_localstorage(){
        $customer_id = session::get('customer_id');
        $Like_Not_Like = DB::table('tbl_wishlist')->where('customers_id',$customer_id)->get();
        $customer_id = session::get('customer_id');
        $numberlike_customer = DB::table('tbl_wishlist')->select(DB::raw('count(product_id) as numberlike'))->where('customers_id',$customer_id)->get();
        $numberlike = Session::get('numberlike_customer');
        foreach($numberlike_customer as $key=>$value){
            $numberlike =$value->numberlike;
        }
        Session::put('numberlike_customer', $numberlike);
        $cate_product = DB::table('tbl_category_product')->where('category_status','0') ->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $all_product = DB::table('tbl_product')
        ->join('tbl_wishlist','tbl_wishlist.product_id','=','tbl_product.product_id')
        ->where('tbl_wishlist.customers_id',$customer_id)
        ->where('product_status','0')->orderby('tbl_product.product_id','desc')->paginate(6); 
        $all_product_full =  DB::table('tbl_product')->get();

        return view('pages.wishlist.wishlist_local')
        ->with('category', $cate_product)
        ->with('brand',$brand_product)
        ->with('all_product',$all_product)
        ->with('all_product_full',$all_product_full)
        ->with('Like_Not_Like',$Like_Not_Like);

    }

    
}
