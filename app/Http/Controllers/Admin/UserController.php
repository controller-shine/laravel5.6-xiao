<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
//使用类
use App\Http\Controllers\Controller;
use App\User;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$users = user::orderBy('id','desc')->get();
		
		
		return view('admin.user.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //读取分类信息和标签信息
		$cates=CatesController::getCates();
		
		return view('admin.user.add',['cates'=>$cates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //将数据插入到数据库中
		//创建模型
		$user = new User;
		$user->username = $request->input('username');
		$user->password = Hash::make($request->input('password'));
		$user->img = $request->input('img');
		$user->wxid = $request->input('wxid');
		$user->tel = $request->input('tel');
		$user->actualname = $request->input('actualname');
		$user->email = $request->input('email');
		$user->sex = $request->input('sex');
		$user->addr = $request->input('addr');
		$user->address = $request->input('address');
		$user->introduction = $request->input('introduction');
		$user->grade = $request->input('grade');
		//当前用户登录之后需要讲用户的这个uid写入到session中
		//检测是否有文件上传
	    if($request->hasFile('img'))
		{
			//拼接文件夹路径
			 $destinationPath = './Uploads/'.date('Y-m-d').'/';
			 //规则/Upload/20122020/123345123.jpg
			 //拼接文件路径
			 $fileName = time().rand(100000,999999);
			 //获取上传文件的后缀
			 $suffix = $request->file('img')->getClientOriginalExtension();
			 //文件的完整的名称
			 $fullName = $fileName.'.'.$suffix;
			 //保存文件
			 $request->file('img')->move($destinationPath,$fullName);
			 //拼接文件上传之后的路径
			  $user->img = trim($destinationPath.$fullName,'.');
			 
		}	
		if($user->save()){
			return redirect('/admin/user')->with('info','添加成功');
		}else{
			return back()->with('info','添加失败');
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
		$cates=CatesController::getCates();
		//读取当前文章的内容
		$info = User::findOrFail($id);
		//解析模板
		return view('admin.user.show',['info'=>$info,'cates'=>$cates]);
	
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$cates=CatesController::getCates();
        //读取当前文章的内容
		$info = User::findOrFail($id);
		//解析模板
		return view('admin.user.edit',['info'=>$info,'cates'=>$cates]);
		
		
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
		
		//表单验证
		//创建模型
		$user = User::findOrFail($id);
		$user->username = $request->input('username');
		$user->password = Hash::make($request->input('password'));
		$user->img = $request->input('img');
		$user->wxid = $request->input('wxid');
		$user->tel = $request->input('tel');
		$user->actualname = $request->input('actualname');
		$user->email = $request->input('email');
		$user->sex = $request->input('sex');
		$user->addr = $request->input('addr');
		$user->address = $request->input('address');
		$user->introduction = $request->input('introduction');
		$user->grade = $request->input('grade');
		//当前用户登录之后需要讲用户的这个uid写入到session中
		//检测是否有文件上传
		if($request->hasFile('img'))
		{
			//拼接文件夹路径
			 $destinationPath = './Uploads/'.date('Y-m-d').'/';
			 //规则/Upload/20122020/123345123.jpg
			 //拼接文件路径
			 $fileName = time().rand(100000,999999);
			 //获取上传文件的后缀
			 $suffix = $request->file('img')->getClientOriginalExtension();
			 //文件的完整的名称
			 $fullName = $fileName.'.'.$suffix;
			 //保存文件
			 $request->file('img')->move($destinationPath,$fullName);
			 //拼接文件上传之后的路径
			  $user->img = trim($destinationPath.$fullName,'.');
			 
		}	
		if($user->save()){
			return redirect('/admin/user')->with('info','更新成功');
		}else{
			return back()->with('info','更新失败');
		}
    }
	
	//获取所有的分类信息 并排序
	public static function getUsers()
	{
		//读取分类
		$users = user::orderBy('id','desc')->get();
		
		return $users;
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //获取模型
        $user = user::findOrFail($id);
        //删除图片
        @unlink('.'.$user->img);
        //删除
        if($user->delete()) {
            return back()->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');
        }
    }
    	
}
