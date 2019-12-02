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
                    <dd><a href="/ShowOrders">我的订单</a></dd>
                    <dd><a href="/home/collection">我的收藏</a></dd>
                    <dd><a href="/home/user/mycenter">我的信息</a></dd>
                    <dd><a href="#">我的评价</a></dd>
                    <dd><a href="/home/addressIndex">地址管理</a></dd>
                </dl>
                <dl>
                    <dt>客户服务</dt>
                    <dd><a href="/home/refund/list">退货申请</a></dd>
                    <dd><a href="/home/refund/list">退货/退款记录</a></dd>
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
            <div class="member-heels fl"><h2>个人信息 - 修改密码</h2></div>
        </div>
        <div class="member-border" style="background:url(/lib/img/55.jpg) no-repeat center  0;background-size:100% 100%;">
            
        <div class="main-wrap" style="margin-left: 120px;margin-top: 65px;">

        <form class="am-form am-form-horizontal" action="/home/user/password" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ session('userInfo.id') }}">
            <div class="am-form-group">
                <label for="user-old-password" class="am-form-label">原密码</label>
                <div class="am-form-content" style="width: 232px;">
                <input type="password" id="user-old-password" placeholder="请输入原登录密码" name="oldpassword" style="border:1px solid red;height:25px;width:230px">
                    <div style="color:red;">{{$errors->first('oldpassword')}}</div>
                </div>
                    
            </div>
            <div class="am-form-group">
                <label for="user-new-password" class="am-form-label">新密码</label>
                <div class="am-form-content">
                <input type="password" id="user-new-password" placeholder="由数字、字母组合" name="password" style="border:1px solid red;height:25px;width:230px">
                    <div style="color:red;">{{$errors->first('password')}}</div>
                </div>
            </div>
            <div class="am-form-group">
                <label for="user-confirm-password" class="am-form-label">确认密码</label>
                <div class="am-form-content">
                <input type="password" id="user-confirm-password" placeholder="请再次输入上面的密码" name="password_confirmation" style="border:1px solid red;height:25px;width:230px">
                    <div style="color:red;">{{$errors->first('password_confirmation')}}</div>
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

<!-- 商城快讯 End -->
    </div>
</section>
@endsection

