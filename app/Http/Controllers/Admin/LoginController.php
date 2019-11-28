<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\ShopUserinfo;
use Illuminate\Support\Facades\Hash;

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
            'username' => 'required|exists:shop_userinfo|max:255',
            'password' => 'required|min:6',
            'captcha' => 'required|captcha',
        ],[
            'username.required' => '用户名不能为空',
            'username.exists' => '用户名不正确',
            'username.max' => '用户名过长',
            
            'password.required' => '密码不能为空',
            'password.min' => '密码不能低于6位数',

            'captcha.required' => '验证码不能为空',
            'captcha.captcha' => '验证码不正确',
        ]);

        // 验证身份
        $userInfo = \App\ShopUserinfo::where('username', '=', $request->username)
            ->first();

        if ($userInfo['status'] != 1) {
            echo "<script>alert('您的账号已被封，请联系管理员：13416341860');location.href='/admin/login'</script>";
            exit;
        }

        // 验证密码
        if (Hash::check( $request->password, $userInfo->password)) {
            
            // 保存登录状态
            session([
                'isLogin' => true,
                'userInfo' => [
                    'id' => $userInfo->id,
                    'username' => $userInfo->username,
                    'sex' => $userInfo->sex,
                    'phone' => $userInfo->phone,
                    'pic' => $userInfo->pic,
                    'email' => $userInfo->email,
                    'status' => $userInfo->status,
                    'addtime' => $userInfo->addtime
                ]
            ]);
            // 跳转到后台首页
            return redirect('/admin');
        } else {
            echo "<script>alert('密码错误！');location.href='/admin/login'</script>";
            // return back()->withInput();
        }
    }

}
