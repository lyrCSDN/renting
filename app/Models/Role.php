<?php

namespace App\Models;


class Role extends Base
{
    //角色与权限多对多
    public function  nodes(){
        //参数1关联模型
        //参2 中间表名没有前缀
        //参3 本模型对应的外检ID
        //参4 关联模型对应外检ID
         return $this->belongsToMany(Node::class,'role_node','role_id','node_id');
    }
}
