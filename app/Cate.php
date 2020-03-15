<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    //
	public function news()
	{
		return $this->belongsTo('\App\News');
	}
}
