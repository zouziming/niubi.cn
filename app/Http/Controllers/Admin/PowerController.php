<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ShopRole;
use App\shopRoleHasPermission;
use App\ShopPermission;
use Illuminate\Support\Facades\DB;
use App\shopUserHasRole;

class PowerController extends Controller
{
    public function index()
    {
    	$model=new \App\ShopPermission;
    	$data=$model->get();
    	return view('Admin/power/power',['data'=>$data]);
    }

    public function del(Request $request)
    {
    	$model=new \App\ShopPermission;
    	// $data
    	$del=$model->where('id','=',$request->id)->delete();
    	dump($del);
    	if ($del) {
                 echo "<script>alert('删除成功');location.href='/admin/power'</script>";
            } else {
                echo "<script>alert('删除失败');location.href='/admin/power'</script>";
            }
    }


    public function add()
    {
    	return view('Admin/power/add');
    }

    public function addPower(Request $request)
    {
    	$data['name']=$request->name;
    	$data['descr']=$request->descr;
    	$data['controller']=$request->controller;
    	$data['action']=$request->action;
    	dump($data);
    	$model=new \App\ShopPermission;
    	$add=$model->insert($data);
    	dump($add);
     if ($add) {
            return redirect('/admin/power');
            
        }
    	// dump($request->all());
    }

    public function edit(Request $request)
    {	
    	$model=new \App\ShopPermission;
    	$data=$model->where('id','=',$request->id)->first();
    	// dump($data);
    	return view('Admin/power/edit',['data'=>$data]);
    }


    public function editPower(Request $request)
    {
    	$data['name']=$request->name;
    	$data['descr']=$request->descr;
    	$data['controller']=$request->controller;
    	$data['action']=$request->action;
    	// dump($data,$request->id);
    	$model=new \App\ShopPermission;
    	$edit=$model->where('id','=',$request->id)->update($data);
    	if ($edit) {
    		return redirect('/admin/power');
    	} else {
    		 echo "<script>alert('修改失败');location.href='/admin/power'</script>";
    	}


    }
    	public function role()
    	{
    		$model=new \App\ShopRole;
    		$data=$model->get();
    		 return view('Admin/power/role',['data'=>$data]);
    	}

    	public function roleIndex()
    	{
            $power=ShopPermission::all();
            dump($power);
    		return view('/Admin/power/addRole',['power'=>$power]);
    		// return 123;
    	}

        public function roleAdd(Request $request)
        {
            // dump($request->all());
            // dump($request->input('permission_id'));exit; 
                $this->validate($request, [
            'name' => 'required',
            
        ],[
            'required'=>':attribute 必须要填写',
        ],[
            'name'=>'名字',
            
        ]);

            $data['name']=$request->name;
            $model=new \App\ShopRole;
            $add=$model->insertGetId ($data);
          

            // exit;

            // dump($add);
            if ($add) {
            $input=$request->input('permission_id');
            foreach ($input as $key => $value) {
                $addRolePower=shopRoleHasPermission::insert(['role_id'=>$add,'permission_id'=>$value]);
                // dump($addRolePower);
            }
                 return redirect('/admin/power/role');
            } else{
                 echo "<script>alert('修改失败');location.href='/admin/power/role'</script>";
            }
                
        }

        public function roleDel(Request $request)
        {
           // $model = new \App\shopRoleHasPermission;
            // $model=new \App\ShopRole;
            DB::beginTransaction();
            $data=ShopRole::find($request->id);
            // ->shopRoleHasPermission;

            $userRole=$data->shopUserHasRole()->first();
            // 判断是否有用户使用该角色
            if ($userRole) {
                echo "<script>alert('有用户拥有改角色，请先设置该用户的角色');location.href='/admin/power/role'</script>";
            } else {
            // dump($userRole);exit;

            $delM=$data->shopRoleHasPermission()->delete();
            $del=$data->delete();

            if ($del) {
               DB::commit();
                 return redirect('/admin/power/role')->with('status', '删除成功!');
            } else{
                DB::rollBack();
               return redirect('/admin/power/role')->with('status', '删除数据失败!');
            }

        }
            // dump($delM);
            // dump($del);
         
           // $aa=$model->shopRoleHasPermission()->where('id', 1)->get();
            // dump($model->get());
            // dump($data);
        }

        public function roleEdit(Request $request)
        { 
            $data=ShopRole::find($request->id);

            // dump($data);
            
            $delM=$data->shopRoleHasPermission()->get();
            // $delM->contains('')
            $qx=ShopPermission::all();
            // dump($qx);
            // dump($delM);

            $jsqx=shopRoleHasPermission::where('role_id','=',$request->id)->get();
            foreach ($jsqx as $key => $value) {
                $arr[]=($value->permission_id);
            }
            // dump($arr);

            // $collection = collect(['name' => 'Desk', 'price' => 100]);
            // dump($collection->contains('name'));
            // dump($delM);

            // foreach ($qx as $key => $value) {
            //     // dump($delM->contains($value));
            //     // dump($value->id);
            //     dump(in_array($value->id, $arr));
            // }
            
            // dump($arr);
            return view('/Admin/power/roleEdit',compact('data','arr','qx'));
        }

        public function editRole(Request $request)
        {
            $role=ShopRole::find($request->role_id);
            // dump($request->name);exit;
            // 修改name
            $roleName=ShopRole::where('id','=',$request->id)->update(['name'=>$request->name]);
            // dump($roleName);
            $aa=$role->shopRoleHasPermission;
            $requests=$request->except('_token');
            foreach ($aa as $key => $value) {
                $data['permission_id'][]=$value->permission_id;
            }
        
            $my_privileges =  ShopPermission::findMany($data['permission_id']);//找这个角色拥有的权限
            
            $privileges = ShopPermission::findMany($requests['permission_id']);//查找选中的权限
         
         //查找这个角色没有 选中的多选框的权限
        $addPrivileges = $privileges->diff($my_privileges);
           foreach ($addPrivileges as $key => $value) {
                $add=shopRoleHasPermission::insert(['role_id' => $request->role_id,'permission_id'=>$value->id]);
               
           }
          
        // 查找选中的权限 没有这个角色的权限
        $delePrivileges = $my_privileges->diff($privileges);
            foreach ($delePrivileges as $value) {
            $del=shopRoleHasPermission::where('permission_id','=',$value->id)->delete();
           
        }
       return redirect('/admin/power/role');

        }

        public function userRole()
        {
            // $data=shopUserHasRole::all();

           $data= DB::table('shop_user_has_roles')
           		->select(['*','shop_user_has_roles.id as aid',
           				  // 'shop_users.id as userid' ,	
           				  // 'shop_users.name as username',
           				  // 'shop_roles.id as roleid',
           				  // 'shop_roles.name as rolename',
           	])
           		->join('shop_users','shop_user_has_roles.uid','=','shop_users.id')
                ->join('shop_roles','shop_user_has_roles.role_id','=','shop_roles.id')
           		// ->where('shop_user_has_roles.id','=',$request->id)
                ->get();
            dump($data);
            return view('/Admin/power/userRole',['data'=>$data]);
        }


        // 删除管理员
        public function userRoleDel(Request $request)
        {

            $del=shopUserHasRole::where('id','=',$request->id)->delete();
            if ($del) {
             return redirect('/admin/power/userRole')->with('status', '删除成功!');
            } else{
               return redirect('/admin/power/userRole')->with('status', '删除数据失败!');
            }
            // $req=$request->all();
            // dump($req);
        }

        // 用户角色添加列表
        public function userRoleAdd()
        {
            $role=ShopRole::get();
            dump($role);
            return view('/Admin/power/userRoleAdd',['data'=>$role]);

        }

        // 用户角色添加
        public function addUserRole(Request $request)
        {

                   $this->validate($request, [
            
            'username'=>'required',
            'password'=>'required',
        ],[
            'required'=>':attribute 必须要填写',
        ],[
            'username'=>'用户名',
            'password'=>'密码',
        ]);
            dump($request->all());

            $adduser=DB::table('shop_users')->insertGetId(['username'=>$request->username,'password'=>$request->password]);
            if ($adduser) {
            	$userRole=shopUserHasRole::insert(['uid'=>$adduser,'role_id'=>$request->role_id]);
            	return redirect('/admin/power/userRole');
            } else {
            	echo "<script>alert('添加失败');location.href='/admin/power/userRole'</script>";
            }
            // $add=shopUserHasRole::insert(['role_id'=>$request->role_id,'uid'=>$request->uid]);
            // dump($add);
            // if ($) {
            //     # code...
            // }
        }

        // 修改用户角色列表
        public function userRoleEdit(Request $request)
        {
            $role=ShopRole::where('id','=',$request->role_id)->first();
            $data=ShopRole::get();
            dump($role->id);
            dump($data);
            return view('/Admin/power/userRoleEdit',['data'=>$data,'role'=>$role,'uid'=>$request->uid,'id'=>$request->id]);
        }

        // 修改用户角色
        public function editUserRole(Request $request)
        {
            $edit=shopUserHasRole::where('id','=',$request->id)->update(['role_id'=>$request->role_id]);
            if ($edit) {

             return redirect('/admin/power/userRole');
            } else{
                 echo "<script>alert('修改失败');location.href='/admin/power/userRole'</script>";
            }
                
            dump($edit);
            dump($request->all());	

           // $data= DB::table('shop_user_has_roles')
           //      ->join('shop_roles','shop_user_has_roles.role_id','=','shop_roles.id')
           // 		->where('shop_user_has_roles.id','=',$request->id)
           //      ->get();
           //      dump($data);
        }

}
