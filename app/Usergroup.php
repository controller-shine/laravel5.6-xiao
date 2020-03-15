<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usergroup extends Model
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
	public function group()
	{
		return $this->belongsTo('\App\Group');
	}
	public function user()
	{
		return $this->belongsTo('\App\User');
	}
}
