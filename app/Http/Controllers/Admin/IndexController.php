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
        // $user = \App\ShopUserinfo::where('id', '=', session('userInfo.id'))
                // ->first();
        // dd(session('userInfo.id'));,['user' => $user]
        return view('Admin.index');
    }


    // 退出登录
    public function logout()
    {
        session()->forget('isLogin');
        session()->forget('userInfo');
        return redirect('/admin/login');
    }


    /**
     * 修改个人资料
     */
    // 显示修改密码页面
    public function pwd(Request $request)
    {
        $id = $request->all('id');
        $user = \App\ShopUserinfo::where($id)->first();

        return view('Admin.pwd',[
            'user' => $user
        ]);
    }

    // 修改密码
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

    // 修改个人信息
    public function info(Request $request)
    {
        $this->validate($request, [
            'username' => 'min:2|unique:shop_userinfo',
            'email' => 'email',
            'phone' => 'regex:/^1[345789][0-9]{9}$/',
        ],[
            'username.min' => '用户名最少2个字符',
            'username.unique' => '用户名已存在',
            'email.email' => '邮箱规则不合法',
            'phone.regex' => '手机格式不对',
        ]);

        $res = \App\ShopUserinfo::where('id', '=', $request->id)
                ->update([
                    'username' => $request->username,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'sex' => $request->sex,
                ]);
        if ($res) {
            return [
                'code' => 0,
            ];
        } else {
            return [
                'code' => 1,
            ];
        }
    }

    // 显示修改头像页面
    public function headpic()
    {
        // $user = \App\ShopUserinfo::where('id', '=', session('userInfo.id'))
        //         ->first();['user' => $user]
        return view('Admin.headpic');
    }

    // 修改头像
    public function editheadpic(Request $request)
    {

        $data = $request->pic->store('touxiang', 'public');

        $res = \App\ShopUserinfo::where('id', '=', $request->id)
            ->update(['pic' => $data]);
        if ($res) {
            return [
                'code' => 0, 
                'msg' => '修改成功'
            ];
        } else {
            return response()->json([
                'code' => 1,
                'msg' => '修改失败',
            ]);
        }
    }

}
