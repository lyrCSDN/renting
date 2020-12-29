<?php

namespace App\Models;


class Node extends Base
{
    //修改器  route_name RouteName set字段名 Attribute 字段首字母大写，遇下划线后首字母大写
    public  function setRouteNameAttribute($value)
    {
        //数据库的字段设置不能为空时 就可以使用修改器  修改和添加时生效 create 或Update
        $this->attributes['route_name']=empty($value)?'':$value;
    }
    //访问器 menu  Menu
    public function getMenuAttribute(){
      if( $this->is_menu){
          return '<span class=" label label-success radius">是</span>';
      }
        return '<span class=" label label-danger radius">否</span>';
    }
    //获取全部数据
    public function getAllList(){
        $data=self::get()->toArray();
       return $this->treeLevel($data);

    }
}
