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
            'username' => 'required|max:255',
            'pic' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'sex' => 'required',
        ],[
            'username.required' => '用户名不能为空',
            'username.max' => '用户名过长',
        ]);
        $data = [];
        $data['username'] = $request->username;
        $data['pic'] = $request->pic->store('touxiang', 'public');
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['sex'] = $request->sex;
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
    public function status(Request $request)
    {
        // $data = \App\ShopUserinfo::where('status', '=', 1)
        //         ->save();
        // dd($data);
        // $data = \App\ShopUserinfo::where('status', '=', $request->status);

        // $res = \App\ShopUserinfo::save($data);
        if ($data) {
            return view('Admin.user.index');
        } else {
            return view('Admin.user.status');

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
