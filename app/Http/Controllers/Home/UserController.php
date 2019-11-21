<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\ShopUserinfo;
use Illuminate\Support\Facades\Hash;

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
    

    // 修改个人资料
    public function edit(Request $request)
    {
        $res = \App\ShopUserinfo::where('id', '=', $request->id)
                ->update([
                    'username' => $request->username,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'sex' => $request->sex,
                ]);
        if ($res) {
            echo "<script>alert('修改成功');location.href='/home/user/mycenter'</script>";
        } else {
            echo "<script>alert('修改失败');location.href='/home/user/mycenter'</script>";
        }
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

}
