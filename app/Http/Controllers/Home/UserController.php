<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\ShopUserinfo;

class UserController extends Controller
{
    // 显示用户
    public function secure()
    {
        return view('Home.user.secure');
    }

    public function mycenter()
    {
        return view('Home.user.mycenter');
    }
    
}
