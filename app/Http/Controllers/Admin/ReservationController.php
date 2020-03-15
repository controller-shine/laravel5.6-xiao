<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
//使用类
use App\Http\Controllers\Controller;
use App\Service;


class 	ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$services = service::orderBy('id','desc')->get();
		
		
		return view('admin.reservation.index',['services'=>$services]);
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
		//
		$services = service::orderBy('id','desc')->get();

		return view('admin.reservation.add',['cates'=>$cates,'products'=>$products,'services'=>$services]);
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
		$service = new Service;
		$service->types = $request->input('types');
		$service->cate_id = $request->input('cate_id');
		$service->user_id = $request->input('user_id');
		$service->username = $request->input('username');
		$service->usertel = $request->input('usertel');
		$service->tel = $request->input('tel');
		$service->callertel = $request->input('callertel');
		$service->addr = $request->input('addr');
		$service->address = $request->input('address');
		$service->product_id = $request->input('product_id');
		$service->purchasedate = $request->input('purchasedate');
		$service->appointment = $request->input('appointment');
		$service->faultdescription = $request->input('faultdescription');
		$service->workername = $request->input('workername');
		$service->workertel = $request->input('workertel');
		$service->assess = $request->input('assess');
		$service->schedule = $request->input('schedule');
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
			return redirect('/admin/reservation')->with('info','添加成功');
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
		$info = Service::findOrFail($id);
		//
		$services = service::orderBy('id','desc')->get();
		//解析模板
		return view('admin.reservation.add',['info'=>$info,'cates'=>$cates,'services'=>$services]);
	
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
		$info = Service::findOrFail($id);
		//
		$services = service::orderBy('id','desc')->get();
		//解析模板
		return view('admin.reservation.edit',['info'=>$info,'cates'=>$cates,'services'=>$services]);
		
		
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
		$service = Service::findOrFail($id);
		$service->workername = $request->input('workername');
		$service->workertel = $request->input('workertel');
		$service->schedule = $request->input('schedule');
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
			return redirect('/admin/reservation')->with('info','更新成功');
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
        $service = service::findOrFail($id);
        //删除图片
        @unlink('.'.$service->img);
        //删除
        if($service->delete()) {
            return back()->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');
        }
    }
	

    	
}
