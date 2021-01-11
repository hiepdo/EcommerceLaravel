<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
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
  
    public function add_category_product(){
        $this->AuthenLogin();
    	return view('admin.add_category_product');
    }
  
    public function all_category_product(){
        $this->AuthenLogin();
    	$all_category_product = DB::table('tbl_category_product')->orderBy('category_id', 'desc')->paginate(5);
    	$manager_category_product  = view('admin.all_category_product')->with('all_category_product',$all_category_product);
    	return view('admin_layout')->with('admin.all_category_product', $manager_category_product);
    }
    public function search_category_admin(Request $request){
        $keywords = $request->search;
        $this->AuthenLogin();
        $search_category = DB::table('tbl_category_product')
        ->where('category_id','like','%'.$keywords.'%')
        ->orwhere('category_name','like','%'.$keywords.'%')
        ->orderby('category_id','desc')->paginate(5);

        $all_category_full =  DB::table('tbl_category_product')
        ->where('category_id','like','%'.$keywords.'%')
        ->orwhere('category_name','like','%'.$keywords.'%')
        ->orderby('category_id','desc')->get();

        $manager_product  = view('admin.search_category')
        ->with('search_category',$search_category)
        ->with('all_category_full',$all_category_full);
        return view('admin_layout')->with('admin.search_category', $manager_product);
    }
  
    public function save_category_product(Request $request){
      $this->AuthenLogin();
    	$data = array();
    	$data['category_name'] = $request->category_category_name;
    	$data['category_desc'] = $request->category_product_desc;
    	$data['category_status'] = $request->category_product_status;

    	DB::table('tbl_category_product')->insert($data);
    	Session::put('message','Thêm danh mục sản phẩm thành công');
    	return Redirect::to('add-category-product');
    }
  
    public function unactive_category_product($category_category_id){
        $this->AuthenLogin();
        DB::table('tbl_category_product')->where('category_id',$category_category_id)->update(['category_status'=>1]);
        Session::put('message','Không cho phép hiển thị danh mục sản phẩm');
        return Redirect::to('all-category-product');
        $this->AuthenLogin();
    }
  
    public function active_category_product($category_category_id){
        DB::table('tbl_category_product')->where('category_id',$category_category_id)->update(['category_status'=>0]);
        Session::put('message','Cho phép hiển thị danh mục sản phẩm');
        return Redirect::to('all-category-product');
    }
  
    public function edit_category_product($category_category_id){
        $this->AuthenLogin();
        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_category_id)->get();
        $manager_category_product  = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
        return view('admin_layout')->with('admin.edit_category_product', $manager_category_product);
    }
  
    public function update_category_product(Request $request,$category_category_id){
        $this->AuthenLogin();
        $data = array();
        $data['category_name'] = $request->category_category_name;
        $data['category_desc'] = $request->category_product_desc; 
        $data['category_status'] = $request->category_product_status;    
        DB::table('tbl_category_product')->where('category_id',$category_category_id)->update($data);
        Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
  
    public function delete_category_product($category_category_id){
        $this->AuthenLogin();
        DB::table('tbl_category_product')->where('category_id',$category_category_id)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }

    public function show_category_home(Request $request,$category_id)
    {
        $customer_id = session::get('customer_id');
        $Like_Not_Like = DB::table('tbl_wishlist')->where('customers_id',$customer_id)->get();
        $customer_id = session::get('customer_id');
        $numberlike_customer = DB::table('tbl_wishlist')->select(DB::raw('count(category_id) as numberlike'))->where('customers_id',$customer_id)->get();
        $numberlike = Session::get('numberlike_customer');
        foreach($numberlike_customer as $key=>$value){
            $numberlike =$value->numberlike;
        }
        Session::put('numberlike_customer', $numberlike);
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
        $category_by_id = DB::table('tbl_category')->join('tbl_category_product','tbl_category.category_id','=','tbl_category_product.category_id')->where('tbl_category.category_id',$category_id)->paginate(6);
        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id', $category_id)->limit(1)->get();
        $all_category_full= DB::table('tbl_category')->join('tbl_category_product','tbl_category.category_id','=','tbl_category_product.category_id')->where('tbl_category.category_id',$category_id)->get();
        return view('pages.category.show_category')
        ->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('category_by_id',$category_by_id)
        ->with('category_name',$category_name)
        ->with('all_category_full',$all_category_full)
        ->with('Like_Not_Like',$Like_Not_Like);

    }
}
