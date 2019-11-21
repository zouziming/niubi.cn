<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\ShopUserinfo;
use Hash;

class RegisterController extends Controller
{
    // 显示注册页
    public function show()
    {
        return view('Home.register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'username'=>'required|unique:shop_userinfo|min:2|max:255',
            'password'=>'required|alpha_num|min:6|confirmed',
            'password_confirmation'=>'required|same:password'
        ],[
            'username.required' => '用户名不能为空',
            'username.unique' => '用户名已存在',
            'username.max' => '用户名过长',
            'username.min' => '用户名不能少于2个字',

            'password.required' => '密码不能为空',
            'password.alpha_num' => '密码只能是字母数字',
            'password.min' => '密码不能少于6个字符',
            'password.confirmed' => '两次密码不一致',

            'password_confirmation.required' => '请确认密码',
        ]);

        $data['username'] = $request->username;
        $data['password'] = Hash::make($request->password);
        $data['addtime'] = date('Y-m-d H:i:s');
        $res = \App\ShopUserinfo::insert($data);
        if ($res) {
            echo "<script>alert('注册成功，请去登录！');location.href='/home/login'</script>"; 
        } else {
            echo "<script>alert('注册失败！');location.href='/home/register'</script>";
        }
    }
}

