<?php

namespace App\Http\Controllers\Api;

use App\Transformers\ReservationTransformer;
use Illuminate\Http\Request;
use App\Service;

class ReservationController extends Controller
{
	//显示团购列表
	public function index()
	{
		$limit = request()->query('limit',10);
		if($uid = request()->query('uid')){
			$services = Service::where('user_id',$uid)->paginate($limit);
		}else if($cid = request()->query('cid')){
			$services = Service::where('cate_id',$cid)->paginate($limit);
		}else if($pid = request()->query('pid')){
			$services = Service::where('product_id',$pid)->paginate($limit);
		}else{
			$services = Service::paginate($limit);
		}

		return $this->response->paginator($services,new ReservationTransformer());
	}
	
	//提交服务
	public function store(Request $request)
    {
		
        //将数据插入到数据库中
		//创建模型
		$service = new Service;
		$service->types 			= $request->input('types');//服务类型
		$service->cate_id 			= $request->input('cate_id');//产品类型
		$service->user_id 			= $request->input('user_id');//用户ID
		$service->product_id 		= $request->input('product_id');//产品ID
		$service->brand 			= $request->input('brand');//品牌及型号
		$service->username 			= $request->input('username');//联系人姓名
		$service->usertel 			= $request->input('usertel');//联系人电话
		$service->callertel			= $request->input('callertel');//报单人电话
		$service->addr 				= $request->input('addr');//地区
		$service->address 			= $request->input('address');//地址
		$service->purchasedate 		= $request->input('purchasedate');//购机日期
		$service->appointment 		= $request->input('appointment');//预约日期
		$service->faultdescription 	= $request->input('faultdescription');//故障说明
		$service->assess 			= $request->input('assess');//评价
		$service->schedule 			= $request->input('schedule');//进度
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
			  $service->img = trim($destinationPath.$fullName,'.');
			 
		}	
		if($service->save()){
			return $service;
		}else{
			return back()->with('info','添加失败');
		}
    }
	
	//文章展示
	public function show($id){
		$service = Service::find($id);
		return $this->response->item($service,new ReservationTransformer());
	}
	
}
