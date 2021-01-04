@extends('admin.common.main')



@section('cnt')

    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
        <span class="c-gray en">&gt;</span> 文章管理
        <span class="c-gray en">&gt;</span> 文章列表
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
            <i class="Hui-iconfont">&#xe68f;</i></a>
    </nav>
    {{--消息提示--}}

    @include('admin.common.msg')
    <div class="page-container">
        <form method="get" class="text-c"> 输入想要权限的角色：
            <input type="text" class="input-text" style="width:250px" placeholder="节点" value="{{request()->get('name')}}" name="name"  autocomplete="off">
            <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜节点</button>
        </form>
        <div class="cl pd-5 bg-1 bk-gray mt-20">
        <span class="l">

            <a href="{{route('admin.node.create')}}" class="btn btn-primary radius">
                <i class="Hui-iconfont">&#xe600;</i> 添加节点
            </a>
        </span>
        </div>
        <div class="mt-20">
            <table class="table table-border table-bordered table-hover table-bg table-sort">
                <thead>
                <tr class="text-c">

                    <th width="80">ID</th>
                    <th width="100">文章标题</th>


                    <th width="130">加入时间</th>
                    <th width="100">操作</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            {{--分页--}}

        </div>
    </div>
@endsection
@section('js')

    <!--请在下方写此页面业务相关的脚本-->

    <script>
        $('.table-sort').DataTable({
            columnDefs:[
                //索引第三列，不进行排序
                {targets:[3],orderable:false}
            ],
            //开启服务端分页
            serverSide:true
            //进行ajax请求
            ajax:{
                url:'{{'admin.article.index'}}',
                type:'get',
            }
        });

    </script>
@endsection
