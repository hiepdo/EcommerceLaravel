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
Route::get('/Home', 'HomeController@home');
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

// product
Route::get('/add-product', 'ProductController@add_product');
Route::get('/edit-product/{product_id}', 'ProductController@edit_product');
Route::get('/delete-product/{product_id}', 'ProductController@delete_product');
Route::get('/all-product', 'ProductController@all_product');

Route::get('/unactive-product/{product_id}', 'ProductController@unactive_product');
Route::get('/active-product/{product_id}', 'ProductController@active_product');

Route::post('/save-product', 'ProductController@save_product');
Route::post('/update-product/{product_id}', 'ProductController@update_product');

//Home product category

Route::get('/danh-muc-san-pham/{category_id}', 'CategoryProduct@show_category_home');
Route::get('/thuong-hieu-san-pham/{brand_id}', 'BrandProduct@show_brand_home');
Route::get('/chi-tiet-san-pham/{product_id}', 'ProductController@detail_product');

Route::post('/load-comment', 'ProductController@load_comment');
Route::post('/sent-comment', 'ProductController@sent_comment'); 
Route::post('/allow-comment', 'ProductController@allow_comment'); 
Route::post('/reply-comment', 'ProductController@reply_comment'); 

//Send mail
Route::get('/send-mail', 'MailController@SendEmail');

//Comment
Route::get('/comment', 'CommentController@list_comment');

//Cart
Route::post('/save-cart', 'CartController@save_cart'); 
Route::get('/show-cart', 'CartController@show_cart'); 
Route::get('/delete-cart/{rowId}', 'CartController@delete_cart'); 
Route::post('/update-cart', 'CartController@update_cart'); 

//Cart Ajax
Route::post('/add-cart-ajax', 'CartController@add_cart_ajax'); 
Route::get('/show-cart-ajax', 'CartController@show_cart_ajax');
Route::post('/update-cart-ajax', 'CartController@update_cart_ajax'); 
Route::get('/delete-cart-ajax/{session_id}', 'CartController@delete_cart_ajax'); 
Route::get('/clear-all-cart-ajax', 'CartController@clear_all_cart_ajax');

//account
Route::get('/verify', 'HomeController@verify_user');
Route::get('/login', 'HomeController@to_login');
Route::get('/logout', 'HomeController@logout');
Route::get('/forget-password', 'HomeController@to_forget_password');
Route::get('/reset-password', 'HomeController@reset_password');
Route::get('/register', 'HomeController@to_register');
Route::post('/register-user', 'HomeController@register_user');
Route::post('/login-user', 'HomeController@login_user');
Route::post('/recover-pass', 'HomeController@recover_pass');
Route::post('/update-password', 'HomeController@update_password');

