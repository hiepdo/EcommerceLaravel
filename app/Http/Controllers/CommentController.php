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
        $comment = Comment::with('product')->orderBy('comment_status','DESC')->get();

        return view('admin.comment.list_comment')->with(compact('comment'));
    }
}
