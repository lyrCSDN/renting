<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Hash;

class LoginController extends Controller
{   //构造方法
//    public function __construct()
//    {
//        $this->middleware(['checkAdmin:login']);
//    }

    public function index(){
        if(auth()->check()){
            return redirect(route('admin.index'));
        }
      return view('admin.login.login');
    }
    public function login(Request $request){
//        $validate=$request->validate([
//            'username'=>'required',
//            'password'=>'required'
//        ]);
//        $sc=Hash::make('admin888');
//        dd($sc);

        $post=$request->except(['_token']);
       //$post= $request->all();
       $post=auth()->attempt($post);
        //$post=auth()->attempt($post['password']);
      // dd($post);


       if($post){
//           $model=auth()->user();
//           dump($model->toArray());
           return redirect(route('admin.index'));
       }
       return redirect(route('admin.login'))->withErrors(['error'=>'登陆失败']);
    }
}
