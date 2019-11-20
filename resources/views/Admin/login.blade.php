<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link href="/lib/css/H-ui.min.css" rel="stylesheet" type="text/css" />
    <link href="/lib/css/H-ui.login.css" rel="stylesheet" type="text/css" />
    <link href="/lib/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/lib/fonts/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/lib/bootstrap-3.3.7/css/bootstrap.min.css">
    <title>后台登录</title>
</head>
<body>
<div class="header"></div>
<div class="loginWraper">
    <div id="loginform" class="loginBox">
    
        @if(count($errors) > 0)
            <div class="alert alert-info col-md-7 col-md-offset-3 " role="alert" style="    margin-left: 161px;">
                <ul>
                    @foreach($errors->all() as $e)
                    <li style="color:red">{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form class="form form-horizontal" action="" method="post">
            <div class="row cl">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
                <div class="formControls col-xs-8">
                    <input id="" name="username" type="text" value="{{ old('username') }}" placeholder="用户名" class="input-text size-L">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
                <div class="formControls col-xs-8">
                    <input id="" name="password" type="password" placeholder="密码" class="input-text size-L">
                </div>
            </div>


            <div class="row cl">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60c;</i></label>
                <div class="formControls col-xs-5">
                    <input id="captcha" name="captcha" type="text" placeholder="验证码" class="input-text size-L" style="width:254px">
                </div>
                <img src="{{captcha_src('flat')}}" style="width:106px;height:41px;background:#fff;border:1px solid #ccc" class="captcha" onclick="this.src='/captcha/flat?'+Math.random();">
            </div>


            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <input name="" type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
                    <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
                    {{ csrf_field() }}
                </div>
            </div>
        </form>
    </div>
</div>
<div class="footer">Copyright 最终解释权归老子所有</div>
</body>
</html>