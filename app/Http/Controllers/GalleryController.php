<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Comment;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class GalleryController extends Controller
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
    public function add_gallery($product_id){
        $this->AuthenLogin();
        $cate_product = DB::table('tbl_category_product') ->orderby('category_id','desc')->get();
        $pro_id = $product_id;
        
        return view('admin.gallery.add_gallery')->with(compact('pro_id'))->with('cate_product', $cate_product);
    }
    public function insert_gallery(Request $request,$pro_id){
        $this->AuthenLogin();
        $get_image = $request->file('file');
        if($get_image){
            foreach ($get_image as $image){
                $data = array();
                $get_name_image = $image->getClientOriginalName();
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
                $image->move('public/uploads/gallery',$new_image);
                $data['gallery_name'] = $new_image;
                $data['gallery_image'] = $new_image;
                $data['product_id'] = $pro_id;
                DB::table('tbl_gallery')->insert($data);

            }
            Session::put('message','Cập Nhật sản phẩm thành công');
            return Redirect()->back();    
        }else{
            Session::put('message','Cập Nhật sản phẩm thất bại ');
            return Redirect()->back();    
        }

    }
    public function update_gallery_name(Request $request){
        $this->AuthenLogin();
        $data = array();
        $gal_id = $request->gal_id;
        $gal_text = $request->gal_text;
        $data['gallery_name'] = $gal_text;
        DB::table('tbl_gallery')->where('gallery_id',$gal_id)->update($data);
    }
    public function delete_gallery(Request $request){
        $this->AuthenLogin();
        $gal_id = $request->gal_id;
        $image_name = DB::table('tbl_gallery')->where('gallery_id',$gal_id)->get();
        foreach ($image_name as $key =>$gal){
            unlink('public/uploads/gallery/'.$gal->gallery_image);
        }
        DB::table('tbl_gallery')->where('gallery_id',$gal_id)->delete();
    }
    public function update_gallery(Request $request){
        $this->AuthenLogin();
        $get_image = $request->file('file');
        $gal_id = $request->gal_id;
        if($get_image){
                $data = array();
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                $get_image->move('public/uploads/gallery',$new_image);
                $image_name = DB::table('tbl_gallery')->where('gallery_id',$gal_id)->get();
                foreach ($image_name as $key =>$gal){
                    unlink('public/uploads/gallery/'.$gal->gallery_image);
                } 
                $data['gallery_image'] = $new_image;
                DB::table('tbl_gallery')->where('gallery_id',$gal_id)->update($data);
        }   
    }
    public function select_gallery(Request $request){
        $this->AuthenLogin();
        $product_id =  $request->pro_id;
        $gallery =DB::table('tbl_gallery')->where('product_id', $product_id)->get();
        $gallery_count = $gallery->count();
        $output = '
                            <form>
                            '.csrf_field().'
                            <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Thứ tự</th>
                                                <th>Tên hình ảnh</th>
                                                <th>Hình ảnh</th>
                                                <th>Quản lý</th>
                                            </tr>
                                            </thead>
                                            <tbody>
        ';
        if($gallery_count>0){
            $i=0;
            foreach ($gallery as $key =>$gal){
                $i++;
                $output.='

                <tr>
                                                <td>'.$i.'</td>
                                                <td contenteditable class="edit_gal_name" data-gal_id="'.$gal->gallery_id.'">'.$gal->gallery_name.'</td>
                                                <td>
                                                <img src="'.url('public/uploads/gallery/'.$gal->gallery_image).'" class ="img-thumbnail" width="120" heigh="120">
                                                <input type="file" class="file_image" style="width:40%" data-gal_id="'.$gal->gallery_id.'" id="file-'.$gal->gallery_id.'" name="file" accept="image/*"/>
                                                </td>
                                                <td><button type="button" data-gal_id="'.$gal->gallery_id.'" class="btn btn-xs btn-danger delete-gallery">Xóa</button></td>

                                                </tr>

                ';
            }
        }else{
            $output.='
                <tr>
                                                <td colspan="4">Sản phẩm này chưa có thư viện ảnh</td>
                                                </tr>
                ';
        }
        $output.='
                </tbody>
                </table>
                </form>
        ';
        echo $output;
    }
}
