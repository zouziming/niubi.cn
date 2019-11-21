@extends('Admin.layout.main')

@section('title', '修改密码')

@section('content')
<div class="route_bg">
    <a href="/admin">返回主页</a>
    -
    <span>修改密码</span>
</div>
<div class="div_from_aoto" style="width: 500px;">
    <div class="alert alert-danger" id="errors" style="display: none" role="alert">
    </div>
    
    @if(count($errors) > 0)
        <div class="alert alert-info col-md-7 col-md-offset-12 " role="alert" style="    margin-left: 161px;">
            <ul>
                @foreach($errors->all() as $e)
                <li style="color:red">{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/admin/editpwd" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="control-group">
            <label class="laber_from">用户名</label>
            <div class="controls">
            <input class="input_from" placeholder="" name="username" type="text" value="{{ $user->username }}" readonly>
            <p class="help-block"></p>
            </div>
        </div>
        <div class="control-group">
            <label class="laber_from">原密码</label>
            <div class="controls">
            <input class="input_from" placeholder=" 原密码" name="oldpassword" type="password" value="">
            <p class="help-block"></p>
            </div>
        </div>
        <div class="control-group">
            <label class="laber_from">新密码</label>
            <div class="controls">
            <input class="input_from" type="password" placeholder=" 新密码" name="password" value="">
            <p class="help-block"></p>
            </div>
        </div>
        <div class="control-group">
            <label class="laber_from">确认密码</label>
            <div class="controls">
            <input id="password-confirm" class="input_from" placeholder=" 确认密码" name="password_confirmation" value="" type="password">
            <p class="help-block"></p>
            </div>
        </div>
        <div class="control-group">
            <label class="laber_from"></label>
            <div class="controls">
            <button id="btn" class="btn btn-success" style="width:120px;">确认修改</button>
            </div>
        </div>
    </form>
</div>
@endsection


