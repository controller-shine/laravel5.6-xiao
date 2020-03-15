<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Mallorder;

class ConfirmTransformer extends TransformerAbstract
{
	//定义可以include可使用的字段
	protected $availableIncludes = ['cate','user','product'];
	
    public function transform(Mallorder $Mallorder)
    {
        return [
			'id'=>$Mallorder['id'],
			'cate_id'=>$Mallorder['cate_id'],
			'user_id'=>$Mallorder['user_id'],
			'product_id'=>$Mallorder['product_id'],
			'addr'=>$Mallorder['addr'],
			'address'=>$Mallorder['address'],
			'purchasedate'=>$Mallorder['purchasedate'],
			'price'=>$Mallorder['price'],
			'img'=>$Mallorder['img'],
			'num'=>$Mallorder['num'],
			'assess'=>$Mallorder['assess'],
			'status'=>$Mallorder['status'],
			'schedule'=>$Mallorder['schedule'],
			'comments'=>$Mallorder['comments'],
			'score'=>$Mallorder['score'],
			'logisticstype'=>$Mallorder['logisticstype'],
			'logisticsname'=>$Mallorder['logisticsname'],
			'logisticsnum'=>$Mallorder['logisticsnum'],
			'created_at'=>$Mallorder->created_at->toDateTimeString(),
		];
    }
	
	public function includeCate(Mallorder $mallorder)
	{
		return $this->item($mallorder->cate,new CatesTransformer());
	}
	public function includeUser(Mallorder $mallorder)
	{
		return $this->item($mallorder->user,new userTransformer());
	}
	public function includeProduct(Mallorder $mallorder)
	{
		return $this->item($mallorder->product,new productsTransformer());
	}
}
