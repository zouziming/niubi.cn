<?php

namespace App\Http\Middleware;

use Closure;

class MyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
         // 获取控制和操作方法的名字
        $action_full = $request->route()->getActionName();
        // 切割字符串切成数组
        $action_full_arr=explode('\\',$action_full);
        // dump($action_full_arr);
        // 弹出最后一个数组（控制器跟方法）
        $action_str=array_pop($action_full_arr);
        // dump($action_str);
        // 把控制器跟方法分割
        $action_arr=explode('@',$action_str);
        // dump($action_arr);

        // 获取控制器
        // $controller = $action_arr[0];
        // // 获取方法
        // $action = $action_arr[1];


        // $use_id=session('userInfo.id');
        $power_list=[];

        // 通过用户查权限
        /* $user_power=DB::table('shop_user_has_permissions')
        ->where('uid',$use_id)
        ->get();

        foreach($user_power as $power) {
            查询出对应的权限详情
            $power_tmp=DB::table('shop_permissions')
            ->where('id',$power->permission_id)
            ->first();
            $name_tmp=$power_tmp->controller.'@'.$power_tmp->action;

            //将权限保存到数组中
            $power_list[$name_tmp]=$name_tmp;
        }
        */


        /*
        //  通过角色查询权限
        //  通过id查用户拥有的角色
        $user_roles=DB::table('shop_user_has_roles')
            ->where('uid',$use_id)
            ->get();
            dump($user_roles);
            foreach($user_role as $role) {
                //通过角色查角色的权限
            $role_power=DB::table('shop_role_has_permissions')
                ->where('role_id',$role->role_id)
                ->get();

            // 通过获取到权限id去获取权限详情
            foreach($role_power as $power)
            {
            $power_tmp = DB::table('shop_permissions')
                ->where('id',$power->permission_id)
                ->first();

                $name_tmp = $power_tmp->controller .'@'.$power_tmp->action;
                $power_list[$name_tmp]=$name_tmp;
            }
        }
        */
        
        return $next($request);
    }
}
