@extends('Home.layout.mycenter')

@section('title', '个人信息')

@section('content')

<div class="containers"><div class="pc-nav-item"><a href="/home">首页</a> &gt; <a href="#">会员中心 </a></div></div>


<!-- 商城快讯 begin -->
<section id="member">
    <div class="member-center clearfix">
        <div class="member-left fl">
            <div class="member-apart clearfix">
                <div class="fl"><a>
                @if(session('userInfo.pic') == true)
                <img src="/storage/{{ $user->pic }}"></a></div>
                @else
                <img src="/lib/img/do.jpg"></a></div>
                @endif
                <div class="fl">
                    <p>用户名：</p>
                    <p><a style="color:violet">{{ session('userInfo.username') }}</a></p>
                    <p>搜悦号：</p>
                    <p>389323080</p>
                </div>
            </div>
            <div class="member-lists">
                <dl>
                    <dt>我的商城</dt>
                    <dd><a href="#">我的订单</a></dd>
                    <dd><a href="/home/collection">我的收藏</a></dd>
                    <dd><a href="/home/user/mycenter">我的信息</a></dd>
                    <dd><a href="#">我的评价</a></dd>
                    <dd><a href="/home/addressIndex">地址管理</a></dd>
                </dl>
                <dl>
                    <dt>客户服务</dt>
                    <dd><a href="#">退货申请</a></dd>
                    <dd><a href="#">退货/退款记录</a></dd>
                </dl>
                <dl>
                    <dt>我的消息</dt>
                    <dd><a href="#">商城快讯</a></dd>
                    <dd><a href="#">帮助中心</a></dd>
                </dl>
            </div>
        </div>
       
        


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
                    <img src="/storage/{{$user->pic}}" style="width:100px;height:100px;border-radius:50%;border:1px solid #00CCFF">
                    @else
                    <img src="/lib/img/do.jpg" style="width:100px;height:100px;border-radius:50%;border:1px solid #00CCFF">

                    <!-- <img class="btn am-circle am-img-thumbnail" id="btn" style="border:1px solid #00CCFF" src="/lib/img/do.jpg" alt="" /> -->
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
                    <input type="text" id="user-name2" name="username" value="{{$user->username}}" style="border:1px solid #00CCFF;height:28px">&nbsp;&nbsp;<span style="color:red">{{$errors->first('username')}}</span>
                    </div>
                </div>
                <div class="am-form-group">
                    <label class="am-form-label">性别</label>
                    &nbsp;&nbsp;
                    @if ($user->sex == 0)
                        女
                    @elseif ($user->sex == 1)
                        男
                    @else
                        保密
                    @endif
                    <div class="am-form-content sex" style="margin-left:-20px;padding-top: 3px;">
                    @if($user->sex == 0)
                    <label class="am-radio-inline">
                        <input type="radio" name="sex" value="1" data-am-ucheck> 男
                    </label>
                    <label class="am-radio-inline">
                        <input type="radio" name="sex" checked value="0" data-am-ucheck> 女
                    </label>
                    <label class="am-radio-inline">
                        <input type="radio" name="sex" value="2" data-am-ucheck> 保密
                    </label>
                    @elseif($user->sex == 1)
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
                    <input id="user-phone" name="phone" value="{{$user->phone}}" type="tel" style="border:1px solid #00CCFF;height:28px">&nbsp;&nbsp;<span style="color:red">{{$errors->first('phone')}}</span>
                    </div>
                </div>
                <div class="am-form-group">
                    <label for="user-email" class="am-form-label">电子邮件</label>
                    <div class="am-form-content">
                    <input id="user-email" name="email" value="{{$user->email}}" type="email" style="border:1px solid #00CCFF;height:28px">&nbsp;&nbsp;<span style="color:red">{{$errors->first('email')}}</span>
                    </div>
                </div>
                <div class="am-form-group">
                    <label for="user-email" class="am-form-label">注册时间</label>
                    <div class="am-form-content">
                    <input id="user-email" value="{{$user->addtime}}" type="text" readonly style="border:1px solid #00CCFF;height:28px">
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


<!-- 商城快讯 End -->
    </div>
</section>
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
