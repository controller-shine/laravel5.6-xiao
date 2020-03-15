<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
//使用类
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
}