<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class productdetailController extends Controller
{
    public function products()
    {
        return view('pages.productdetail');
    }
}
