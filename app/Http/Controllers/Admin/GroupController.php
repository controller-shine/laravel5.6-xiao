<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
//使用类
use App\Http\Controllers\Controller;
use App\Group;


class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$groups = group::orderBy('id','desc')->get();
		
		
		return view('admin.group.index',['groups'=>$groups]);
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
		return view('admin.group.add',['cates'=>$cates,'products'=>$products]);
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
		$group = new Group;
		$group->product_id = $request->input('product_id');
		$group->price = $request->input('price');
		$group->startdate = $request->input('startdate');
		$group->entdate = $request->input('entdate');
		$group->groupnumber = $request->input('groupnumber');
		$group->currentnumber = $request->input('currentnumber');
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
			  $group->img = trim($destinationPath.$fullName,'.');
			 
		}	
		if($group->save()){
			return redirect('/admin/group')->with('info','添加成功');
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
		$info = Group::findOrFail($id);
		//解析模板
		//读取商品信息
		$usergroups=UsergroupController::getUsergroups();
		$usergroups=DB::table('usergroups')->where('group_id','=',$id)->get();
		//读取商品信息
		$products=ProductController::getProducts();
		//读取商品信息
		$users=UserController::getUsers();
		return view('admin.group.show',['info'=>$info,'cates'=>$cates,'users'=>$users,'usergroups'=>$usergroups,'products'=>$products]);
	
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
		$info = Group::findOrFail($id);
		//解析模板
		//读取商品信息
		$products=ProductController::getProducts();
		//读取商品信息
		$usergroups=UsergroupController::getUsergroups();
		$usergroups=DB::table('usergroups')->where('group_id','=',$id)->get();
		return view('admin.group.edit',['info'=>$info,'cates'=>$cates,'usergroups'=>$usergroups,'products'=>$products]);
		
		
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
		$group = Group::findOrFail($id);
		$group->product_id = $request->input('product_id');
		$group->price = $request->input('price');
		$group->startdate = $request->input('startdate');
		$group->entdate = $request->input('entdate');
		$group->groupnumber = $request->input('groupnumber');
		$group->currentnumber = $request->input('currentnumber');
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
			  $group->img = trim($destinationPath.$fullName,'.');
			 
		}	
		if($group->save()){
			return redirect('/admin/group')->with('info','更新成功');
		}else{
			return back()->with('info','更新失败');
		}
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
        $group = group::findOrFail($id);
        //删除图片
        @unlink('.'.$group->img);
        //删除
        if($group->delete()) {
            return back()->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');
        }
    }
    	
	//修改状态的方法
	public function ajaxStatu(Request $request){
		//提出数据
		$arr=$request->except('_token');
		
		if(\DB::update("update usergroups set status= $arr[status] where id=$arr[id]")){
			return 1;
		}else{
			return 0;
		}
	}
}
