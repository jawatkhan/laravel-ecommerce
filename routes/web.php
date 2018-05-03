<?php

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
//frontend site....
Route::get('/', 'HomeController@index');
//category wize product show
Route::get('/product-by-category/{category_id}','HomeController@show_product_by_catrgory');
Route::get('/product-by-manufacture/{manufacture_id}','HomeController@show_product_by_manufacture');
Route::get('/view-product/{product_id}','HomeController@product_details_by_id');
//cart 
Route::post('/add-to-cart','CartController@add_to_cart');
Route::get('/show-cart','CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');
Route::post('/update-cart','CartController@update_cart');
//checkout
Route::get('/login-check','CheckoutController@login_check');
Route::post('/customer-registration','CheckoutController@customer_registration');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/save-shipping-details','CheckoutController@save_shipping_details');
//login logout
Route::post('/customer-login','CheckoutController@customer_login');
Route::get('/customer-logout','CheckoutController@customer_logout');
Route::get('/payment','CheckoutController@payment');
Route::post('/order-place','CheckoutController@order_place');

Route::get('/manage-order','CheckoutController@manage_order');
Route::get('/view-order/{order_id}','CheckoutController@view_order');



//backend site....
Route::get('/logout','SuperAdminController@logout');
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'SuperAdminController@index');
Route::post('/admin-dashboard', 'AdminController@dashboard');

//category section...
Route::get('/add-category','CategoryController@index');
Route::post('/save-category','CategoryController@save_category');
Route::get('/all-category','CategoryController@all_category');
Route::get('/inactive-category/{category_id}','CategoryController@inactive_category');
Route::get('/active-category/{category_id}','CategoryController@active_category');
Route::get('/edit-category/{category_id}','CategoryController@edit_category');
Route::post('/update-category/{category_id}','CategoryController@update_category');
Route::get('/delete-category/{category_id}','CategoryController@delete_category');

//manufacture section.....
Route::get('/add-manufacture','ManufactureController@index');
Route::post('/save-manufacture','ManufactureController@save_manufacture');
Route::get('/all-manufacture','ManufactureController@all_manufacture');
Route::get('/inactive-manufacture/{manufacture_id}','ManufactureController@inactive_manufacture');
Route::get('/active-manufacture/{manufacture_id}','ManufactureController@active_manufacture');
Route::get('/edit-manufacture/{manufacture_id}','ManufactureController@edit_manufacture');
Route::post('/update-manufacture/{manufacture_id}','ManufactureController@update_manufacture');
Route::get('/delete-manufacture/{manufacture_id}','ManufactureController@delete_manufacture');

//product section....
Route::get('/add-product','ProductController@index');
Route::post('/save-product','ProductController@save_product');
Route::get('/all-product','ProductController@all_product');
Route::get('/inactive-product/{product_id}','ProductController@inactive_product');
Route::get('/active-product/{product_id}','ProductController@active_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::post('/update-product/{product_id}','ProductController@update_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');

//slider section....
Route::get('/add-slider','SliderController@index');
Route::post('/save-slider','SliderController@save_slider');
Route::get('/all-slider','SliderController@all_slider');
Route::get('/inactive-slider/{slider_id}','SliderController@inactive_slider');
Route::get('/active-slider/{slider_id}','SliderController@active_slider');
Route::get('/delete-slider/{slider_id}','SliderController@delete_slider');