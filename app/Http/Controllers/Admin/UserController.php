<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\ShopUserinfo;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // 显示用户
    public function show()
    {
        $users = \App\ShopUserinfo::paginate(10);

        return view('Admin.user.index', [
            'users' => $users,
        ]);
    }


    /**
     * 添加功能
     */
    // 显示添加用户页面
    public function add()
    {
        return view('Admin.user.add');
    }
    // 添加用户
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:255|min:2|unique:shop_userinfo',
            'password'=>'required|alpha_num|min:6|confirmed',
            'email' => 'required|email',
            'pic' => 'required',
            'phone' => 'required|regex:/^1[345789][0-9]{9}$/',
        ],[
            'username.required' => '用户名不能为空',
            'username.max' => '用户名过长',
            'username.min' => '用户名不能少于2个字符',
            'username.unique' => '用户名已存在',

            'pic.required' => '请选择头像',
            'password.required' => '新密码不能为空',
            'password.alpha_num' => '新密码只能是字母数字',
            'password.min' => '新密码不能少于6个字符',
            'password.confirmed' => '两次密码不一致',

            'email.required' => '邮箱不能为空',
            'email.email' => '邮箱规则不合法',
            'phone.required' => '手机号不能为空',
            'phone.regex' => '手机格式不对',

        ]);
        $data = [];
        $data['username'] = $request->username;
        $data['password'] = Hash::make($request->password);
        $data['pic'] = $request->pic->store('touxiang', 'public');
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['sex'] = $request->sex;
        $data['status'] = $request->status;
        $data['addtime'] = date('Y-m-d H:i:s');
        $res = \App\ShopUserinfo::insert($data);
        if ($res) {
            return [
                'code' => 0, 
                'msg' => '添加成功',
            ];
        } else {
            return response()->json([
                'code' => 1,
                'msg' => '添加失败',
            ], 500);
        }
    }


    /**
     * 删除功能
     */
    // 删除数据
    public function del($id)
    {
        $res = \App\ShopUserinfo::where('id', '=', $id)->delete();
        if ($res) {
            return [
                'code' => 0,
                'msg' => '删除成功！'
            ];
        } else {
            return response()->json([
                'code' => 1,
                'msg' => '删除失败！'
            ], 500);
        }
    }


    /**
     * 修改功能
     */
    // 显示修改页面
    public function edit(Request $request)
    {
        $id = $request->all('id');
        $user = \App\ShopUserinfo::where($id)->first();
        return view('Admin.user.edit',[
            'user'=>$user
        ]);
    }
    // 修改数据
    public function doedit(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:255',
            'email' => 'required',
            'phone' => 'required',
            'sex' => 'required',
        ],[
            'username.required' => '用户名不能为空',
            'username.max' => '用户名过长',

            'email.required' => '邮箱不能为空',
            'phone.required' => '手机号不能为空',

        ]);

        $res = \App\ShopUserinfo::where('id', '=', $request->id)
                ->update([
                    'username' => $request->username,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'sex' => $request->sex,
                ]);
        if ($res) {
            echo "<script>alert('修改成功');location.href='index'</script>";
        } else {
            echo "<script>alert('修改失败');location.href='index'</script>";
        }
    }
    // 更改状态
    public function status($id,$status)
    {

        $res = new \App\ShopUserinfo;
        $res->where('id',$id)->update(['status'=>$status]);
        if ($res) {
            return redirect('/admin/user/index');
        } else {
            echo "<script>alert('更换失败');location.href='index'</script>";
        }
    }


    /**
     * 搜索功能
     */
    // 搜索
    public function search(Request $request)
    {
        $status = [];
        if (!empty($request->status)) {
          $status[] = ['status','like',$request->status];
        }
        $users = \App\ShopUserinfo::where('id','like','%'.$request->id.'%')
        ->where('username','like','%'.$request->username.'%')
        ->where($status)
        ->paginate(10)
        ->appends(['id' => $request->id, 'username'=> $request->username, 'status' => $request->status]);
        return view('Admin.user.index',[
            'users' => $users,
        ]);
    }
    
}
