<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    // 显示首页
    public function index()
    {
        return view('Admin.index');
    }

    // 退出登录
    public function logout()
    {
        session()->forget('isLogin');
        session()->forget('userInfo');
        return redirect('/admin/login');
    }
}
