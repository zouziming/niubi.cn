<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\ShopUserinfo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // 显示账户安全
    public function secure()
    {
        return view('Home.user.secure');
    }

    // 显示个人资料
    public function mycenter()
    {
        return view('Home.user.mycenter');
    }
    

    // 显示修改密码页面
    public function show()
    {
        return view('Home.user.password');
    }
    // 修改密码
    public function password(Request $request)
    {
        $this->validate($request, [
            'oldpassword'=>'required',
            'password'=>'required|alpha_num|min:6|confirmed',
        ],[
            'oldpassword.required' => '原密码不能为空',

            'password.required' => '新密码不能为空',
            'password.alpha_num' => '新密码只能是字母数字',
            'password.min' => '新密码不能少于6个字符',
            'password.confirmed' => '两次密码不一致',
        ]);

        // 验证身份
        $userInfo = \App\ShopUserinfo::where('id', '=', $request->id)
            ->first();
        // 验证密码
        if (Hash::check( $request->oldpassword, $userInfo->password)) {
            $password = Hash::make($request->password);
            $res = \App\ShopUserinfo::where('id', '=', $request->id)
                    ->update(['password'=>$password]);
            if ($res) {
                echo "<script>alert('修改成功,请重新登录！');location.href='/home/login'</script>"; 
            } else {
                echo "<script>alert('修改失败！');location.href='/home/user/password'</script>";
            }
        } else {
            echo "<script>alert('原密码错误');location.href='/home/user/password'</script>";
        }
    }


    // 修改个人资料
    public function edit(Request $request)
    {
        $this->validate($request, [
            'username' => 'min:2',
            'email' => 'email',
            'phone' => 'regex:/^1[345789][0-9]{9}$/',
        ],[
            'username.min' => '用户名最少2个字符',
            'email.email' => '邮箱规则不合法',
            'phone.regex' => '手机格式不对',
        ]);
                
        $res = \App\ShopUserinfo::where('id', '=', $request->id)
                ->update([
                    'username' => $request->username,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'sex' => $request->sex,
                    'pic' => $request->pic,
                ]);
        if ($res) {
            echo "<script>alert('修改成功');location.href='/home/user/mycenter'</script>";
        } else {
            echo "<script>alert('修改失败');location.href='/home/user/mycenter'</script>";
        }
    }


    // 显示修改头像页面
    public function pic()
    {
        return view('Home.user.picture');
    }
    // 修改头像
    public function picture(Request $request)
    {
        $data =  $request->pic->store('touxiang', 'public');

        $res = \App\ShopUserinfo::where('id', '=', $request->id)
            ->update(['pic' => $data]);
        if ($res) {
            return [
                'code' => 0, 
                'msg' => '更换成功'
            ];
        } else {
            return response()->json([
                'code' => 1,
                'msg' => '更换失败',
            ]);
        }
    }

}
