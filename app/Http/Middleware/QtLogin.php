<?php

namespace App\Http\Middleware;

use Closure;

class QtLogin
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
        // 验证用户是否登录
        // 如果没有登录则跳转到登录页面
        $status = $request->session()->has('qtLogin');

        if ($status) {
            //已经登录了，继续下一步
            return $next($request);
        } 
        // else {
        //     //没有登录，跳到登录页面
        //     return redirect('/home/login');
        // }

        return $next($request);
    }
}
