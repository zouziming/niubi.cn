@extends('Home.layout.mycenter')

@section('title', '个人信息')

@section('content')
<div class="member-right fr">
<div class="member-head">
    <div class="member-heels fl"><h2>个人信息</h2></div>
</div>
<div class="member-border" style="background:url(/lib/img/66.jpg) no-repeat center  0;background-size:100% 100%;">
<div class="user-info">
    <!--头像 -->
    <div class="user-infoPic" style="border-bottom:0px">
        <!-- <form action="/home/user/mycenter" method="post"> -->
            <div class="filePic">
            <a href="/home/user/picture" class="inputPic" name="pic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*"> </a>
            @if(session('userInfo.pic') == true)
            <img class="btn am-circle am-img-thumbnail" src="/storage/{{ session('userInfo.pic') }}" id="btn" style="border:1px solid #00CCFF" />
            @else
            <img class="btn am-circle am-img-thumbnail" id="btn" style="border:1px solid #00CCFF" src="/lib/img/do.jpg" alt="" />
            @endif
            </div>
        <!-- </form> -->
        <p class="am-form-help"></p>
        <div class="info-m" style="left:2%;top:60px;">
        <div><b>用户名：<i style="color:violet">{{ session('userInfo.username') }}</i></b></div>
        <a href="/home/user/password">修改密码</a>
        <!-- <div class="vip">
        <span></span><a href="#">会员专享</a>
        </div> -->
        </div>
    </div>
    <!--个人信息 -->
    <div class="info-main">

    <form class="am-form " action="/home/user/mycenter" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ session('userInfo.id') }}">
        <div class="am-form-group">
            <label for="user-name2" class="am-form-label">用户名</label>
            <div class="am-form-content">
            <input type="text" id="user-name2" name="username" value="{{ session('userInfo.username') }}" style="border:1px solid #00CCFF;height:28px">&nbsp;&nbsp;<span style="color:red">{{$errors->first('username')}}</span>
            </div>
        </div>
        <div class="am-form-group">
            <label class="am-form-label">性别</label>
            &nbsp;&nbsp;
            @if (session('userInfo.sex') == 0)
                女
            @elseif (session('userInfo.sex') == 1)
                男
            @else
                保密
            @endif
            <div class="am-form-content sex" style="margin-left:-20px;padding-top: 3px;">
            @if(session('userInfo.sex') == 0)
            <label class="am-radio-inline">
                <input type="radio" name="sex" value="1" data-am-ucheck> 男
            </label>
            <label class="am-radio-inline">
                <input type="radio" name="sex" checked value="0" data-am-ucheck> 女
            </label>
            <label class="am-radio-inline">
                <input type="radio" name="sex" value="2" data-am-ucheck> 保密
            </label>
            @elseif(session('userInfo.sex') == 1)
            <label class="am-radio-inline">
                <input type="radio" name="sex" checked value="1" data-am-ucheck> 男
            </label>
            <label class="am-radio-inline">
                <input type="radio" name="sex" value="0" data-am-ucheck> 女
            </label>
            <label class="am-radio-inline">
                <input type="radio" name="sex" value="2" data-am-ucheck> 保密
            </label>
            @else
            <label class="am-radio-inline">
                <input type="radio" name="sex" value="1" data-am-ucheck> 男
            </label>
            <label class="am-radio-inline">
                <input type="radio" name="sex" value="0" data-am-ucheck> 女
            </label>
            <label class="am-radio-inline">
                <input type="radio" name="sex" checked value="2" data-am-ucheck> 保密
            </label>
            @endif
            </div>
        </div>
        <div class="am-form-group">
            <label for="user-phone" class="am-form-label">电话</label>
            <div class="am-form-content">
            <input id="user-phone" name="phone" value="{{ session('userInfo.phone') }}" type="tel" style="border:1px solid #00CCFF;height:28px">&nbsp;&nbsp;<span style="color:red">{{$errors->first('phone')}}</span>
            </div>
        </div>
        <div class="am-form-group">
            <label for="user-email" class="am-form-label">电子邮件</label>
            <div class="am-form-content">
            <input id="user-email" name="email" value="{{ session('userInfo.email') }}" type="email" style="border:1px solid #00CCFF;height:28px">&nbsp;&nbsp;<span style="color:red">{{$errors->first('email')}}</span>
            </div>
        </div>
        <div class="am-form-group">
            <label for="user-email" class="am-form-label">注册时间</label>
            <div class="am-form-content">
            <input id="user-email" value="{{ session('userInfo.addtime') }}" type="text" readonly style="border:1px solid #00CCFF;height:28px">
            </div>
        </div>
        <div class="info-btn">
            <div class="am-btn am-btn-danger"><button id="btn" style="border:0px;background:#dd514c;height:28px;width:81px">保存修改</button></div>
        </div>
    </form>     
    </div>
</div>
</div>
</div>
@endsection

@section('script')
<script src="/lib/js/jquery.min.js"></script>
<script src="/lib/js/jquery-1.12.4.min.js"></script>
// <script>
//     $('#btn').click(function(){
//         var username = $('input[name=username]').val();
//         var file = $('input[name=pic]').get(0).files[0];
//         var email = $('input[name=email]').val();
//         var phone = $('input[name=phone]').val();
//         var sex = $('select[name=sex]').val();

//         var fd = new FormData();
//         fd.append('username', username);
//         fd.append('pic', file);
//         fd.append('email', email);
//         fd.append('phone', phone);
//         fd.append('sex', sex);
//         fd.append('_token', '{{csrf_token()}}');

//         $.ajax({
//             type: 'post',
//             url: '/home/user/mycenter',
//             processData: false,
//             contentType: false,
//             data: fd ,
//             success: function (res) {
//                 if (res.code == 0) {
//                     alert(res.msg);
//                     location.href = "/home/user/mycenter"
//                 }
//             },
//             error: function (err) {
//                 $('#errors').css('display', 'block').html('');
//                 let errs = err.responseJSON.errors
//                 for (e in errs) {
//                     $('<p>' + errs[e][0] + '</p>').appendTo('#errors');
//                 }
//             }
//         })
//         return false;
//     });
// </script>
@endsection
