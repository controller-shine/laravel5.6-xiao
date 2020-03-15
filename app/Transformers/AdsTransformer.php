<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Ads;

class AdsTransformer extends TransformerAbstract
{
	//定义可以include可使用的字段
	protected $availableIncludes = ['cate'];
	
    public function transform(Ads $Ads)
    {
        return [
			'id'=>$Ads['id'],
			'cate_id'=>$Ads['cate_id'],
			'title'=>$Ads['title'],
			'img'=>$Ads['img'],
			'introduction'=>$Ads['introduction'],
			'comment'=>$Ads['comment'],
			'author'=>$Ads['author'],
			'created_at'=>$Ads->created_at->toDateTimeString(),
		];
    }
	
	public function includeCate(Ads $ads)
	{
		return $this->item($ads->cate,new CatesTransformer());
	}
}
