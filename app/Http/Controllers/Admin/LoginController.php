<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    // 显示登录页面
    public function show()
    {
        return view('Admin.login');
    }

    // 登录功能
    public function Login(Request $request)
    {

        // 表单验证
        $this->validate($request, [
            'username' => 'required|exists:shop_users',
            'password' => 'required'
        ], [
            'required' => ':attribute 必须要填写',
            'exists' => ':attribute 错误'
        ], [
            'username' => '用户名或密码',
            'password' => '密码'
        ]);

        // 验证身份
        $userInfo = DB::table('shop_users')
            ->where('username', '=', $request->username)
            ->first();

        // 验证密码
        if (password_verify($request->password, $userInfo->password)) {
            
            // 保存登录状态
            session([
                'isLogin' => true,
                'userInfo' => [
                    'id' => $userInfo->id,
                    'username' => $userInfo->username
                ]
            ]);
            // 跳转到后台首页
            return redirect('/admin');
        } else {
            return back()
                ->withInput();
        }
    }
}
