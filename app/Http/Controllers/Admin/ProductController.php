<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
//使用类
use App\Http\Controllers\Controller;
use App\Product;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$products = product::orderBy('id','asc')->get();
		
		
		return view('admin.product.index',['products'=>$products]);
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
		
		return view('admin.product.add',['cates'=>$cates]);
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
		$product = new Product;
		$product->title = $request->input('title');
		$product->brand = $request->input('brand');
		$product->model = $request->input('model');
		$product->introduction = $request->input('introduction');
		$product->number = $request->input('number');
		$product->cate_id = $request->input('cate_id');
		$product->price = $request->input('price');
		$product->vprice = $request->input('vprice');
		$product->gprice = $request->input('gprice');
		$product->inventory = $request->input('inventory');
		$product->details = $request->input('details');
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
			  $product->img = trim($destinationPath.$fullName,'.');
			 
		}	
		if($product->save()){
			return redirect('/admin/product')->with('info','添加成功');
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
		$info = Product::findOrFail($id);
		//解析模板
		return view('admin.product.edit',['info'=>$info,'cates'=>$cates]);
		
		
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
		$product = Product::findOrFail($id);
		$product->title = $request->input('title');
		$product->brand = $request->input('brand');
		$product->model = $request->input('model');
		$product->introduction = $request->input('introduction');
		$product->number = $request->input('number');
		$product->cate_id = $request->input('cate_id');
		$product->price = $request->input('price');
		$product->vprice = $request->input('vprice');
		$product->gprice = $request->input('gprice');
		$product->inventory = $request->input('inventory');
		$product->details = $request->input('details');
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
			  $product->img = trim($destinationPath.$fullName,'.');
			 
		}	
		if($product->save()){
			return redirect('/admin/product')->with('info','更新成功');
		}else{
			return back()->with('info','更新失败');
		}
    }


	//获取所有的分类信息 并排序
	public static function getProducts()
	{
		//读取分类
		$products = product::orderBy('id','desc')->get();
		
		return $products;
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
        $product = product::findOrFail($id);
        //删除图片
        @unlink('.'.$product->img);
        //删除
        if($product->delete()) {
            return back()->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');
        }
    }
    	
}
