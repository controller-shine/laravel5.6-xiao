<?php

namespace App\Http\Controllers\Api;

use App\Transformers\ConfirmTransformer;
use Illuminate\Http\Request;
use App\Mallorder;

class ConfirmController extends Controller
{
	public function index()
	{
		$limit = request()->query('limit',10);
		if($uid = request()->query('uid')){
			$mallorders = Mallorder::where('user_id',$uid)->paginate($limit);
		}else if($cid = request()->query('cid')){
			$mallorders = Mallorder::where('cate_id',$cid)->paginate($limit);
		}else if($pid = request()->query('pid')){
			$mallorders = Mallorder::where('product_id',$pid)->paginate($limit);
		}else{
			$mallorders = Mallorder::paginate($limit);
		}
		return $this->response->paginator($mallorders,new ConfirmTransformer());
	}
	//提交商品
	public function store(Request $request)
    {
		
        //将数据插入到数据库中
		//创建模型
		$mallorder = new Mallorder;
		$mallorder->cate_id = $request->input('cate_id');
		$mallorder->user_id = $request->input('user_id');
		$mallorder->addr = $request->input('addr');
		$mallorder->address = $request->input('address');
		$mallorder->product_id = $request->input('product_id');
		$mallorder->purchasedate= $request->input('purchasedate');
		$mallorder->price = $request->input('price');
		$mallorder->assess = $request->input('assess');
		$mallorder->schedule = $request->input('schedule');
		$mallorder->status = $request->input('status');
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
			  $mallorder->img = trim($destinationPath.$fullName,'.');
			 
		}	
		if($mallorder->save()){
			return $mallorder;
		}else{
			return back()->with('info','添加失败');
		}
    }
	//文章展示
	public function show($id){
		$mallorder = Mallorder::find($id);
		return $this->response->item($mallorder,new ConfirmTransformer());
	}
}
