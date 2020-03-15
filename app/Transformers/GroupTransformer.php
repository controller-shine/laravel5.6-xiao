<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Group;

class GroupTransformer extends TransformerAbstract
{
	//定义可以include可使用的字段
	protected $availableIncludes = ['cate','user','product'];
	
    public function transform(Group $Group)
    {
        return [
			'id'=>$Group['id'],
			'cate_id'=>$Group['cate_id'],
			'product_id'=>$Group['product_id'],
			'user_id'=>$Group['user_id'],
			'productname'=>$Group['productname'],
			'img'=>$Group['img'],
			'price'=>$Group['price'],
			'startdate'=>$Group['startdate'],
			'entdate'=>$Group['entdate'],
			'groupnumber'=>$Group['groupnumber'],
			'currentnumber'=>$Group['currentnumber'],
			'status'=>$Group['status'],
			'created_at'=>$Group->created_at->toDateTimeString(),
		];
    }
	
	public function includeCate(Group $group)
	{
		return $this->item($group->cate,new CatesTransformer());
	}
	public function includeUser(Group $group)
	{
		return $this->item($group->user,new userTransformer());
	}
	public function includeProduct(Group $group)
	{
		return $this->item($group->product,new productsTransformer());
	}
}
