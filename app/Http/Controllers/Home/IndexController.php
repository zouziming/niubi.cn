<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\ShopUsers;

class IndexController extends Controller
{
    public function index()
    {
        return view('Home.index');
    }

    // 退出登录
    public function logout()
    {
        session()->forget('qtLogin');
        session()->forget('userInfo');
        return redirect('/home');
    }
}