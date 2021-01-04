<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Node;
class indexController extends Controller
{
    public function index(){
        //读取菜单
//        $menudata=Node::where('is_menu','1')->get()->toArray();
//        dump($menudata);
        return view('admin.index.index');
    }
    public function welcome(){
        return view('admin.index.welcome');
    }
    public  function logout(){
         auth()->logout();
         return redirect(route('admin.login'))->with('success','请重新登录');
    }
}
