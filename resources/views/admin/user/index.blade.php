
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/css/pagination.css "/>

    <title>用户列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
    <span class="c-gray en">&gt;</span> 用户中心
    <span class="c-gray en">&gt;</span> 用户列表
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
        <i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
{{--消息提示--}}
@include('admin.common.msg')
<div class="page-container">
    <div class="text-c"> 日期范围：
        <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
        -
        <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
        <input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name="">
        <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20">
        <span class="l">
            <a href="javascript:;" onclick="deleteAll()" class="btn btn-danger radius">
                <i class="Hui-iconfont">&#xe6e2;</i> 批量删除
            </a>
            <a href="{{route('admin.user.create')}}" onclick="member_add('添加用户','member-add.html','','510')" class="btn btn-primary radius">
                <i class="Hui-iconfont">&#xe600;</i> 添加用户
            </a>
        </span>
    </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="80">ID</th>
                <th width="100">真实名字</th>
                <th width="40">用户名</th>
                <th width="90">性别</th>
                <th width="150">手机</th>
                <th width="150">邮箱</th>
                <th width="130">加入时间</th>
                <th width="70">状态</th>
                <th width="100">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
            <tr class="text-c">

                 <td>
                     @if(auth()->id()!=$item->id)
                        <input type="checkbox" value="{{$item->id}}" name="id[]">
                     @endif
                 </td>

                <td>{{$item->id}}</td>
                <td>{{$item->username}}</td>
                <td>{{$item->truename}}</td>
                <td>{{$item->gender}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->email}}</td>

                <td>{{$item->created_at}}</td>
                <td class="td-status"><span class="label label-success radius">已启用</span></td>
                <td class="td-manage">
                    @if(auth()->id()!=$item->id)
                        @if($item->deleted_at != null)
                            <a href="{{route('admin.user.restore',['id'=>$item->id])}}" class="label label-waring radius ">还原</a>
                            @else
                        <a href="{{route('admin.user.del',['id'=>$item->id])}}" class="label label-success radius delbtn">删除</a>
                        @endif
                    @endif
                    <a href="{{ route('admin.user.edit',$item) }}" class="label label-danger radius">修改</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{--分页--}}
        {{$data->links()}}
    </div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/admin/lib/laypage/1.2/laypage.js"></script>
<script>
    //生成touken
    const _token="{{csrf_token()}}";
    //给删除按钮绑定事件
    $('.delbtn').click(function(evt){
        //得到URL请求地址
        let url=$(this).attr('href');
        //发起delete请求
        $.ajax({
            url,
            data:{_token},
            type:'DELETE',
            dataType:'json'
        }).then(({status,msg})=>{  //为后台返回的值
            if(status==0){

                //提示插件
                layer.msg(msg,{time:2000,icon:2},()=>{
                    //删除当前行
                    $(this).parents('tr').remove();

                });
            }

        });
        //jquer取消默认事件

        return false;
    })
    //全选删除
    // function deleteAll(){
    //     let ids=$('input[name="id[]"]');
    //     console.log(ids);
    // }
</script>
</body>
</html>
