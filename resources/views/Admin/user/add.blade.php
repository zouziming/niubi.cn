@extends('Admin.layout.main')

@section('title', '添加用户')

@section('content')
<div class="route_bg">
    <a href="/admin/user/index">返回主页</a>
    -
    <span>添加用户</span>
</div>
<div class="div_from_aoto" style="width: 500px;">

    <div class="alert alert-danger" id="errors" style="display: none;width: 300px;margin-left: 50px;" role="alert">
    </div>

    <form action="" method="POST">
        <div class="control-group">
            <label class="laber_from">用户名</label>
            <div class="controls"><input class="input_from" placeholder=" 请输入用户名" name="username" type="text"><p class="help-block"></p></div>
        </div>

        <div class="control-group">
            <label class="laber_from">密码</label>
            <div class="controls"><input class="input_from" placeholder=" 请输入密码" name="password" type="password"><p class="help-block"></p></div>
        </div>
        <div class="control-group">
            <label class="laber_from">确认密码</label>
            <div class="controls"><input class="input_from" placeholder=" 请输确认密码" name="password_confirmation" type="password"><p class="help-block"></p></div>
        </div>

        <div class="control-group">
            <label class="laber_from">头像</label>
            <div class="controls"><input class="input_from file" placeholder=" 请选择头像" name="pic" type="file"><p class="help-block"></p></div>
        </div>
        <div class="control-group">
            <label class="laber_from">邮箱</label>
            <div class="controls"><input class="input_from" placeholder=" 请输入邮箱" name="email" type="email"><p class="help-block"></p></div>
        </div>
        <div class="control-group">
            <label class="laber_from">手机号</label>
            <div class="controls"><input class="input_from" placeholder=" 请输入手机号" name="phone" type="text"><p class="help-block"></p></div>
        </div>
        <div class="control-group">
            <label class="laber_from">性别</label>
            <div class="controls">
                <select name="sex" class="input_select">
                    <option value="1">男</option>
                    <option value="0">女</option>
                    <option value="2">保密</option> 
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="laber_from">状态</label>
            <div class="controls">
                <select name="status" class="input_select">
                    <option value="1">正常</option>
                    <option value="2">禁用</option>
                </select>
            </div>
        </div>
    </form>
        <div class="control-group">
            <label class="laber_from"></label>
            <div class="controls">
            <button id="btn" class="btn btn-success" style="width:120px;">确认</button>
            </div>
        </div>
</div>
@endsection

@section('script')
<script>
    $('#btn').click(function(){

        var username = $('input[name=username]').val();
        var password = $('input[name=password]').val();
        var password_confirmation = $('input[name=password_confirmation]').val();
        var file = $('input[name=pic]').get(0).files[0];
        var email = $('input[name=email]').val();
        var phone = $('input[name=phone]').val();
        var sex = $('select[name=sex]').val();
        var status = $('select[name=status]').val();

        var fd = new FormData();
        fd.append('username', username);
        fd.append('password', password);
        fd.append('password_confirmation', password_confirmation);
        fd.append('pic', file);
        fd.append('email', email);
        fd.append('phone', phone);
        fd.append('sex', sex);
        fd.append('status', status);
        fd.append('_token', '{{csrf_token()}}');

        $.ajax({
            type: 'post',
            url: '/admin/user/add',
            processData: false,
            contentType: false,
            data: fd,
            success: function (res) {
                if (res.code == 0) {
                    alert(res.msg);
                    location.href = "/admin/user/index"
                }
            },
            error: function (err) {
                $('#errors').css('display', 'block').html('');
                let errs = err.responseJSON.errors
                for (e in errs) {
                    console.dir(errs[e][0]);
                    $('<p>' + errs[e][0] + '</p>').appendTo('#errors');
                }
            }
        })
        return false;
    });

</script>
@endsection
