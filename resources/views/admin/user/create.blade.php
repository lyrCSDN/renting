@extends('admin.common.main')

@section('cnt')
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
        <span class="c-gray en">&gt;</span> 用户中心
        <span class="c-gray en">&gt;</span> 添加用户
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
            <i class="Hui-iconfont">&#xe68f;</i></a>
    </nav>
    <article class="page-container">
        @if($errors->any())
            <div class="Huialert Huialert-error"><i class="Hui-iconfont">&#xe6a;</i>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
        @endif
        <form action="{{route('admin.user.store')}}" method="post" class="form form-horizontal" id="form-member-add">
            @csrf
            <div class="row cl">
                <label class="form-labrel col-xs-4 col-sm-3"><span class="c-red">*</span>姓名：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text"  name="truename" value="{{old('truename')}}">
                </div>
            </div>
            <div class="row cl">
                <label class="form-labrel col-xs-4 col-sm-3"><span class="c-red">*</span>账号：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text"  name="username" value="{{old('username')}}">
                </div>
            </div>
            <div class="row cl">
                <label class="form-labrel col-xs-4 col-sm-3"><span class="c-red">*</span>密码：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text"  name="password" id="password" autocomplete="off">
                </div>
            </div>
            <div class="row cl">
                <label class="form-labrel col-xs-4 col-sm-3"><span class="c-red">*</span>确认密码：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text"  name="password_confirmation" value="{{old('password_confirmation')}}">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    <div class="radio-box">
                        <input name="gender" type="radio"  value="先生" checked>
                        <label for="sex-1">先生</label>
                    </div>
                    <div class="radio-box">
                        <input type="radio" value="女士" name="gender">
                        <label for="sex-2">女士</label>
                    </div>

                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text"  name="phone" value="{{old('phone')}}">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="email" class="input-text" name="email" id="email" value="{{old('email')}}">
                </div>
            </div>



            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                    <input class="btn btn-primary radius" type="submit" value="添加用户">
                </div>
            </div>
        </form>
    </article>
@endsection
@section('js')
    <script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
    <script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
    <script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
    <script>
        //单选框样式
        // $('.skin-minimal input').iCheck({
        //     checkboxClass: 'icheckbox-blue',
        //     radioClass: 'iradio-blue',
        //     increaseArea: '20%'
        // });
        // //前段表单验证
        // $("#form-member-add").validate({
        //     rules:{
        //         truename:{
        //             required:true
        //         },
        //         password:{
        //             required:true
        //         },
        //         confirmation_password:{
        //             equalTo:'#password'
        //
        //         },
        //         phone:{
        //             phone:true
        //
        //         }
        //
        //     },
        //     messages:{
        //         truename:{
        //             required:'真实名字必须得填写'
        //         }
        //
        //     }
        //     ,
        //     onkeyup:false,
        //     success:"valid",
        //     //验证通过后的处理方法 form dom对象
        //     submitHandler:function(form){
        //        //表单提交
        //         form.submit();
        //
        //
        //     }
        // });
        // //自定义验证规则
        // jQuery.validator.addMethod('phone',function(value,element){
        //     var reg =/^(\+86-)?1[3-9]\d{9}$/;
        //     return this.optional(element)||(reg.test(value));
        // },"请输入正确的手机号码");
    </script>
@endsection


