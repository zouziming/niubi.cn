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

        if ($userInfo['status'] != 1) {
            echo "<script>alert('您的账号已被封，请联系管理员：13416341860');location.href='/home/login'</script>";
            exit;
        }

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


    // 显示手机登录页面
    public function showphone()
    {
        return view('Home.logincode');
    }

    // 发送手机验证码
    public function logincode(Request $request)
    {
        if (empty($request->phone)) {
            return ['code' => 0];
        } else {
            if (!preg_match('/^1[345789][0-9]{9}$/', $request->phone)) {
                return ['code' => 1];
            } else {
                include public_path('lib/CCP/Demo/SendTemplateSMS.php');
                $checkcode = rand(1000,9999);
                session(['checkcode' => $checkcode]);

                $phone = $request->phone;
                $res = sendTemplateSMS($phone,[$checkcode,'1'],1);
                if ($res) {
                    return ['code' => 2];
                } else {
                    return ['code' => 3];
                }
            }
        }
    }

    // 手机号登录
    public function dologincode(Request $request)
    {

        $this->validate($request, [
            'phone'=>'required|regex:/^1[345789][0-9]{9}$/',
            'checkcode'=>'required',
        ],[
            'phone.required' => '请输入手机号', 
            'phone.regex' => '手机号格式不对', 
            'checkcode.required' => '请输入验证码',
        ]);

        $userInfo = \App\ShopUserinfo::where('phone', '=', $request->phone)->first();

        if ($userInfo['status'] != 1) {
            echo "<script>alert('您的账号已被封，请联系管理员：13416341860');location.href='/home/login'</script>";
            exit;
        }

        if (session('checkcode') == $request->checkcode) {
            
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
            return redirect('/home');
        } else {
            echo "<script>alert('验证码不正确！');location.href='/home/logincode'</script>";
        }
    }
}