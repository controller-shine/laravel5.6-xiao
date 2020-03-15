<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\News;

class NewsTransformer extends TransformerAbstract
{
	//定义可以include可使用的字段
	protected $availableIncludes = ['cate'];
	
    public function transform(News $News)
    {
        return [
			'id'=>$News['id'],
			'cate_id'=>$News['cate_id'],
			'title'=>$News['title'],
			'introduction'=>$News['introduction'],
			'comment'=>$News['comment'],
			'author'=>$News['author'],
			'created_at'=>$News->created_at->toDateTimeString(),
		];
    }
	
	public function includeCate(News $news)
	{
		return $this->item($news->cate,new CatesTransformer());
	}
}
