
<html>
<head>
    <meta charset="UTF-8">

    <title>Document</title>
</head>
<body>
@if($errors->any())
    <div class="Huialert Huialert-error"><i class="Hui-iconfont">&#xe6a;</i>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </div>
@endif
<form action="{{route('admin.user.role',$user)}} "method="post">
    @csrf
    @foreach($roleAll as $item)
        <div>
            <label>{{$item->name}}
                <input type="radio" name="role_id" value="{{$item->id}}"
                       @if($item->id == $user->role_id) checked @endif

                >
            </label>
        </div>


    @endforeach
    <button type="submit">给用户指定角色</button>
</form>

</body>
</html>
