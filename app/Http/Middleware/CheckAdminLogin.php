<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     * 中间件传参：￥parms绑定的值 ：值
     */
    public function handle($request, Closure $next)
    {
//        dump($parms);
//        dump($request);
       // echo 'zhonjianjian';
        if(!auth()->check()){
            return redirect(route('admin.login'))->withErrors(['error'=>'请登录']);
        }
        return $next($request);
    }
}
