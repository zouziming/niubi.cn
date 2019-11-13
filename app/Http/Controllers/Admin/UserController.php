<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\ShopUserinfo;

class UserController extends Controller
{

    // 显示用户
    public function show()
    {
        $users = \App\ShopUserinfo::paginate(10);
        // dd($users);
        return view('Admin.user.index', [
            'users' => $users,
        ]);

    }


    // 显示添加用户页面
    public function add()
    {
        return view('Admin.user.add');
    }
    // 添加用户
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'pic' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'sex' => 'required',
        ]);

        $data = [];
        $data['username'] = $request->username;
        $data['pic'] = $request->pic->store('touxiang', 'public');
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['sex'] = $request->sex;
        $data['addtime'] = date('Y-m-d H:i:s');

        // $res = DB::table('shop_userinfo')->insert($data);
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


    // 显示修改页面
    public function edit()
    {
        return view('Admin.user.edit');
    }
    // 修改数据
    public function doedit()
    {
        $res = \App\ShopUserinfo::find('id', '=', $id)->delete();
        if ($res) {
            return [
                'code' => 0,
                'msg' => '修改成功！'
            ];
        } else {
            return response()->json([
                'code' => 1,
                'msg' => '修改失败！'
            ], 500);
        }
    }


    // 搜索功能
    public function search(Request $request)
    {
        $name = [];
        // if (!empty($request->status)) {
        //   $name[] = ['status','like',$request->status];
        // }
        $res = \App\ShopUserinfo::where('username','like','%'.$request->username.'%')
        ->where($name)
        ->paginate(10);
        return view('Admin.user.index',[
            'users' => $res,
        ]);
    }
    
}
