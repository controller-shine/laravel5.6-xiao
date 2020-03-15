<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
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
	public function product()
	{
		return $this->belongsTo('\App\Product');
	}
	public function user()
	{
		return $this->belongsTo('\App\User');
	}
}
