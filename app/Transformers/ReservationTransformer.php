<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Service;

class ReservationTransformer extends TransformerAbstract
{
	//定义可以include可使用的字段
	protected $availableIncludes = ['cate','user','product'];
	
    public function transform(Service $Service)
    {
        return [
			'id'				=>$Service['id'],
			'types'				=>$Service['types'],
			'cate_id'			=>$Service['cate_id'],
			'brand'				=>$Service['brand'],
			'username'			=>$Service['username'],
			'usertel'			=>$Service['usertel'],
			'callertel'			=>$Service['callertel'],
			'addr'				=>$Service['addr'],
			'address'			=>$Service['address'],
			'purchasedate'		=>$Service['purchasedate'],
			'appointment'		=>$Service['appointment'],
			'workername'		=>$Service['workername'],
			'ordertime'			=>$Service['ordertime'],
			'faultdescription'	=>$Service['faultdescription'],
			'img'				=>$Service['img'],
			'assess'			=>$Service['assess'],
			'schedule'			=>$Service['schedule'],
			'created_at'		=>$Service->created_at->toDateTimeString(),
		];
    }

	public function includeCate(Service $service)
	{
		return $this->item($service->cate,new CatesTransformer());
	}
	public function includeUser(Service $service)
	{
		return $this->item($service->user,new userTransformer());
	}
	public function includeProduct(Service $service)
	{
		return $this->item($service->product,new productsTransformer());
	}
}
