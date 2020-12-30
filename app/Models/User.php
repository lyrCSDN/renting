<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as AuthUser;
//软删除类
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends AuthUser
{
    //调用trait
    use SoftDeletes;
    //软删除标识字段
    protected $dates=['deleted_at'];
    //拒绝不添加的字段
    protected $guarded=[];
    protected $hidden=['password'];
    //角色
    public function role(){
        return $this->belongsTo(Role::class,'role_id',);
    }

}
