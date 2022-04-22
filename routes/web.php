<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('frontpage','IndexController@index');

Route::match(['get','post'],'adminlogin','AdminController@login');
// Route::match(['get','post'],'admin/dashboard','AdminController@dashboard');
Route::group(['middleware'=>'auth'],function(){
	Route::match(['get','post'],'admin/dashboard','AdminController@dashboard');

	// banner
	Route::match(['get','post'],'admin/banner','BannerController@Banner');
	Route::match(['get','post'],'admin/add_banner','BannerController@add_banner');
	Route::match(['get','post'],'admin/edit_banner/{id}','BannerController@edit_banner');
	Route::match(['get','post'],'admin/delete_banner/{id}','BannerController@delete_banner');
	Route::match(['get','post'],'admin/banner_status/{id}','BannerController@banner_status');


	// category
	Route::match(['get','post'],'admin/add_category','CategoryController@add_category');
	Route::match(['get','post'],'admin/view_category','CategoryController@view_category');
	Route::match(['get','post'],'admin/edit_category/{id}','CategoryController@edit_category');
	Route::match(['get','post'],'admin/update_category/{id}','CategoryController@update_category');
	Route::match(['get','post'],'admin/category_status/{id}','CategoryController@category_status');
	Route::match(['get','post'],'admin/delete_category/{id}','CategoryController@delete_category');



	// product
	Route::match(['get','post'],'admin/add_product','ProductController@add_product');
	Route::match(['get','post'],'admin/view_product','ProductController@view_product');
	Route::match(['get','post'],'admin/edit_product/{id}','ProductController@edit_product');
	Route::match(['get','post'],'admin/update_product/{id}','ProductController@update_product');
	Route::match(['get','post'],'admin/delete_product/{id}','ProductController@delete_product');
	Route::match(['get','post'],'admin/product_status/{id}','ProductController@product_status');
});
Route::get('logout','AdminController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
