@extends('Home.layout.mycenter')

@section('title', '个人信息')

@section('content')
<div class="member-right fr">
<div class="member-head">
    <div class="member-heels fl"><h2>修改密码</h2></div>
</div>
<div class="member-border" style="background:url(/lib/img/55.jpg) no-repeat center  0;background-size:100% 100%;">
    
<div class="main-wrap" style="margin-left: 120px;margin-top: 65px;">
    @if(count($errors) > 0)
        <div class="alert alert-info col-md-7 col-md-offset-12 " role="alert" style="    margin-left: 161px;">
            <ul>
                @foreach($errors->all() as $e)
                <li style="color:red">{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form class="am-form am-form-horizontal" action="/home/user/password" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ session('userInfo.id') }}">
    <div class="am-form-group">
        <label for="user-old-password" class="am-form-label">原密码</label>
        <div class="am-form-content">
        <input type="password" id="user-old-password" placeholder="请输入原登录密码" name="oldpassword" style="border:1px solid red;height:25px;width:230px">
        </div>
    </div>
    <div class="am-form-group">
        <label for="user-new-password" class="am-form-label">新密码</label>
        <div class="am-form-content">
        <input type="password" id="user-new-password" placeholder="由数字、字母组合" name="password" style="border:1px solid red;height:25px;width:230px">
        </div>
    </div>
    <div class="am-form-group">
        <label for="user-confirm-password" class="am-form-label">确认密码</label>
        <div class="am-form-content">
        <input type="password" id="user-confirm-password" placeholder="请再次输入上面的密码" name="password_confirmation" style="border:1px solid red;height:25px;width:230px">
        </div>
    </div>
    <div class="info-btn">
        <div class="am-btn am-btn-danger">
        <button style="border:0px;background:#dd514c;height:28px;width:81px">保存修改</button></div>
    </div>
</form>
</div>
    <div class="am-form-group"></div>
    <div class="am-form-group"></div>
    <div class="am-form-group"></div>
</div>
</div>
@endsection

