<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//homepage
Route::get('/', 'App\Http\Controllers\HomeController@home');
Route::get('/Home', 'App\Http\Controllers\HomeController@home');
Route::get('/login', 'App\Http\Controllers\HomeController@to_login');
Route::post('/register-user', 'App\Http\Controllers\HomeController@register_user');
Route::post('/login-user', 'App\Http\Controllers\HomeController@login_user');

//admin
Route::get('/admin','App\Http\Controllers\AdminController@admin');
Route::get('/dashboard','App\Http\Controllers\AdminController@show');
Route::post('/admin-dashboard','App\Http\Controllers\AdminController@dashboard');

