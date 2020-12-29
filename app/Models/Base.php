<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Base extends Model
{
    //软删除
    use SoftDeletes;
    protected $dates=['deleted_at'];
    // 设置添加时的黑名单
    protected $guarded=[];
    public function treeLevel(array $data, int $pid = 0, string $html = '--', int $level = 0) {
        static $arr = [];
        foreach ($data as $val) {
            if ($pid == $val['pid']) {
                // 重复一个字符多少次
                $val['html'] = str_repeat($html, $level * 2);
                $val['level'] = $level + 1;
                $arr[] = $val;
                $this->treeLevel($data, $val['id'], $html, $val['level']);
            }
        }
        return $arr;
    }
}
