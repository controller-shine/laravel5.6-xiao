<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
//使用类
use App\Http\Controllers\Controller;
use App\Mallorder;


class ConfirmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$mallorders = mallorder::orderBy('id','asc')->get();
		
		
		return view('admin.confirm.index',['mallorders'=>$mallorders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates=CatesController::getCates();
		//读取商品信息
		$products=ProductController::getProducts();
		
		return view('admin.confirm',['cates'=>$cates,'products'=>$products]);
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
		$mallorder = new Mallorder;
		$mallorder->addr = $request->input('addr');
		$mallorder->address = $request->input('address');
		$mallorder->purchasedate= $request->input('purchasedate');
		$mallorder->price = $request->input('price');
		$mallorder->assess = $request->input('assess');
		$mallorder->schedule = $request->input('schedule');
		$mallorder->logisticstype = $request->input('logisticstype');
		$mallorder->logisticsname = $request->input('logisticsname');
		$mallorder->logisticsnum = $request->input('logisticsnum');
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
			return redirect('/admin/confirm')->with('info','添加成功');
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
		$products=ProductController::getProducts();
		//读取当前文章的内容
		$info = Mallorder::findOrFail($id);
		//解析模板
		return view('admin.confirm.add',['cates'=>$cates,'products'=>$products,'info'=>$info]);
		
	
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
		$products=ProductController::getProducts();
        //读取当前文章的内容
		$info = Mallorder::findOrFail($id);
		//解析模板
		return view('admin.confirm.edit',['cates'=>$cates,'products'=>$products,'info'=>$info]);
		
		
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
		$mallorder = Mallorder::findOrFail($id);
		$mallorder->schedule = $request->input('schedule');
		$mallorder->logisticstype = $request->input('logisticstype');
		$mallorder->logisticsname = $request->input('logisticsname');
		$mallorder->logisticsnum = $request->input('logisticsnum');
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
			return redirect('/admin/confirm')->with('info','更新成功');
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
        $mallorder = mallorder::findOrFail($id);
        //删除图片
        @unlink('.'.$mallorder->img);
        //删除
        if($mallorder->delete()) {
            return back()->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');
        }
    }
    	
}
