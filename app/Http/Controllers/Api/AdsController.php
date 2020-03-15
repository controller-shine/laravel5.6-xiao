<?php

namespace App\Http\Controllers\Api;

use App\Transformers\AdsTransformer;
use Illuminate\Http\Request;
use App\Ads;

class AdsController extends Controller
{
	public function index()
	{
		$limit = request()->query('limit',10);
		if($cid = request()->query('cid')){
			$ad = Ads::where('cate_id',$cid)->paginate($limit);
		}else{
			$ad = Ads::paginate($limit);
		}
		return $this->response->paginator($ad,new AdsTransformer());	
	}
	//文章展示
	public function show($id){
		$ads = Ads::find($id);
		return $this->response->item($ads,new AdsTransformer());
	}
}
