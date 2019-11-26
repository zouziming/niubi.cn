<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\ShopUserinfo;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function show()
    {
        return view('Home.login');
    }

    public function login(Request $request)
    {
        // 表单验证
        $this->validate($request, [
            'username' => 'required|exists:shop_userinfo|max:255',
            'password' => 'required|min:6',
            'captcha' => 'required|captcha',
        ],[
            'username.required' => '用户名不能为空',
            'username.exists' => '密码或用户名不正确',
            'username.max' => '用户名过长',
            
            'password.required' => '密码不能为空',
            'password.exists' => '密码或用户名不正确',
            'password.min' => '密码不能低于6位数',

            'captcha.required' => '验证码不能为空',
            'captcha.captcha' => '验证码不正确',
        ]);

        // 验证身份
        $userInfo = \App\ShopUserinfo::where('username', '=', $request->username)
            ->first();
        // 验证密码
        if (Hash::check($request->password, $userInfo->password)) {
            
            // 保存登录状态
            session([
                'qtLogin' => true,
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
            return redirect('/home');
        } else {
            echo "<script>alert('密码错误！');location.href='/home/login'</script>";
        }
    }


    public function logincode(Request $request)
    {
        if (empty($request->phone)) {
            return [
                'code' => 0,
            ];
        } else {
            include public_path('lib/CCP/Demo/SendTemplateSMS.php');
            $checkcode = rand(1000,9999);
            session(['checkcode' => $checkcode]);

            $phone = $request->phone;
            $res = sendTemplateSMS($phone,[$checkcode,'1'],1);
            if ($res) {
                return [
                    'code' => 1,
                ];
            } else {
                return [
                    'code' => 2,
                ];
            }
        }
    }
}