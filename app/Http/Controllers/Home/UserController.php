<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\ShopUserinfo;
use Illuminate\Support\Facades\Hash;
use App\ShopAddres;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
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

    // 收货地址页面
    public function addressIndex(Request $request)
    {
        $session=$request->session()->get('userInfo');
        
        $user=ShopAddres::where('uid',$session['id'])->orderBy('status')->get();
        
       return view('Home/user/udai',['data'=>$user]);
    }

    // 添加收货地址
    public function address(Request $request)
    {   
        
        $session=$request->session()->get('userInfo');
        $status=[];
     
        if (!empty($request->status)) {
            $status=['status'=>$request->status];
        }

        if ($request->status==1) {
            ShopAddres::where('uid',$session['id'])->update(['status'=>2]);
        }

        if ($request->address==null || $request->address==null || $request->phone == null) {

           return ['msg'=>'添加失败，有输入框为空']; 
        } 
        	$check = '/^(1(([35789][0-9])|(47)))\d{8}$/';
        if (preg_match($check, $request->phone)) {
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
       
	        if ($ist) {
	            return ['code'=>0,'msg'=>'添加成功'];
	        } else {
	            return ['msg'=>'添加失败'];
	        }
        } else {
        	return ['msg'=>'手机号码格式不对'];
        	
        }

    }

    // 修改收货地址页面
    public function addressEditIndex(Request $request)
    {
        $address=ShopAddres::where('id',$request->id)->first();
        if ($address==null) {
            return redirect('/home/addressIndex');
        }
         $session=$request->session()->get('userInfo');
     
        $user=ShopAddres::where('uid',$session['id'])->orderBy('status')->get();

        return view('/Home/user/addressEdit',['data'=>$user,'id'=>$request->id,'edit'=>$address]);
    }


    public function addressEdit(Request $request)
            {  
                $this->validate($request, [
            'consignee'=>'required',
            'phone'=>'required | regex:/^1[345789][0-9]{9}$/',
            'address'=>'required',
        ],[
            'required'=>':attribute 不能为空',
            'regex'=>'手机号格式不对',
        ],[
            'address'=>'详细地址',
            'consignee'=>'收件人',
            'phone'=>'手机号',
        ]);

                $user=ShopAddres::where('id',$request->id)->update(['address'=>$request->address,
                'consignee'=>$request->consignee,
                'phone'=>$request->phone,
                'add_id'=>$request->province.' '.$request->city.' '.$request->area,
                'province'=>$request->province,
                'city'=>$request->city,
                'area'=>$request->area
            ]);
         
                if ($user) {
                    return redirect('/home/addressIndex');
                } else {
                    echo "<script>alert('修改失败');location.href='/home/addressIndex'</script>";
                }
    }


    public function delRess(Request $request)
    {
        $user=ShopAddres::where('id',$request->id)->delete();
        // if ($user) {
        //      return redirect('/home/addressIndex');
        // } else {
        //       echo "<script>alert('删除失败');location.href='/home/addressIndex'</script>";
        // }

        if ($user) {
            return ['code'=>0,'msg'=>'删除成功'];
        } else {
            return ['msg'=>’];
        }

    }

    public function editDefault(Request $request)
    {   
          $session=$request->session()->get('userInfo');
        ShopAddres::where('uid',$session['id'])->update(['status'=>2]);
       $edit= ShopAddres::where('id',$request->id)->update(['status'=>1]);

       // if ($edit) {
       //      return redirect('/home/addressIndex');
       //          } else {
       //              echo "<script>alert('修改失败');location.href='/home/addressIndex'</script>";
       // }


       if ($edit) {
           return ['code'=>0,'msg'=>'成功'];
       } else {
            return ['code'=>1,'msg'=>'失败'];
       }
    }


    // 修改个人资料
    public function edit(Request $request)
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
