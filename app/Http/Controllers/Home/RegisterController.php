<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\ShopUserinfo;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    // 显示注册页
    public function show()
    {
        return view('Home.register');
    }
    

    // 手机号注册发送验证码
    public function register(Request $request)
    {
        if (empty($request->phone)) {
            return [
                'code' => 0,
            ];
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
                    return [
                        'code' => 2,
                    ];
                } else {
                    return [
                        'code' => 3,
                    ];
                }
            }
        }
    }

    // 手机号注册
    public function doRegister(Request $request)
    {

        $this->validate($request, [
            'phone'=>'required|regex:/^1[345789][0-9]{9}$/',
            'checkcode'=>'required',
            'username'=>'required|unique:shop_userinfo|min:2|max:255',
            'password'=>'required|alpha_num|min:6|confirmed',
        ],[
            'phone.required' => '请输入手机号', 
            'phone.regex' => '手机号格式不对', 
            'checkcode.required' => '请输入验证码',

            'username.required' => '用户名不能为空',
            'username.unique' => '用户名已存在',
            'username.max' => '用户名过长',
            'username.min' => '用户名不能少于2个字',

            'password.required' => '密码不能为空',
            'password.alpha_num' => '密码只能是字母数字',
            'password.min' => '密码不能少于6个字符',
            'password.confirmed' => '两次密码 不一致', 
        ]);

        if (session('checkcode') == $request->checkcode) {
            // 添加用户
            $data['phone'] = $request->phone;
            $data['checkcode'] = $request->checkcode;
            $data['username'] = $request->username;
            $data['password'] = Hash::make($request->password);
            $data['addtime'] = date('Y-m-d H:i:s');

            $res = \App\ShopUserinfo::insert($data);
            // return [
            //     'code' => 1,
            // ];
            echo "<script>alert('注册成功，请去登录！');location.href='/home/login'</script>"; 
            
        } else {
            // return [
            //     'code' => 0,
            // ];
            echo "<script>alert('验证码不正确，注册失败！');location.href='/home/register'</script>";

        }
    }


}

