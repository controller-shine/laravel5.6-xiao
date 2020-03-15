<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
	public function tag()
	{
		return $this->belongsToMany('\App\Tag');
	}
	public function product()
	{
		return $this->belongsTo('\App\Product');
	}
	public function usergroup()
	{
		return $this->belongsTo('\App\Usergroup');
	}
	public function user()
	{
		return $this->belongsTo('\App\User');
	}
	public function cate()
	{
		return $this->belongsTo('\App\Cate');
	}
}
