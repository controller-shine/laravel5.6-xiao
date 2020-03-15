<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
//使用类
use App\Http\Controllers\Controller;
use App\Usergroup;


class UsergroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$usergroups = usergroup::orderBy('id','desc')->get();
		
		$users=UserController::getUsers();
		return view('admin.usergroup.add',['usergroups'=>$usergroups,'users'=>$users]);
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
		//读取商品信息
		$products=ProductController::getProducts();
		return view('admin.usergroup.add',['cates'=>$cates,'products'=>$products]);
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
		$usergroup = new Usergroup;
		$usergroup->group_id = $request->input('group_id');
		$usergroup->user_id = $request->input('user_id');
		$usergroup->status = $request->input('status');
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
			  $usergroup->img = trim($destinationPath.$fullName,'.');
			 
		}	
		if($usergroup->save()){
			return redirect('/admin/usergroup')->with('info','添加成功');
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
		$info = Usergroup::findOrFail($id);
		//解析模板
		//读取商品信息
		$products=ProductController::getProducts();
		//读取用户信息
		$users=UserController::getUsers();
		return view('admin.usergroup.edit',['info'=>$info,'cates'=>$cates,'users'=>$users,'products'=>$products]);
		
		
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
		//创建模型
		$usergroup = Usergroup::findOrFail($id);
		$usergroup->group_id = $request->input('group_id');
		$usergroup->user_id = $request->input('user_id');
		$usergroup->status = $request->input('status');
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
			  $usergroup->img = trim($destinationPath.$fullName,'.');
			 
		}	
		if($usergroup->save()){
			return redirect('/admin/usergroup')->with('info','更新成功');
		}else{
			return back()->with('info','更新失败');
		}
    }

	//获取所有的分类信息 并排序
	public static function getUsergroups()
	{
		//读取分类
		$usergroups = usergroup::orderBy('id','desc')->get();
		
		return $usergroups;
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
        $usergroup = usergroup::findOrFail($id);
        //删除图片
        @unlink('.'.$usergroup->img);
        //删除
        if($usergroup->delete()) {
            return back()->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');
        }
    }
    
}
