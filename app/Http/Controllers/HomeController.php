<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }
    public function products()
    {
        return view('pages.productdetail');
    }
    public function shop()
    {
        return view('pages.product');
    }
}
