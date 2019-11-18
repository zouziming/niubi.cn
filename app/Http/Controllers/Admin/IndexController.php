<?php

namespace App\Http\Controllers\Admin;

use App\ShopUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $id = Auth::users()->id;
        // dd($id);
        $oldpassword = $request->input('oldpassword'); 
        $newpassword = $request->input('newpassword'); 
        $res = DB::table('shop_userinfo')->where('id',$id)->select('password')->first(); 
        if(!Hash::check($oldpassword, $res->password)){ 
            echo 2; 
            exit;//原密码不对 
        } 
        $update = array( 
          'password'  =>bcrypt($newpassword), 
        ); 
        $result = DB::table('shop_userinfo')->where('id',$id)->update($update); 
        if($result){ 
            echo 1;exit; 
        }else{ 
            echo 3;exit; 
        } 
        // $model = Auth::guard('admin')->user();
        // $model->password=bcrypt($request['password']);
        // $model->save();
        // if ($model->save()){
        //     Auth::guard('admin')->logout();
        //     return redirect('Admin.index');
        // }

    }
}
