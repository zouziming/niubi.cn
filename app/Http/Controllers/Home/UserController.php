<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\ShopUserinfo;
use Illuminate\Support\Facades\Hash;
use App\ShopAddres;


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

    // 收货地址页面
    public function addressIndex(Request $request)
    {
        $session=$request->session()->get('userInfo');
        dump($session);
        $user=ShopAddres::where('uid',$session['id'])->orderBy('status')->get();
        dump($user);
       return view('Home/user/udai',['data'=>$user]);
    }

    // 添加收货地址
    public function address(Request $request)
    {   
        $session=$request->session()->get('userInfo');
        $status=[];
        // dd(empty($request->status));
        if (!empty($request->status)) {
            $status=['status'=>$request->status];
        }

        if ($request->status==1) {
            ShopAddres::where('uid',$session['id'])->update(['status'=>2]);
        }
            // dd($status);
        // dd($request->all());
        $ist=ShopAddres::insert(
            ['uid'=>$session['id'],
            'address'=>$request->address,
            'consignee'=>$request->consignee,
            'phone'=>$request->phone,
            'add_id'=>$request->province.' '.$request->city.' '.$request->area,
            'status'=>$status['status'],
            'province'=>$request->province,
            'city'=>$request->city,
            'area'=>$request->area
                        ]);
        dump($ist);
        // dd($request->all());
    }

    // 修改收货地址页面
    public function addressEditIndex(Request $request)
    {
         $session=$request->session()->get('userInfo');
        // dump($session);
        $user=ShopAddres::where('uid',$session['id'])->orderBy('status')->get();
        $address=ShopAddres::where('id',$request->id)->first();

        return view('/Home/user/addressEdit',['data'=>$user,'id'=>$request->id,'edit'=>$address]);
    }


    public function addressEdit(Request $request)
            {  
                $user=ShopAddres::where('id',$request->id)->update(['address'=>$request->address,
                'consignee'=>$request->consignee,
                'phone'=>$request->phone,
                'add_id'=>$request->province.' '.$request->city.' '.$request->area,
                'province'=>$request->province,
                'city'=>$request->city,
                'area'=>$request->area
            ]);
                // dd($user);  
                if ($user) {
                    return redirect('/home/addressIndex');
                } else {
                    echo "<script>alert('修改失败');location.href='/home/addressIndex'</script>";
                }
        // dd($request->all());
    }


    public function delRess(Request $request)
    {
        $user=ShopAddres::where('id',$request->id)->delete();
        if ($user) {
             return redirect('/home/addressIndex');
        } else {
              echo "<script>alert('删除失败');location.href='/home/addressIndex'</script>";
        }
    }

    public function editDefault(Request $request)
    {   
          $session=$request->session()->get('userInfo');
        ShopAddres::where('uid',$session['id'])->update(['status'=>2]);
       $edit= ShopAddres::where('id',$request->id)->update(['status'=>1]);
        // dd($request->all());
       if ($edit) {
           # code...
            return redirect('/home/addressIndex');
                } else {
                    echo "<script>alert('修改失败');location.href='/home/addressIndex'</script>";
       }
    }
}
