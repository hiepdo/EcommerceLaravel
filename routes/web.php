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


Route::get('/', 'App\Http\Controllers\HomeController@home');
Route::get('/Home', 'App\Http\Controllers\HomeController@home');

Route::get('/admin','App\Http\Controllers\AdminController@admin');
Route::get('/dashboard','App\Http\Controllers\AdminController@show');

