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
}
