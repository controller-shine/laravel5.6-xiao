<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Cate;

class CatesTransformer extends TransformerAbstract
{
    public function transform(Cate $Cate)
    {
        return [
			'id'=>$Cate['id'],
			'name'=>$Cate['name'],
			'created_at'=>$Cate->created_at->toDateTimeString(),
		];
    }
}
