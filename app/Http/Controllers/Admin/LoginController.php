<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//使用类
use App\Http\Controllers\Controller;
use App\Admin;
use Hash;

class LoginController extends Controller
{
    //显示登录页面
	public function login()
	{
		return view('admin.login.index');
	}
	
	//执行操作
	public function dologin(Request $request)
	{
		//实例化用户对象
		$admin = Admin::where('name',$request->name)->firstOrFail();
		//获取用户信息
		if(Hash::check($request->password,$admin->password)){
			//写入登入状态
			session(['aid'=>$admin->id]);
			return redirect('admin/index');
		}else{
			return back();
		}
	}
	
	//退出登录
	public function logout(Request $requset)
	{
		$requset->session()->flush();
		return redirect('admin/login');
	}
	
}
