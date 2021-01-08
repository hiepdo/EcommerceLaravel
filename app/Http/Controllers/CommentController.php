<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Comment;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CommentController extends Controller
{
    public function list_comment()
    {
        $comment = Comment::with('product')->where('comment_parent_comment','=',0)->orderBy('comment_id','DESC')->get();

        $comment_reply = Comment::with('product')->where('comment_parent_comment','>',0)->get();

        return view('admin.comment.list_comment')->with(compact('comment','comment_reply'));
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
                         <img alt="" src="'.url('/public/frontend/images/customer.png').'" height="40" width="40">
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
                         <img style="margin-right: 10px;" alt="" src="'.url('/public/frontend/images/admin-icon.jpg').'" height="30" width="30">		
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
