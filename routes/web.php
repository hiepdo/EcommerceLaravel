<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

//use App\Http\Controllers;
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
Route::get('/', 'HomeController@home');
Route::get('/home', 'HomeController@home');
Route::get('/product', 'HomeController@products');
Route::get('/shop', 'HomeController@shop');


//admin
Route::get('/admin','AdminController@admin');
Route::get('/dashboard','AdminController@show');
Route::get('/logout','AdminController@logout');
Route::post('/admin-dashboard','AdminController@dashboard');

//Category product
Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');
Route::get('/all-category-product','CategoryProduct@all_category_product');
Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');

Route::post('/save-category-product','CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');

//brand product
Route::get('/add-brand-product', 'BrandProduct@add_brand_product');
Route::get('/edit-brand-product/{brand_product_id}', 'BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}', 'BrandProduct@delete_brand_product');
Route::get('/all-brand-product', 'BrandProduct@all_brand_product');

Route::get('/unactive-brand-product/{brand_product_id}', 'BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}', 'BrandProduct@active_brand_product');

Route::post('/save-brand-product', 'BrandProduct@save_brand_product');
Route::post('/update-brand-product/{brand_product_id}', 'BrandProduct@update_brand_product');

//Send mail
Route::get('/send-mail', 'MailController@SendEmail');

//account
Route::get('/verify', 'HomeController@verify_user');
Route::get('/login', 'HomeController@to_login');
Route::get('/forget-password', 'HomeController@to_forget_password');
Route::get('/reset-password', 'HomeController@reset_password');
Route::get('/register', 'HomeController@to_register');
Route::post('/register-user', 'HomeController@register_user');
Route::post('/login-user', 'HomeController@login_user');
Route::post('/recover-pass', 'HomeController@recover_pass');
Route::post('/update-password', 'HomeController@update_password');
