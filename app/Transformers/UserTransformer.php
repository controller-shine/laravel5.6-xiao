<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\User;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $User)
    {
        return [
			'id'=>$User['id'],
			'username'=>$User['username'],
			'password'=>$User['password'],
			'img'=>$User['img'],
			'wxid'=>$User['wxid'],
			'tel'=>$User['tel'],
			'actualname'=>$User['actualname'],
			'email'=>$User['email'],
			'sex'=>$User['sex'],
			'addr'=>$User['addr'],
			'address'=>$User['address'],
			'introduction'=>$User['introduction'],
			'grade'=>$User['grade'],
			'created_at'=>$User->created_at->toDateTimeString(),
		];
    }
}
