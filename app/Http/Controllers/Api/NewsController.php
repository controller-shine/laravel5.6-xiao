<?php

namespace App\Http\Controllers\Api;

use App\Transformers\NewsTransformer;
use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
	public function index()
	{
		$limit = request()->query('limit',10);
		if($cid = request()->query('cid')){
			$new = News::where('cate_id',$cid)->paginate($limit);
		}else{
			$new = News::paginate($limit);
		}
		return $this->response->paginator($new,new NewsTransformer());	
	}
	//文章展示
	public function show($id){
		$news = News::find($id);
		return $this->response->item($news,new NewsTransformer());
	}
}
