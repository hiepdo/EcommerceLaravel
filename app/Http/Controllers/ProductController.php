<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Comment;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
    public function add_product(){
        $cate_product = DB::table('tbl_category_product') ->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand') ->orderby('brand_id','desc')->get();
        
        return view('admin.add_product')->with('cate_product', $cate_product)->with('brand_product', $brand_product);
    }
    public function all_product(){
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->orderby('tbl_product.product_id','desc')->get();
    	$manager_product  = view('admin.all_product')->with('all_product',$all_product);
    	return view('admin_layout')->with('admin.all_product', $manager_product);


    }
    public function save_product(Request $request){      
    	$data = array();
    	$data['product_name'] = $request->product_name;
    	$data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
    	$data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        if($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_imgae = current(explode('.', $get_name_image));
            $new_image = $name_imgae.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data); 
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('all-product');
        }
        $data['product_image'] = '';
    	DB::table('tbl_product')->insert($data); 
        
    	Session::put('message','Thêm sản phẩm thành công');
    	return Redirect::to('all-product');
    }
    public function unactive_product($product_id){
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        Session::put('message','Không kích hoạt sản phẩm thành công');
        return Redirect::to('all-product');

    }
    public function active_product($product_id){
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        Session::put('message','Kích hoạt sản phẩm thành công');
        return Redirect::to('all-product');

    }
    public function edit_product($product_id){   
        $cate_product = DB::table('tbl_category_product') ->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand') ->orderby('brand_id','desc')->get();  
        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
        $manager_product  = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)
        ->with('brand_product',$brand_product);

        return view('admin_layout')->with('admin.edit_product', $manager_product);
    }
    public function update_product(Request $request,$product_id){       
        $data = array();
    	$data['product_name'] = $request->product_name;
    	$data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
    	$data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        if($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_imgae = current(explode('.', $get_name_image));
            $new_image = $name_imgae.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id',$product_id)->update($data); 
            Session::put('message','Cập Nhật sản phẩm thành công');
            return Redirect::to('all-product');
        }

        DB::table('tbl_product')->where('product_id',$product_id)->update($data); 
        
    	Session::put('message','Cập Nhật sản phẩm thành công');
    	return Redirect::to('all-product');
    }
    public function delete_product($product_id){
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('all-product');
    }
    //End admin page
    public function detail_product($product_id)
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_id',$product_id)->get();

        foreach($details_product as $key => $value)
        {
            $brand_id = $value->brand_id;
        }

        $related_brand = DB::table('tbl_product')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_brand.brand_id',$brand_id)->get();

        return view('pages.product.show_detail')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('product_details',$details_product)
        ->with('relate',$related_brand);
    }

    //Load comment
    public function load_comment(Request $request)
    {
        $product_id = $request->product_id;
        $comment = Comment::where('comment_product_id',$product_id)->where('comment_parent_comment','=',0)->where('comment_status',0)->get();
        $comment_reply = Comment::with('product')->where('comment_parent_comment','>',0)->get();
        $output = '';
        foreach($comment as $key => $cmt)
        {
            $output.= '
            <ol class="commentlist" >
				<li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
					<div id="comment-20" class="comment_container"> 
						<img alt="" src="'.url('/public/frontend/images/customer.png').'" height="50" width="50">
						<div class="comment-text">
							<div class="star-rating">
							<span class="width-80-percent">Rated <strong class="rating">5</strong> out of 5</span>
						</div>
						<p class="meta"> 
                            <strong class="woocommerce-review__author">'.$cmt->comment_name.'</strong> 
                            
                            <time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" >'.$cmt->comment_date.'</time>
						</p>
						<div class="description">
							<p>'.$cmt->comment.'</p>
						</div>
					</div>
				
				</li>
            </ol>
            ';
            foreach($comment_reply as $key => $rep_cmt)
            {
                if($rep_cmt->comment_parent_comment == $cmt->comment_id)
                { 
            $output.= '
            <ol class="commentlist" style="margin-left: 40px;" >
				<li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
					<div id="comment-20" class="comment_container"> 
						<img alt="" src="'.url('/public/frontend/images/admin-icon.jpg').'" height="40" width="40">
						<div class="comment-text">
							<div class="star-rating">
							<span class="width-80-percent">Rated <strong class="rating">5</strong> out of 5</span>
						</div>
						<p class="meta"> 
                            <strong class="woocommerce-review__author">@Admin</strong> 
                            
                            <time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" >'.$rep_cmt->comment_date.'</time>
						</p>
						<div class="description">
							<p>'.$rep_cmt->comment.'</p>
						</div>
					</div>
				
				</li>
			</ol>';
                }
            }
        }
        echo $output;
    }

   //Send comment
    public function sent_comment(Request $request)
    {
        $product_id = $request->product_id;
        $comment_name = $request->comment_name;
        $comment_content = $request->comment_content;
        $comment = new Comment();
        $comment->comment = $comment_content;
        $comment->comment_name = $comment_name;
        $comment->comment_product_id = $product_id;
        $comment->comment_status = 1;
        $comment->comment_parent_comment = 0;
        $comment->save();
    }
    
    //allow comment
    public function allow_comment(Request $request)
    {
        $data = $request->all();
        $comment = Comment::find($data['comment_id']);
        $comment->comment_status = $data['comment_status'];
        $comment->save();
    }

    //reply comment
    public function reply_comment(Request $request)
    {
        $data = $request->all();
        $comment = new Comment();
        $comment->comment = $data['comment'];
        $comment->comment_product_id = $data['comment_product_id'];
        $comment->comment_parent_comment = $data['comment_id'];
        $comment->comment_status = 0;
        $comment->comment_name = 'Admin';
        $comment->save();
    }
}
