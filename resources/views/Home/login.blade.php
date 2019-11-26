<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Generator" content="EditPlus®">
    <meta name="Author" content="">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta name="renderer" content="webkit">
    <title>立即登录</title>
    <link rel="stylesheet" href="/lib/theme/css/base.css">
    <link rel="stylesheet" type="text/css" href="/lib/theme/css/login.css">
</head>
<body>
<div class="w">
    <div id="logo">
        <a href="/home">
            <img src="/lib/theme/icon/logo.png" alt="">
        </a>
        <b></b>
    </div>
</div>
<div id="content">
  <div class="login-wrap">
    <div class="w">
        <div class="login-form">
            <div class="login-tab login-tab-l">
                <a href="/home/logincode">手机号登录</a>
            </div>
            <div class="login-tab login-tab-r">
                <a href="/home/login">账号登录</a>
            </div>

            <!-- 账号登录 -->
            <div class="login-box" style="visibility: visible; display:block">
              <div class="mt tab-h"></div>
              <div class="msg-wrap"></div>
              <div class="mc">
                <div class="form">

                    <form action="" method="post">
                        <div style="color:red;">{{$errors->first('username')}}</div>
                        <div class="item item-fore1 item-error">
                            <label for="loginname" class="login-label name-label"></label>
                            <input type="text" name="username" value="{{ old('username') }}"  class="itxt" placeholder="用户名">
                        </div>
                        <!-- 密码输入框fore2 -->
                        <div style="color:red;">{{$errors->first('password')}}</div>
                        <div class="item item-fore2" style="visibility: visible">
                            <label class="login-label pwd-label" for="nloginpwd"></label>
                            <input type="password" name="password" class="itxt itxt-error"  placeholder="密码">
                        </div>
                        <!-- 图片验证码开始 fore3-->
                        <div style="color:red;">{{$errors->first('captcha')}}</div>
                        <div id="o-authcode" class="item item-vcode item-fore3">
                            <input type="text" name="captcha" id="captcha" placeholder="验证码" class="itxt itxt02" tabindex="3" style="width:176px">
                            <img src="{{captcha_src('flat')}}" style="width:106px;height:32px;background:#fff;border:1px solid #ccc" class="captcha" onclick="this.src='/captcha/flat?'+Math.random();">
                        </div>
                        <div class="item item-fore5">
                            <div class="login-btn">
                                <input type="submit" class="btn-img btn-entry" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
                                {{ csrf_field() }}
                            </div>
                        </div>
                    </form>
                </div>
              </div>
            </div>

            <div class="coagent" id="kbCoagent">
                <ul>
                    <li class="extra-r">
                       <div class="regist-link">
                        <a href="/home/register" class="">
                            <b></b>立即注册
                        </a>
                       </div>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <div class="login-banner" style="background-color: #ea4949">
        <div class="w">
            <div id="banner-bg" class="i-inner" style="background: url(/lib/theme/login/a1.jpg);"></div>
        </div>
    </div>
  </div>
</div>
<div class="w">
    <div id="footer-2013">
        <div class="links">
            <a href="">关于我们</a>
            |
            <a href="">联系我们</a>
            |
            <a href="">人才招聘</a>
            |
            <a href="">商家入驻</a>
            |
            <a href="">广告服务</a>
            |
            <a href="">手机京东</a>
            |
            <a href="">友情链接</a>
            |
            <a href="">销售联盟</a>
            |
            <a href="">English site</a>
        </div>
        <div style="padding-left:10px">
            <p style="padding-top:10px; padding-bottom:10px; color:#999">网络文化经营许可证：浙网文[2013]0268-027号| 增值电信业务经营许可证：浙B2-20080224-1</p>
            <p style="padding-bottom:10px; color:#999">信息网络传播视听节目许可证：1109364号 | 互联网违法和不良信息举报电话:0571-81683755</p>
        </div>
    </div>
</div>
</body>
</html>