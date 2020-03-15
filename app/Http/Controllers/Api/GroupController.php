<?php

namespace App\Http\Controllers\Api;

use App\Transformers\GroupTransformer;
use Illuminate\Http\Request;
use App\Group;

class GroupController extends Controller
{
	//显示团购列表
	public function index()
	{
		$limit = request()->query('limit',10);
		if($uid = request()->query('uid')){
			$groups = Group::where('user_id',$uid)->paginate($limit);
		}else if($cid = request()->query('cid')){
			$groups = Group::where('cate_id',$cid)->paginate($limit);
		}else if($pid = request()->query('pid')){
			$groups = Group::where('product_id',$pid)->paginate($limit);
		}else{
			$groups = Group::paginate($limit);
		}
		return $this->response->paginator($groups,new GroupTransformer());
	}

	//提交数据
	public function store(Request $request)
    {
		
        //将数据插入到数据库中
		//创建模型
		$group = new Group;
		$group->cate_id = $request->input('cate_id');
		$group->user_id = $request->input('user_id');
		$group->product_id = $request->input('product_id');
		$group->productname = $request->input('productname');
		$group->price = $request->input('price');
		$group->startdate = $request->input('startdate');
		$group->entdate = $request->input('entdate');
		$group->groupnumber = $request->input('groupnumber');
		$group->currentnumber = $request->input('currentnumber');
		$group->status = $request->input('status');
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
			return $group;
		}else{
			return back()->with('info','添加失败');
		}
    }
    
	//团购ID展示
	public function show($id){
		$group = Group::find($id);
		return $this->response->item($group,new GroupTransformer());
	}
}
