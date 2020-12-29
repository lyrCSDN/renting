<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        //自定义验证规则
        //参数1 规则名
        Validator::extend('phone',function ($attribute,$value,$parameters,$validator){
            $reg1='/^\+86-1[3-9]\d{9}$/';
            $reg2='/^1[3-9]\d{9}$/';
            return preg_match($reg1,$value) || preg_match($reg2,$value);
        });
    }
}
