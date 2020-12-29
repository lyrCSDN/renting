<?php

namespace App\Http\Controllers\Admin;

use App\Models\Node;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *节点列表
     */
    public function index()
    {
        //$model=new Node;
       // dd($model->getAllList());
        //获取所有节点
        $data=(new Node)->getAllList();
       return view('admin.node.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //获取所有的顶级
        $data=Node::where('pid',0)->get();
        return view('admin.node.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param
     *  添加处理
     */
    public function store(Request $request)
    {
       //表单验证
//        try {
//
//        }catch (\Exception $e){
//            return ['err'=>'添加失败'];
//        }
        //入库

        Node::create($request->except('_token'));
        return ['status'=>0,'msg'=>'添加权限成功'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function show(Node $node)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function edit(Node $node)
    {




        return view('admin.node.edit',compact('node'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Node $node)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function destroy(Node $node)
    {
        //
    }
}
