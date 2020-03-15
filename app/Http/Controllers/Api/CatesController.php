<?php

namespace App\Http\Controllers\Api;

use App\Transformers\CatesTransformer;
use Illuminate\Http\Request;
use App\Cate;

class CatesController extends Controller
{
    public function cates()
	{
		
		return $this->response->collection(Cate::get(),new CatesTransformer());	
	}
	//文章展示
	public function show($id){
		$cate = Cate::find($id);
		return $this->response->item($cate,new CateSTransformer());
	}
}
