<?php

namespace App\Http\Controllers\Api;

use App\Transformers\UsergroupTransformer;
use Illuminate\Http\Request;
use App\Usergroup;

class UsergroupController extends Controller
{
	public function index()
	{
		$limit = request()->query('limit',10);
		if($uid = request()->query('uid')){
			$usergroups = Usergroup::where('user_id',$uid)->paginate($limit);
		}else if($gid = request()->query('gid')){
			$usergroups = Usergroup::where('group_id',$gid)->paginate($limit);
		}else{
			$usergroups = Usergroup::paginate($limit);
		}
		return $this->response->paginator($usergroups,new UsergroupTransformer());	
	}

	//提交用户团购
	public function store(Request $request)
    {
		
        //将数据插入到数据库中
		//创建模型
		$usergroup = new Usergroup;
		$usergroup->group_id = $request->input('group_id');
		$usergroup->user_id = $request->input('user_id');
		$usergroup->username = $request->input('username');
		$usergroup->usertel = $request->input('usertel');
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
			return $usergroup;
		}else{
			return back()->with('info','添加失败');
		}
    }

	//文章展示
	public function show($id){
		$usergroup = Usergroup::find($id);
		return $this->response->item($usergroup,new UsergroupTransformer());
	}
}
