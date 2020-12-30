<?php
//后天用户管理
namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
//验证加密的明文是否对应的
use Hash;
class UserController extends BsesController
{

    //用户列表
    public function index(){

        $data=User::orderBy('id','asc')->withTrashed()->paginate($this->pagesize);
        return view('admin.user.index',compact('data'));
    }
    //添加显示
    public function create(){
        return view('admin.user.create');
    }
    //添加处理
    public  function store(Request $request) {
        $this->validate($request,[
            //用户名唯一性
            'username'=>'required|unique:users,username',
            'truename'=>'required',
            //俩次密码是否一致
            'password'=>'required|confirmed',
            //自定义验证规则
            'phone'=>'required|phone',
        ]);
       //添加用户入库
        $request['password']=bcrypt($request['password']);
        $user=User::create($request->except(['_token','password_confirmation']));

        //发邮件给用户


        //跳转到列表页
        return redirect(route('admin.user.index'))->with('success','添加用户成功');

    }
    public function del(int $id){
        //软删除
        User::find($id)->delete();
        //强制删除
        //User::find($id)->forceDelete();
       return ['status'=>0,'msg'=>'删除成功'];

    }
    //还原用户
    public function restore(int $id){
        User::onlyTrashed()->where('id',$id)->restore();
        return redirect(route('admin.user.index'))->with('success','还原用户成功');
    }
    //修改用户显示
    public function edit(int $id){


        $model=User::find($id);


        return view('admin.user.edit',compact('model'));
    }
    //修改用户
    public function update(Request $request,int $id){
        $model=User::find($id);
        //原密码  明文
        $spass= $request->get('spassword');
       //原密码 密文
        $oldpass=$model->password;
           // 检查明文和密码是否一致
        $bool=Hash::check($spass,$oldpass);


       if($bool){
           //修改
           $data=$request->only([
              'truename',
               'password',
               'gender',
               'phone',

           ]);
           if(!empty($data['password'])){
               $data['password']=bcrypt($data['password']);
           }else{
               unset($data['password']);
           }

           $model->update($data);
           return redirect(route('admin.user.index'))->with(['success'=>'修改用户成功']);
       }
       return redirect(route('admin.user.edit',$model))->withErrors(['error'=>'原密码不正确']);

    }
    //分配角色和处理
    public function role(Request $request,User $user){
        //判断是否post提交
        if($request->isMethod('post')) {
//            dump($request->all());
//        exit();
            $post = $this->validate($request, [

                'role_id' => 'required'
            ], ['role_id.required' => '必须勾选']);
            $user->update($post);
            return redirect(route('admin.user.index'));
        }




        //读取所有角色
        $roleAll=Role::all();
        return view('admin.user.role',compact('user','roleAll'));
    }
}
