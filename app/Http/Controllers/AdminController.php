<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin_login');
    }
    public function show()
    {
        return view('admin_layout');
    }
}
