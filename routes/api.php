<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$api = app('Dingo\Api\Routing\Router');

$api->version('v1',['namespace'=>'App\Http\Controllers\Api'],function ($api) {
		//获取用户列表
		$api->get('users','UserController@users');
		//获取用户列表
		$api->get('users/{id}','UserController@show');

		//获取分类列表
		$api->get('cates','CatesController@cates');
		//获取分类列表
		$api->get('cates/{id}','CatesController@show');

		//获取文章列表
		$api->get('news','NewsController@index');
		//获取文章显示列表
		$api->get('news/{id}','NewsController@show');

		//获取广告列表
		$api->get('ads','AdsController@index');
		//获取广告显示列表
		$api->get('ads/{id}','AdsController@show');

		//获取商品列表
		$api->get('products','ProductsController@index');
		//获取商品显示列表
		$api->get('products/{id}','ProductsController@show');

		//获取商品订单列表
		$api->get('confirm','ConfirmController@index');
		//获取商品提交订单列表
		$api->post('confirm/post','ConfirmController@store');
		//获取商品订单显示列表
		$api->get('confirm/{id}','ConfirmController@show');

		//获取服务订单列表
		$api->get('reservation','ReservationController@index');
		//服务提交订单列表
		$api->post('reservation/post','ReservationController@store');
		//获取服务订单显示列表
		$api->get('reservation/{id}','ReservationController@show');
		
		//获取团购订单列表
		$api->get('group','GroupController@index');
		//团购提交订单列表
		$api->post('group/post','GroupController@store');
		//获取团购订单显示列表
		$api->get('group/{id}','GroupController@show');
		
		//获取用户团购订单列表
		$api->get('usergroup','UsergroupController@index');
		//团购提交订单列表
		$api->post('usergroup/post','UsergroupController@store');
		//获取用户团购订单显示列表
		$api->get('usergroup/{id}','usergroupController@show');
		
		
		//验证操作
		$api->post('login','AuthController@login');
		$api->get('logout','AuthController@logout');
		$api->get('me','AuthController@me');
});