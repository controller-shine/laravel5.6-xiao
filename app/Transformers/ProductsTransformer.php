<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Product;

class ProductsTransformer extends TransformerAbstract
{
	//定义可以include可使用的字段
	protected $availableIncludes = ['cate'];
	
    public function transform(Product $Product)
    {
        return [
			'id'=>$Product['id'],
			'cate_id'=>$Product['cate_id'],
			'model'=>$Product['model'],
			'brand'=>$Product['brand'],
			'title'=>$Product['title'],
			'introduction'=>$Product['introduction'],
			'img'=>$Product['img'],
			'price'=>$Product['price'],
			'vprice'=>$Product['vprice'],
			'gprice'=>$Product['gprice'],
			'inventory'=>$Product['inventory'],
			'details'=>$Product['details'],
			'created_at'=>$Product->created_at->toDateTimeString(),
		];
    }
	
	public function includeCate(Product $product)
	{
		return $this->item($product->cate,new CatesTransformer());
	}
}
