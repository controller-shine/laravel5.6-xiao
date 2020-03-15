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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware'=>'login'],function(){
	//后台首页
	Route::get('admin/index','Admin\IndexController@index');
	//后台分类路由
	Route::resource('admin/cates','Admin\CatesController');
	//后台商品路由
	Route::resource('admin/product','Admin\ProductController');
	//后台已完成订单路由
	Route::resource('admin/confirm','Admin\ConfirmController');
	//后台预约订单路由
	Route::resource('admin/reservation','Admin\ReservationController');
	//后台商品路由
	Route::resource('admin/group','Admin\GroupController');
	//后台商品路由
	Route::resource('admin/usergroup','Admin\UsergroupController');
	//后台商品状态值
	Route::post('admin/group/ajaxStatu','Admin\GroupController@ajaxStatu');
	//后台新闻路由
	Route::resource('admin/news','Admin\NewsController');
	//后台广告路由
	Route::resource('admin/ads','Admin\AdsController');
	//后台管理员路由
	Route::resource('admin/user','Admin\UserController');
	//后台管理员路由
	Route::resource('admin/admin','Admin\AdminController');
	
});
//后台登录注册路由
Route::get('admin/login','Admin\LoginController@login');
Route::post('admin/login','Admin\LoginController@dologin');
Route::get('admin/logout','Admin\LoginController@logout');