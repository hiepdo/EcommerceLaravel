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
Route::get('/search', 'HomeController@search');
Route::get('/about-us', 'HomeController@to_about_us');
Route::get('/contact-us', 'HomeController@to_contact_us');
Route::get('/autocomplete-ajax', 'HomeController@autocomplete_ajax');


//admin
Route::get('/admin', 'AdminController@admin');
Route::get('/dashboard', 'AdminController@show');
Route::get('/logout', 'AdminController@logout');
Route::post('/admin-dashboard', 'AdminController@dashboard');
Route::post('/filter-by-date', 'AdminController@filter_by_date');

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
Route::get('/search-product-admin', 'ProductController@search_product_admin');

Route::get('/unactive-product/{product_id}', 'ProductController@unactive_product');
Route::get('/active-product/{product_id}', 'ProductController@active_product');

Route::post('/save-product', 'ProductController@save_product');
Route::post('/update-product/{product_id}', 'ProductController@update_product');

//order
Route::get('/manage-order', 'OrderController@manage_order');
Route::get('/view-order/{orderId}', 'OrderController@view_order');
Route::get('/delete-order/{orderId}', 'OrderController@delete_order');
Route::post('/update-status-order/{orderId}','OrderController@update_status_order');

//Home product category
Route::get('/category-product/{category_id}','CategoryProduct@show_category_home');
Route::get('/brand-product/{brand_id}','BrandProduct@show_brand_home');
Route::get('/detail-product/{product_id}','ProductController@detail_product');

//Comment
Route::post('/load-comment','CommentController@load_comment');
Route::post('/sent-comment','CommentController@sent_comment'); 
Route::post('/allow-comment','CommentController@allow_comment'); 
Route::post('/reply-comment','CommentController@reply_comment'); 

//Send mail
Route::get('/send-mail', 'MailController@SendEmail');

//Login facebook
Route::get('/login-facebook','HomeController@login_facebook');
Route::get('/login/callback','HomeController@callback_facebook');

//Login  google
Route::get('/login-google','HomeController@login_google');
Route::get('/google/callback','HomeController@callback_google');

//Comment
Route::get('/comment','CommentController@list_comment');

//Cart
Route::post('/save-cart','CartController@save_cart'); 
Route::get('/show-cart','CartController@show_cart'); 
Route::get('/delete-cart/{rowId}','CartController@delete_cart'); 
Route::post('/update-cart','CartController@update_cart'); 

//Cart Ajax
Route::post('/add-cart-ajax','CartController@add_cart_ajax'); 
Route::get('/show-cart-ajax','CartController@show_cart_ajax');
Route::post('/update-cart-ajax','CartController@update_cart_ajax'); 
Route::get('/delete-cart-ajax/{session_id}','CartController@delete_cart_ajax'); 
Route::get('/clear-all-cart-ajax','CartController@clear_all_cart_ajax');
//WishList Ajax
Route::post('/add-wishlist-ajax','WishListController@add_wishlist_ajax'); 
Route::get('/show-wishlist-localstorage','WishListController@show_wishlist_localstorage');
Route::post('/delete-wishlist-ajax','WishListController@delete_wishlist_ajax'); 

//Checkout
Route::get('/checkout', 'CheckoutController@show_checkout');
Route::get('/payment', 'CheckoutController@payment');
Route::post('/order-place', 'CheckoutController@order_place'); 
Route::post('/save-checkout-customer', 'CheckoutController@save_checkout_customer'); 

//account
Route::get('/verify', 'HomeController@verify_user');
Route::get('/login', 'HomeController@to_login');
Route::get('/logout', 'HomeController@logout');
Route::get('/forget-password', 'HomeController@to_forget_password');
Route::get('/reset-password', 'HomeController@reset_password');
Route::get('/register', 'HomeController@to_register');
Route::get('/all-customer-account', 'HomeController@all_customer_account');
Route::post('/register-user', 'HomeController@register_user');
Route::post('/login-user', 'HomeController@login_user');
Route::post('/recover-pass', 'HomeController@recover_pass');
Route::post('/update-password', 'HomeController@update_password');

//Gallery
Route::get('add-gallery/{product_id}','GalleryController@add_gallery');
Route::post('select-gallery','GalleryController@select_gallery');
Route::post('insert-gallery/{pro_id}','GalleryController@insert_gallery');
Route::post('update-gallery-name','GalleryController@update_gallery_name');
Route::post('delete-gallery','GalleryController@delete_gallery');
Route::post('update-gallery','GalleryController@update_gallery');
