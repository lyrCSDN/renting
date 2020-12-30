@extends('admin.common.main')

@section('cnt')
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
        <span class="c-gray en">&gt;</span> 用户中心
        <span class="c-gray en">&gt;</span> 给角色分配权限
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
            <i class="Hui-iconfont">&#xe68f;</i></a>
    </nav>
    <article class="page-container">

        <form action="{{route('admin.role.node',$role)}}" method="post" class="form form-horizontal" id="form-member-add">
            @csrf
{{--            @method('put')--}}
            @foreach($nodeall as $item)
                <div>
                <input type="checkbox" name="node[]" value="{{$item['id']}}"
                       @if(in_array($item['id'],$nodes)) checked @endif
                >
                {{$item['html']}}  {{$item['name']}}
                </div>
            @endforeach


      <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                    <input class="btn btn-primary radius" type="submit" value="修改角色">
                </div>
            </div>
        </form>
    </article>
@endsection
@section('js')
    <script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
    <script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
    <script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>

@endsection


