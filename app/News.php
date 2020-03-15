<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
	public function tag()
	{
		return $this->belongsToMany('\App\Tag');
	}
	public function cate()
	{
		return $this->belongsTo('\App\Cate');
	}
}
