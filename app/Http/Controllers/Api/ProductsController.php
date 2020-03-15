<?php

namespace App\Http\Controllers\Api;

use App\Transformers\ProductsTransformer;
use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
	public function index()
	{
		$limit = request()->query('limit',10);
		if($cid = request()->query('cid')){
			$products = Product::where('cate_id',$cid)->paginate($limit);
		}else{
			$products = Product::paginate($limit);
		}
		return $this->response->paginator($products,new ProductsTransformer());	
	}
	//文章展示
	public function show($id){
		$product = Product::find($id);
		return $this->response->item($product,new ProductsTransformer());
	}
}
