<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Brand;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class BrandProduct extends Controller
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
  
    public function add_brand_product(){
        $this->AuthenLogin();
        return view('admin.add_brand_product');
    }
  
    public function all_brand_product(){
      $this->AuthenLogin();
      $all_brand_product = DB::table('tbl_brand')->paginate(5);
    	$manager_brand_product  = view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
      
    	return view('admin_layout')->with('admin.all_brand_product', $manager_brand_product);
    }
  
    public function save_brand_product(Request $request){
        $this->AuthenLogin();
        $data = $request->all();
        $brand = new Brand();
        $brand->brand_name = $data['brand_product_name'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->brand_status = $data['brand_product_status'];
        $brand->save();
    	Session::put('message','Thêm thương hiệu sản phẩm thành công');
    	return Redirect::to('add-brand-product');
    }
  
    public function unactive_brand_product($brand_product_id){
        $this->AuthenLogin();
        $brand = Brand::find($brand_product_id);
        $brand->brand_status = 1;
        $brand->save();
        Session::put('message','Không cho phép hiển thị thương hiệu sản phẩm');
        return Redirect::to('all-brand-product');
    }
  
    public function active_brand_product($brand_product_id){
        $this->AuthenLogin();
        $brand = Brand::find($brand_product_id);
        $brand->brand_status = 0;
        $brand->save();
        Session::put('message','Cho phép hiển thị thương hiệu sản phẩm');
        return Redirect::to('all-brand-product');

    }
  
    public function edit_brand_product($brand_product_id){
        $this->AuthenLogin();        
        $edit_brand_product = Brand::where('brand_id',$brand_product_id)->get();
        $manager_brand_product  = view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);

        return view('admin_layout')->with('admin.edit_brand_product', $manager_brand_product);
    }

    public function update_brand_product(Request $request,$brand_product_id){ 
        $this->AuthenLogin();      
        $data = $request->all();
        $brand = Brand::find($brand_product_id);
        $brand->brand_name = $data['brand_product_name'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->brand_status = $data['brand_product_status'];
        $brand->save();
        Session::put('message','Cập nhật thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }
    public function delete_brand_product($brand_product_id){
        $this->AuthenLogin();
        $brand = Brand::find($brand_product_id);
        $brand->delete();
        Session::put('message','Xóa thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }

    public function show_brand_home(Request $request,$brand_id)
    {
        $customer_id = session::get('customer_id');
        $Like_Not_Like = DB::table('tbl_wishlist')->where('customers_id',$customer_id)->get();
        $customer_id = session::get('customer_id');
        $numberlike_customer = DB::table('tbl_wishlist')->select(DB::raw('count(product_id) as numberlike'))->where('customers_id',$customer_id)->get();
        $numberlike = Session::get('numberlike_customer');
        foreach($numberlike_customer as $key=>$value){
            $numberlike =$value->numberlike;
        }
        Session::put('numberlike_customer', $numberlike);
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        $brand_by_id = DB::table('tbl_product')->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')->where('tbl_product.brand_id',$brand_id)->paginate(6);
        $brand_name = DB::table('tbl_brand')->where('tbl_brand.brand_id', $brand_id)->limit(1)->get();    
        $all_product_full =DB::table('tbl_product')->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')->where('tbl_product.brand_id',$brand_id)->get();
        return view('pages.brand.show_brand')
        ->with('category',$cate_product)
        ->with('brand_product',$brand_product)
        ->with('brand_by_id',$brand_by_id)
        ->with('brand_name',$brand_name)
        ->with('all_product_full',$all_product_full)
        ->with('Like_Not_Like',$Like_Not_Like);
    }

}
