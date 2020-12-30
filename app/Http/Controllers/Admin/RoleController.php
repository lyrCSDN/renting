<?php

namespace App\Http\Controllers\Admin;




use App\Models\Node;
use App\Models\Role;
use Illuminate\Http\Request;



class RoleController extends BsesController
{
    //列表
    public function index(Request $request)
    {
        // 获取搜索框
        $name=$request->get('name');
        //分页带搜索                            匿名函数引用外部变量得用use
        //参数一 变量值存在 则执行参数2 --》匿名函数
        $data=Role::when($name,function ($query) use ($name){
            $query->where('name','like',"%{$name}%");

        })->paginate($this->pagesize);


        //分页

        return view('admin.role.index',compact('data'));
    }

   //添加显示
    public function create()
    {
        return view('admin.role.create');
    }

    //添加处理
    public function store(Request $request)
    {
        //异常处理
        try {
            $this->validate($request,[
                'name'=>'required|unique:roles,name'  //role 表的name 字段
            ]);

        }catch(\Exception $e){
            return ['status'=>1000,'msg'=>'验证不通过'];

        }
        Role::create($request->only('name'));

        return ['status'=>0,'msg'=>'添加成功'];




    }

    //根据ID显示对应信息
    public function show($id)
    {
        //
    }

    //修改显示
    public function edit( int $id)
    {
        //
        $model=Role::find($id);
        return view('admin.role.edit',compact('model'));
    }

   //修改处理
    public function update(Request $request,int  $id)
    {
        //异常处理
        try {
            $this->validate($request,[
                //unique :表名 唯一字段，【排除行的值，以哪个字段来排除】
                'name'=>'required|unique:roles,name,'.$id.',id' //role 表的name 字段  排除id=变量 那行的name字段值
            ]);

        }catch(\Exception $e){
            return ['status'=>1000,'msg'=>'验证不通过'];

        }
        //修改角色入库
       Role::where('id',$id)->update($request->only(['name']));
        return ['status'=>0,'msg'=>'修改用户成功'];
    }
    //给角色分配权限
    public function node(Role $role){
        //dump($role->nodes->toArray());
        //dump($role->nodes()->pluck('name','id')->toArray());
        //读出所有权限
        $nodeall=(new Node())->getAllList();
        //读取当前角色所拥有的权限
        $nodes=$role->nodes()->pluck('name','id')->toArray();
        return view('admin.role.node',compact('role','nodeall','nodes'));
    }

    //分配处理
    public function nodeSave(Request $request,Role $role){
        $role->nodes()->sync($request->get('node'));
        return redirect(route('admin.role.index',$role));

    }

    //删除操作
    public function destroy($id)
    {
        //
    }
}
