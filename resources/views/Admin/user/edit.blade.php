@extends('Admin.layout.main')

@section('title', '修改用户')

@section('content')
<div class="route_bg">
    <a href="/admin/user/index">返回主页</a>
    -
    <span>修改用户</span>
</div>
<div class="div_from_aoto" style="width: 500px;">


    <form action="/admin/user/doedit" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$user->id}}">
        <div class="control-group">
            <label class="laber_from">用户名</label>
            <div class="controls">
            <input class="input_from" placeholder=" 请输入用户名" name="username" type="text" value="{{ $user->username }}">&nbsp;
                <span style="color:red">{{$errors->first('username')}}</span>
            <p class="help-block"></p>
            </div>
        </div>
        <div class="control-group">
            <label class="laber_from">邮箱</label>
            <div class="controls">
            <input class="input_from" placeholder=" 请输入邮箱" name="email" type="email" value="{{ $user->email }}">&nbsp;
                <span style="color:red">{{$errors->first('email')}}</span>
            <p class="help-block"></p>
            </div>
        </div>
        <div class="control-group">
            <label class="laber_from">手机号</label>
            <div class="controls">
            <input class="input_from" placeholder=" 请输入手机号" name="phone" value="{{ $user->phone }}" type="text">&nbsp;
                <span style="color:red">{{$errors->first('phone')}}</span>
            <p class="help-block"></p>
            </div>
        </div>
        <div class="control-group">
            <label class="laber_from">性别</label>
            <div class="controls">
                @if(($user->sex) == 0)
                <select name="sex" class="input_select">
                    <option value="0">女</option>
                    <option value="1">男</option>
                    <option value="2">保密</option> 
                </select>
                @elseif(($user->sex) == 1)
                <select name="sex" class="input_select">
                    <option value="1">男</option>
                    <option value="0">女</option>
                    <option value="2">保密</option> 
                </select>
                @else
                <select name="sex" class="input_select">
                    <option value="2">保密</option> 
                    <option value="1">男</option>
                    <option value="0">女</option>
                </select>
                @endif
            </div>
        </div>
        <div class="control-group">
            <label class="laber_from"></label>
            <div class="controls">
            <button id="btn" class="btn btn-success" style="width:120px;">确认</button>
            </div>
        </div>
    </form>
</div>
@endsection


