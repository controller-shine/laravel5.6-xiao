<?php

namespace App\Http\Controllers\Api;

use App\Transformers\UserTransformer;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function users()
	{
		return $this->response->collection(User::get(),new UserTransformer());	
	}
	
	//用户展示
	public function show($id){
		$user = User::find($id);
		return $this->response->item($user,new userTransformer());
	}
}
