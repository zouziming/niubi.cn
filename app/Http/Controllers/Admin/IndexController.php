<?php

namespace App\Http\Controllers\Admin;

use App\ShopUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    // 显示首页
    public function index(Request $request)
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



    // 修改密码
    public function pwd(Request $request)
    {
        $id = $request->all('id');
        $user = \App\ShopUserinfo::where($id)->first();
        // dump($user);
        return view('Admin.pwd',[
            'user' => $user
        ]);
    }
    public function editpwd(Request $request)
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
        $userInfo = \App\ShopUserinfo::where('username', '=', $request->username)
            ->first();
        // 验证密码
        if (Hash::check( $request->oldpassword, $userInfo->password)) {
            $password = Hash::make($request->password);
            $res = \App\ShopUserinfo::where('id', '=', $request->id)
                    ->update(['password'=>$password]);
            if ($res) {
                echo "<script>alert('修改成功');location.href='/admin/login'</script>"; 
            } else {
                echo "<script>alert('修改失败！');location.href='/admin'</script>";
            }
        } else {
            echo "<script>alert('原密码错误');location.href='/admin'</script>";
        }
    }
}
