@extends('Home.layout.zhuce')

@section('content')
<section id="login-content">
    <div class="login-centre">
        <div class="login-switch clearfix">
            <p class="fr">我已经注册，现在就 <a href="/home/login">登录</a></p>
        </div>
        <div class="login-back">
            <div class="H-over">
                

                <form action="/home/doregister" method="post">
                    {{ csrf_field() }}
                    <div class="login-input">
                        <label><i class="heart">*</i>手机号：</label>
                        <input type="text" class="list-iphone" id="phone" name="phone" placeholder="">
                        <!-- <a class="obtain" id="gain">获取短信验证码</a> -->
                        <input type="button" id="gain" class="obtain" value="免费获取验证码" onclick="settime(this)" /> 
                        <div style="margin-top:12px;color:red;font-size:16px">{{$errors->first('phone')}}</div>
                        
                    </div>
                    <div class="login-input">
                        <label><i class="heart">*</i>短信验证码：</label>
                        <input type="text" class="list-notes" name="checkcode" placeholder="">
                        <div style="margin-top:12px;color:red;font-size:16px">{{$errors->first('checkcode')}}</div>
                    </div>
    

                    <div class="login-input">
                        <label><i class="heart">*</i>用户名：</label>
                        <input type="text" class="list-input1" id="username" name="username" placeholder="" style="width: 380px;">
                        <div style="margin-top:12px;color:red;font-size:16px">{{$errors->first('username')}}</div>
                    </div>
                    <div class="login-input">
                        <label><i class="heart">*</i>请设置密码：</label>
                        <input type="password" class="list-input" id="password" name="password" style="width: 380px;">
                        <div style="margin-top:12px;color:red;font-size:16px">{{$errors->first('password')}}</div>
                    </div>
                    <div class="login-input">
                        <label><i class="heart">*</i>请确认密码：</label>
                        <input type="password" class="list-input" name="password_confirmation" style="width: 380px;">
                        <div style="margin-top:12px;color:red;font-size:16px">{{$errors->first('password_confirmation')}}</div>
                    </div>


                    <div class="item-ifo">
                        <input type="checkbox" onClick="agreeonProtocol();" id="readme" checked="checked" class="checkbox">
                        <label for="protocol">我已阅读并同意<a id="protocol" class="blue" href="#">《悦商城用户协议》</a></label>
                        <span class="clr"></span>
                    </div>
                    <div class="login-button">
                        <button id="btn" style="border:0px"><a>立即注册</a></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script type="text/javascript" src="/lib/js/jquery-1.12.4.min.js"></script>
<script>
    $('#gain').click(function() {
        var phone = $('input[name=phone]').val();
        $.ajax({
            type: 'post',
            url: '/home/register',
            data: {
                phone:phone,
                '_token':'{{csrf_token()}}',
            },
            success: function(res) {
                if (res.code == 0) {
                    alert('请输入手机号！')
                }
                if (res.code == 1) {
                    alert('请输入正确的手机号！')
                }
                if (res.code == 2) {
                    alert('验证码已发送！')
                }
                if (res.code == 3) {
                    alert('验证码发送失败！')
                }
            },
            error:function(err){
                console.log(err);
            }
        })
        return false;
    });
</script>
<script> 
    var countdown = 60; 
    function settime(val) { 
    if (countdown == 0) { 
            val.removeAttribute("disabled");  
            val.value="免费获取验证码"; 
            countdown = 60; 
            return;
        } else { 
            val.setAttribute("disabled", true); 
            val.value="重新发送(" + countdown + ")"; 
            countdown--; 
        } 
        setTimeout(function() { 
            settime(val) 
        },1000) 
    } 
</script> 
@endsection
