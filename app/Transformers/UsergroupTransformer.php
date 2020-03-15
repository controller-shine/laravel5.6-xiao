<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Usergroup;

class UsergroupTransformer extends TransformerAbstract
{
	//定义可以include可使用的字段
	protected $availableIncludes = ['user','group'];
	
    public function transform(Usergroup $Usergroup)
    {
        return [
			'id'=>$Usergroup['id'],
			'group_id'=>$Usergroup['group_id'],
			'user_id'=>$Usergroup['user_id'],
			'username'=>$Usergroup['username'],
			'usertel'=>$Usergroup['usertel'],
			'status'=>$Usergroup['status'],
			'created_at'=>$Usergroup->created_at->toDateTimeString(),
		];
    }
	
	public function includeUser(Usergroup $usergroup)
	{
		return $this->item($usergroup->user,new userTransformer());
	}
	public function includeGroup(Usergroup $usergroup)
	{
		return $this->item($usergroup->group,new groupTransformer());
	}
}
